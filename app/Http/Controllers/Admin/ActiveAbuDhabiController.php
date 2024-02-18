<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ActiveAbudhabi;
use App\Models\Participant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ActiveAbuDhabiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $obj_user;

    public function __construct(ActiveAbudhabi $userObject)
    {
        $this->middleware('auth:web');
        $this->obj_user = $userObject;
    }

    public function index()
    {
        $booking = ActiveAbudhabi::get();
        return view('admin.active_abu_dhabi.index', ['title' => 'Registered Active Abu Dhabi', 'booking' => $booking]);
    }

    public function create()
    {
        return view('admin.active_abu_dhabi.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required|max:15',
            'last_name' => 'required|max:15',
            'team_name' => 'required|max:25',
        ]);

        $booking = new ActiveAbudhabi();
        $booking->first_name = $request->input('first_name');
        $booking->last_name = $request->input('last_name');
        $booking->team_name = $request->input('team_name');

        if ($request->active) {
            $booking->active = 1;
        } else {
            $booking->active = 0;
        }

        $booking->save(); // Save the ActiveAbudhabi record

        // Save related participants
        $participants = $request->input('participant_name', []);

        foreach ($participants as $participantName) {
            $participant = new Participant();
            $participant->name = $participantName;
            $booking->participants()->save($participant); // Associate the participant with the ActiveAbudhabi record
        }

        Session::flash('success_message', 'Great! Team Member Added to the List Successfully');
        return redirect()->back();
    }


    public function edit($id)
    {
        $booking = ActiveAbudhabi::findOrFail($id);
        return view('admin.active_abu_dhabi.edit', ['title' => 'Update User Details', 'booking' => $booking]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'first_name' => 'required|max:15',
            'last_name' => 'required|max:15',
            'team_name' => 'required|max:25',
        ]);

        $booking = ActiveAbudhabi::findOrFail($id);

        $booking->first_name = $request->input('first_name');
        $booking->last_name = $request->input('last_name');
        $booking->team_name = $request->input('team_name');

        if ($request->active) {
            $booking->active = 1;
        } else {
            $booking->active = 0;
        }

        $booking->save(); // Save the updated ActiveAbudhabi record

        // Save related participants
        $participants = $request->input('participant_name', []);

        // Remove existing participants associated with this booking
        $booking->participants()->delete();

        foreach ($participants as $participantName) {
            $participant = new Participant();
            $participant->name = $participantName;
            $booking->participants()->save($participant); // Associate the participant with the ActiveAbudhabi record
        }

        Session::flash('success_message', 'Team Member Updated Successfully');
        return redirect()->route('active_abu_dhabi.index');
    }

    public function deleteSelectedUser(Request $request)
    {
        $input = $request->all();
        $this->validate($request, [
            'booking' => 'required',

        ]);
        foreach ($input['booking'] as $index => $id) {

            $user = $this->obj_user->findOrFail($id);
            $user->delete();

        }
        Session::flash('success_message', 'User successfully deleted from Database!');
        return redirect()->back();

    }
    public function active_abu_dhabisDetail(Request $request)
    {
        $booking = ActiveAbudhabi::findOrFail($request->input('id'));

        return view('admin.active_abu_dhabi.single', ['title' => 'User Detail', 'booking' => $booking]);
    }



}
