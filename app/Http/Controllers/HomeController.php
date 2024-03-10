<?php

namespace App\Http\Controllers;

use App\Mail\DynamicEmail;
use App\Models\ActiveAbudhabi;
use App\Models\Contact;
use App\Models\Email;
use App\Models\Participant;
use App\Service\EmailService;
use App\Services\GoogleSheetService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected $emailService; // Declare the emailService property

    // Inject the EmailService into the constructor
    public function __construct(EmailService $emailService)
    {
        $this->emailService = $emailService;
    }

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
    public function Contact()
    {
        return view('frontend.partials.contact');
    }
    public function storeContact(Request $request)
    {
        // Validate the incoming request
        $this->validate($request, [
            'first_name' => 'required|max:256',
            'last_name' => 'required|max:256',
            'email' => 'required|email|max:256',
            'team_name' => 'required|max:256',
        ]);

        // Create a new Contact instance and populate its attributes
        $contact = new Contact();
        $contact->first_name = $request->input('first_name');
        $contact->last_name = $request->input('last_name');
        $contact->email = $request->input('email');
        $contact->team_name = $request->input('team_name');
        $contact->active = $request->has('active') ? 1 : 0; // Set active status based on checkbox

        // Save the contact details to the database
        $contact->save();

        // Retrieve the email template from the database (assuming you have a specific template ID)
        $templateId = 3; // Replace this with the actual template ID you want to use
        $emailTemplate = Email::findOrFail($templateId);

        // Populate the email template with dynamic data from the contact form
        $emailContent = $emailTemplate->email_content;
        $emailContent = str_replace('{first_name}', $contact->first_name, $emailContent);
        $emailContent = str_replace('{last_name}', $contact->last_name, $emailContent);
        // You can replace other placeholders in a similar manner

        // Send the email using the EmailService
        $recipientEmail = $contact->email;
        $this->emailService->sendEmail($emailTemplate->title, $emailTemplate->template_key, [$recipientEmail], $emailTemplate->subject, $emailContent);

        // Flash success message
        Session::flash('success_message', 'Thank you for contacting us. A confirmation email has been sent to your email address.');

        return redirect()->back();
    }

    public function fetchData()
    {
        // Fetch data from Google Sheets
        $csvUrl = 'https://docs.google.com/spreadsheets/d/e/2PACX-1vT-bGYQaqWKMEj0n9nYJWKvWj2XSPrPbmL7Uxe9JiiI4m16FjouU_TVYUTjS_QketJraWHTMg-ljiDQ/pub?gid=0&single=true&output=csv';
        $csvData = file_get_contents($csvUrl);
        $rows = explode("\n", $csvData);
        $data = [];
        foreach ($rows as $row) {
            $data[] = str_getcsv($row);
        }

        // Return the view with fetched data
        return view('frontend.partials.fetch-data', compact('data'));
    }


}
