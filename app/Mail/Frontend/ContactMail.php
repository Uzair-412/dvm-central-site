<?php

namespace App\Mail\Frontend;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;


    public $details;
    public $request;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($details, $request)
    {
        $this->details = $details;
        $this->request = $request;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->to('info@germedusa.com', 'DVM Central')
            ->cc(['info@germedusa.com', 'mughal@germedusa.com'])
            ->view('frontend.vendor.email')
            ->subject('BECOME A DVM CENTRAL SELLER')
            ->from($this->details['email'], $this->details['name'])
            ->replyTo($this->details['email'], $this->details['name']);

    }
}