<?php

namespace App\Mail\Frontend\Contact;

use Illuminate\Http\Request;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

/**
 * Class SendContact.
 */
class SendContact extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var Request
     */
    public $request;

    /**
     * SendContact constructor.
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
        return $this->to('info@gervetusa.com', 'GerVetUSA')
            ->cc(['info@germedusa.com', 'mughal@germedusa.com'])
            ->view('frontend.mail.contact')
            ->text('frontend.mail.contact-text')
            ->subject(__('Contact Form', ['appName' => appName()]))
            ->from($this->request->email, $this->request->name)
            ->replyTo($this->request->email, $this->request->name);
    }
}