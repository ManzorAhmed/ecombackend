<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Email;
use App\Models\Recipient;
use Illuminate\Http\Request;
use App\Service\EmailServiceInterface;
use Illuminate\Support\Facades\Session;


class EmailController extends Controller
{
    protected $emailService;

    public function __construct(EmailServiceInterface $emailService)
    {
        $this->emailService = $emailService;
    }
    public function index()
    {
        $template = Email::all();
        return view('admin.emails.index',['title'=> 'Email Template','template'=> $template ]);
    }
    public function create()
    {
        return view('admin.emails.create',['title'=>'Email Create']);
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'template_key' => 'required|unique:emails',
            'subject' => 'required',
            'email_content' => 'required',

        ]);

        $emailTemplate = new Email();
        $emailTemplate->title = $request->input('title');
        $emailTemplate->template_key = $request->input('template_key');
        $emailTemplate->subject = $request->input('subject');
        $emailTemplate->email_content = $request->input('email_content');
        $emailTemplate->active = $request->has('active') ? 1 : 0;
        $emailTemplate->save();

        // Store recipient email addresses
        $recipientEmails = explode(',', $request->input('recipient_emails'));
        foreach ($recipientEmails as $recipientEmail) {
            $recipient = new Recipient();
            $recipient->email = trim($recipientEmail);
            $emailTemplate->recipients()->save($recipient);
        }
        // Send the email
        $recipientEmails = explode(',', $request->input('recipient_emails'));
        $this->emailService->sendEmail($emailTemplate->title, $emailTemplate->template_key, $recipientEmails, $emailTemplate->subject, $emailTemplate->email_content);
        // Flash success message
        Session::flash('success_message', 'Great! Email template has been added successfully.');

        return redirect()->back();
    }

    public function send($id)
    {
        $emailTemplate = Email::findOrFail($id);

        // Retrieve recipient email addresses
        $recipientEmails = $emailTemplate->recipients()->pluck('email')->toArray();

        // Send the email
        $this->emailService->sendEmail($emailTemplate->title, $emailTemplate->template_key, $recipientEmails, $emailTemplate->subject, $emailTemplate->email_content);

        // Flash success message
        Session::flash('success_message', 'Email has been sent successfully.');

        return redirect()->back();
    }
    public function Edit($id)
    {
        $template = Email::findOrFail($id);
        $recipientEmails = $template->recipients()->pluck('email')->toArray();
        return view('admin.emails.edit',['Title'=>'Edit Email Template','template'=>$template,'recipientEmails'=>$recipientEmails]);

    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'template_key' => 'required|unique:emails',
            'subject' => 'required',
            'email_content' => 'required',

        ]);

        $emailTemplate = Email::findOrFail($id);
        $emailTemplate->title = $request->input('title');
        $emailTemplate->template_key = $request->input('template_key');
        $emailTemplate->subject = $request->input('subject');
        $emailTemplate->email_content = $request->input('email_content');
        $emailTemplate->active = $request->has('active') ? 1 : 0;
        $emailTemplate->save();

        // Store recipient email addresses
        $recipientEmails = explode(',', $request->input('recipient_emails'));
        foreach ($recipientEmails as $recipientEmail) {
            $recipient = new Recipient();
            $recipient->email = trim($recipientEmail);
            $emailTemplate->recipients()->save($recipient);
        }
        // Send the email
        $recipientEmails = explode(',', $request->input('recipient_emails'));
        $this->emailService->sendEmail($emailTemplate->title, $emailTemplate->template_key, $recipientEmails, $emailTemplate->subject, $emailTemplate->email_content);
        // Flash success message
        Session::flash('success_message', 'Great! Email template has been added successfully.');

        return redirect()->back();

    }
}

