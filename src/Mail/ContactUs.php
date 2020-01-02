<?php

namespace Kazakevic\ContactUs\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Http\Request;

class ContactUs extends Mailable
{
    use Queueable, SerializesModels;

    /** @var Request */
    private $request;

    /**
     * Create a new message instance.
     *
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this->request->email)->view('mails.contactUs')->with([
            'msg' => $this->request->message
        ]);
    }
}
