<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Agenda;
use DateTime;
use Illuminate\Auth\Access\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

//use Carbon\Carbon;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Str;


class AgendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $obj_user;

    public function __construct(Agenda $userObject)
    {
        $this->middleware('auth:web');
        $this->obj_user = $userObject;
    }

    public function index()
    {
        $Agendas = Agenda::get();
        return view('admin.agendas.index', ['title' => 'Registered Agenda List', 'agenda' => $Agendas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Agenda::class);
        $sessionColors = Agenda::distinct()->pluck('session_color')->toArray();
        $trackColors = Agenda::distinct()->pluck('track_color')->toArray();
        $chairColors = Agenda::distinct()->pluck('chair_speaker_color')->toArray();
        $ceremonyColors = Agenda::distinct()->pluck('ceremony_color')->toArray();
        $hallColors = Agenda::distinct()->pluck('hall_color')->toArray();

        return view('admin.agendas.create', ['title' => 'Create agendas', 'sessionColors' => $sessionColors, 'trackColors' => $trackColors, 'chairColors' => $chairColors, 'ceremonyColors' => $ceremonyColors,'hall_colors' => $hallColors,]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */


    public function store(Request $request)
    {

        $this->validate($request, [
            'hall' => 'max:255',
            'image' => 'image|mimes:jpeg,png,jpg',
            // Add other validation rules for your fields here
        ]);

        $input = $request->all();
        $selectedRoom = $input['hall'];
        // Retrieve the last row for the selected room
        $lastRow = Agenda::where('hall', $selectedRoom)->max('row');
        $newRow = $lastRow ? $lastRow + 1 : 1;

        // Set the start_time and end_time fields without using Carbon
        $startTime = DateTime::createFromFormat('H:i', $input['start_time']);
        $endTime = DateTime::createFromFormat('H:i', $input['end_time']);
        $formattedTime = $startTime->format('H:i') . '-' . $endTime->format('H:i');

        // Get the user-selected colors for each field
        $userSelectedRowColor = $request->input('row_color')[0] ?? null;
        $userSelectedEventDateColor = $request->input('event_date_color') ?? null;
        $userSelectedHallColor = $request->input('hall_color') ?? null;
        $userSelectedTimeColor = $request->input('start_time_color') ?? null;
        $userSelectedSessionColor = $request->input('session_color') ?? null;
        $userSelectedTrackColor = $request->input('track_color') ?? null;
        $userSelectedCeremonyColor = $request->input('ceremony_color') ?? null;
        $userSelectedChairColor = $request->input('chair_speaker_color') ?? null;


        $agenda = new Agenda([
            'row' => $newRow,
            'hall' => $input['hall'],
            'start_time' => $formattedTime,
            'event_date' => $input['event_date'],
            'track' => $input['track'],
            'session' => $input['session'],
            'chair_speaker' => $input['chair_speaker'],
            'topic' => $input['topic'],
            'ceremony' => $input['ceremony'],
            // Assign the user-selected colors to the respective columns
            'color' => $userSelectedRowColor, // For the row color (optional if you want to store it separately)
            'hall_color' =>  $userSelectedHallColor,
            'start_time_color' => $userSelectedTimeColor,
            'event_date_color' => $userSelectedEventDateColor,
            'session_color' => $userSelectedSessionColor,
            'track_color' => $userSelectedTrackColor,
            'ceremony_color' => $userSelectedCeremonyColor,
            'chair_speaker_color' => $userSelectedChairColor,
         ]);
        if ($request->hasFile('image')) {
            if ($request->file('image')->isValid()) {
                $this->validate($request, [
                    'image' => 'image|mimes:jpeg,png,jpg'
                ]);

                $file = $request->file('image');
                $destinationPath = "uploads/gallery/";
                $extension = $file->getClientOriginalExtension();
                $fileName = $file->getClientOriginalName();
                $fileName = rand() . $fileName;
                $request->file('image')->move($destinationPath, $fileName);
                $agenda->image = $fileName;
            }
        }

        $agenda->save();
        Session::flash('success_message', 'Great! Record has been saved Under Agenda successfully!');
        return redirect()->back();
    }

    public function edit($id)
    {
        // Retrieve the agenda data from the database
        $agenda = Agenda::findOrFail($id);

        // Convert the start_time and end_time strings to DateTime instances
        $startTime = null;
        if (!empty($agenda->start_time)) {
            $startTime = DateTime::createFromFormat('H:i', $agenda->start_time);
            if (!$startTime) {
                // Handle invalid time format
                // You can throw an exception, log the error, or set a default value, e.g., $startTime = null;
            }
        }

        $endTime = null;
        if (!empty($agenda->end_time)) {
            $endTime = DateTime::createFromFormat('H:i', $agenda->end_time);
            if (!$endTime) {
                // Handle invalid time format
                // You can throw an exception, log the error, or set a default value, e.g., $endTime = null;
            }
        }

        // Ensure the event_date is in the correct format (Y-m-d)
        $eventDate = null;
        if (!empty($agenda->event_date)) {
            $eventDate = DateTime::createFromFormat('Y-m-d', $agenda->event_date);
            if (!$eventDate) {
                // Handle invalid date format
                // You can throw an exception, log the error, or set a default value, e.g., $eventDate = null;
            } else {
                $eventDate = $eventDate->format('Y-m-d');
            }
        }

        // Get the user-selected colors for each field
        $userSelectedRowColor = $agenda->color ?? '#FFFFFF';
        $userSelectedHallColor = $agenda->hall_color ?? '#FFFFFF';
        $userSelectedTimeColor = $agenda->start_time_color ?? '#FFFFFF';
        $userSelectedEventDateColor = $agenda->event_date_color ?? '#FFFFFF';
        $userSelectedSessionColor = $agenda->session_color ?? '#FFFFFF';
        $userSelectedTrackColor = $agenda->track_color ?? '#FFFFFF';
        $userSelectedTopicColor = $agenda->topic_color ?? '#FFFFFF';
        $userSelectedChairColor = $agenda->chair_speaker_color ?? '#FFFFFF';

        // Pass the agenda data, the start and end times, and the user-selected colors to the view
        return view('admin.agendas.edit', compact('agenda', 'startTime', 'endTime', 'eventDate', 'userSelectedRowColor', 'userSelectedSessionColor', 'userSelectedTrackColor', 'userSelectedTopicColor', 'userSelectedChairColor','userSelectedTimeColor','userSelectedEventDateColor','userSelectedHallColor'));
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'hall' => 'max:255',
            'image' => 'image|mimes:jpeg,png,jpg',
            // Add other validation rules for your fields here
        ]);

        $input = $request->all();

        // Retrieve the agenda to be updated
        $agenda = Agenda::findOrFail($id);

        // Set the start_time and end_time fields without using Carbon
        $startTime = DateTime::createFromFormat('H:i', $input['start_time']);
        $endTime = DateTime::createFromFormat('H:i', $input['end_time']);
        $formattedTime = $startTime->format('H:i') . '-' . $endTime->format('H:i');

        // Get the user-selected colors for each field
        $userSelectedRowColor = $request->input('row_color')[0] ?? null;
        $userSelectedHallColor = $request->input('hall_color') ?? null;
        $userSelectedTimeColor = $request->input('start_time_color') ?? null;
        $userSelectedEventDateColor = $request->input('event_date_color') ?? null;
        $userSelectedSessionColor = $request->input('session_color') ?? null;
        $userSelectedTrackColor = $request->input('track_color') ?? null;
        $userSelectedTopicColor = $request->input('topic_color') ?? null;
        $userSelectedChairColor = $request->input('chair_speaker_color') ?? null;
        $userSelectedCeremonyColor = $request->input('ceremony_color') ?? null;

        // Update the agenda with the new data
        $agenda->update([
            'hall' => $input['hall'],
            'start_time' => $formattedTime,
            'event_date' => $input['event_date'],
            'track' => $input['track'],
            'session' => $input['session'],
            'chair_speaker' => $input['chair_speaker'],
            'topic' => $input['topic'],
            'ceremony' => $input['ceremony'],
            // Assign the user-selected colors to the respective columns
            'color' => $userSelectedRowColor, // For the row color (optional if you want to store it separately)
            'hall_color' => $userSelectedHallColor,
            'start_time_color' => $userSelectedTimeColor,
            'event_date_color' => $userSelectedEventDateColor,
            'session_color' => $userSelectedSessionColor,
            'track_color' => $userSelectedTrackColor,
            'topic_color' => $userSelectedTopicColor,
            'chair_speaker_color' => $userSelectedChairColor,
            'ceremony_color' => $userSelectedCeremonyColor,
            // ...
        ]);

        Session::flash('success_message', 'Great! Agenda has been updated successfully!');
        return redirect()->route('agenda.index');
    }
    public function destroy($id)
    {
        $user = $this->obj_user->findOrFail($id);
        $user->delete();
        Session::flash('success_message', 'Agenda Details successfully deleted!');
        return redirect()->route('agenda.index');
    }

    public function deleteSelectedAgenda(Request $request)
    {
        $input = $request->all();
        $this->validate($request, [
            'agenda' => 'required',

        ]);
        foreach ($input['agenda'] as $index => $id) {

            $user = $this->obj_user->findOrFail($id);
            $user->delete();

        }
        Session::flash('success_message', 'Agenda Row successfully deleted!');
        return redirect()->back();

    }
    public function duplicateRow(Request $request)
    {
        // Get the row ID from the request
        $rowId = $request->input('row_id');

        // Retrieve the row from the database
        $row = DB::table('agendas')->where('id', $rowId)->first();

        if ($row) {
            // Create a new row with the same data (except for the ID)
            $newRow = (array)$row;
            unset($newRow['id']);
            DB::table('agendas')->insert($newRow);

            // Optionally, you can add a success message or other response here
            return response()->json(['message' => 'Row duplicated successfully']);
        }

        // Optionally, you can add an error message or other response here
        return response()->json(['error' => 'Row not found'], 404);
    }
    public function agendaDetail(Request $request)
    {
        $agenda = Agenda::findOrFail($request->input('id'));
        return view('admin.agendas.single', ['title' => 'Agenda Detail', 'agenda' => $agenda]);
    }

}
