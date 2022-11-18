<?php

namespace App\Mail\Frontend\Newsletter;

use Illuminate\Http\Request;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

/**
 * Class SendContact.
 */
class SendSubscriptionWithCoupon extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var Request
     */
    public $data;

    /**
     * SendContact constructor.
     *
     * @param Request $request
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->to($this->data['email'], $this->data['name'])
            //->cc('farhanasim@gmail.com')
            ->view('frontend.mail.subscription-discount-coupon')
            ->subject('Here is your 10% Discount Coupon from ' . appName())
            ->from('waleed.gmit@gmail.com', appName())
            ->replyTo('no-reply@gervetusa.com', 'No-Reply');
    }
}