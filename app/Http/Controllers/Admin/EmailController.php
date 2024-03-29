<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\EmailStoreRequest;
use App\Http\Requests\EmailUpdateRequest;
use App\Models\Email;
use App\Models\Recipient;
use App\Service\EmailCreateService;
use App\Service\EmailService;
use App\Service\EmailUpdateService;
use Illuminate\Http\Request;
use App\Service\EmailServiceInterface;
use Illuminate\Support\Facades\Session;


class EmailController extends Controller
{
    protected $emailService;
    protected $emailCreateService;

    public function __construct(EmailService $emailService, EmailCreateService $emailCreateService)
    {
        $this->emailService = $emailService;
        $this->emailCreateService = $emailCreateService;
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
    public function store(EmailStoreRequest $request)
    {
        // Validate request
        $validatedData = $request->validated();

        // Create email using EmailCreateService
        $emailTemplate = $this->emailCreateService->createEmail($validatedData);

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
    public function update(EmailUpdateRequest $request, $id)
    {
        // Validate request
        $validatedData = $request->validated();

        // Find the Email Template by ID
        $emailTemplate = Email::findOrFail($id);

        // Update email template with validated data
        $emailTemplate->update($validatedData);

        Session::flash('success_message', 'Great! Email template has been Updated successfully.');

        return redirect()->back();

    }
}

