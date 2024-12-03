<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMailable extends Mailable
{
    use Queueable, SerializesModels;

    public $details;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($details)
    {
        $this->details = $details;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $subject = $this->details['subject'];

        if (isset($this->details['template']) && $this->details['template'] == 'employee_invitation_email') {
            $this->employee_invitation_email($this->details);
        }
        if (isset($this->details['template']) && $this->details['template'] == 'invoice_send_email') {
            $this->invoice_send_email($this->details);
        }
        if (isset($this->details['template']) && $this->details['template'] == 'invoice_reminder_email') {
            $this->invoice_reminder_email($this->details);
        }
        if (isset($this->details['template']) && $this->details['template'] == 'invoice_overdue_email') {
            $this->invoice_overdue_email($this->details);
        }
        if (isset($this->details['template']) && $this->details['template'] == 'invoice_overdue_chase2_email') {
            $this->invoice_overdue_chase2_email($this->details);
        }
    }

    public function employee_invitation_email($details = array())
    {
        $subject = $details['subject'];

        return $this->view('pages.employees.emails.invitation', ['details' => $details])
            ->from(env('MAIL_FROM_ADDRESS'), 'cashwhisperer')
            ->subject($subject)
            ->replyTo(env('MAIL_FROM_ADDRESS'), 'cashwhisperer');
    }

    public function invoice_send_email($details = array())
    {
        $subject = $details['subject'];
        $pdfPath = public_path('uploads/invoices/uploads/' . $details['invoice']->invoice_pdf);


        return $this->view('pages.invoices.email.invoice', ['details' => $details])
            ->from(env('MAIL_FROM_ADDRESS'), 'cashwhisperer')
            ->subject($subject)
            ->replyTo(env('MAIL_FROM_ADDRESS'), 'cashwhisperer')
            ->attach($pdfPath, [
                'as' => 'invoice.pdf', // Set the name of the attached file
                'mime' => 'application/pdf', // Set the MIME type
            ]);
    }

    public function invoice_reminder_email($details = array())
    {
        $subject = $details['subject'];
        $pdfPath = public_path('uploads/invoices/uploads/' . $details['invoice']->invoice_pdf);


        return $this->view('pages.invoices.email.invoice_reminder_email', ['details' => $details])
            ->from(env('MAIL_FROM_ADDRESS'), 'cashwhisperer')
            ->subject($subject)
            ->replyTo(env('MAIL_FROM_ADDRESS'), 'cashwhisperer')
            ->attach($pdfPath, [
                'as' => 'invoice.pdf', // Set the name of the attached file
                'mime' => 'application/pdf', // Set the MIME type
            ]);
    }

    public function invoice_overdue_email($details = array())
    {
        $subject = $details['subject'];
        $pdfPath = public_path('uploads/invoices/uploads/' . $details['invoice']->invoice_pdf);


        return $this->view('pages.invoices.email.invoice_overdue_email', ['details' => $details])
            ->from(env('MAIL_FROM_ADDRESS'), 'cashwhisperer')
            ->subject($subject)
            ->replyTo(env('MAIL_FROM_ADDRESS'), 'cashwhisperer')
            ->attach($pdfPath, [
                'as' => 'invoice.pdf', // Set the name of the attached file
                'mime' => 'application/pdf', // Set the MIME type
            ]);
    }

    public function invoice_overdue_chase2_email($details = array())
    {
        $subject = $details['subject'];
        $pdfPath = public_path('uploads/invoices/uploads/' . $details['invoice']->invoice_pdf);


        return $this->view('pages.invoices.email.invoice_overdue_chase2_email', ['details' => $details])
            ->from(env('MAIL_FROM_ADDRESS'), 'cashwhisperer')
            ->subject($subject)
            ->replyTo(env('MAIL_FROM_ADDRESS'), 'cashwhisperer')
            ->attach($pdfPath, [
                'as' => 'invoice.pdf', // Set the name of the attached file
                'mime' => 'application/pdf', // Set the MIME type
            ]);
    }
}
