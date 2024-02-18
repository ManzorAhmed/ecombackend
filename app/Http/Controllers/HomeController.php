<?php

namespace App\Http\Controllers;

use App\Models\ActiveAbudhabi;
use App\Models\Participant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

//    /**
//     * Show the application dashboard.
//     *
//     * @return \Illuminate\Contracts\Support\Renderable
//     */
    public function index()
    {
        return view('home');
    }

    public function activeAbuDhabi()
    {
        // Implement the logic for displaying the active Abu Dhabi page
        return view('frontend.partials.active_abu_dhabi');
    }
    public function storeActiveAbuDhabi(Request $request)
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


}
