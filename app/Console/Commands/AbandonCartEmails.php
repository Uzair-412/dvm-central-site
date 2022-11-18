<?php

namespace App\Console\Commands;

use App\Mail\Frontend\Order\SendACEmailOne;
use App\Models\Messages;
use App\Models\Order;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class AbandonCartEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'AC:Emails';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send emails to abandon cart customers';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        // -- First Email -- \\
        $date = date('Y-m-d 00:00:00', strtotime('-2 Days'));
        $orders = Order::where(['order_status' => 3, 'ac_emails' => 0])
                    ->where('created_at', '<', $date)
                    ->get();

        self::send_ac_emails($orders, 1);
        // -- End First Email -- \\

        // -- Second Email -- \\
        $date = date('Y-m-d 00:00:00', strtotime('-5 Days'));
        $orders = Order::where(['order_status' => 3, 'ac_emails' => 1])
            ->where('created_at', '<', $date)
            ->get();

        self::send_ac_emails($orders, 2);
        // -- End Second Email -- \\

        // -- Third Email -- \\
        $date = date('Y-m-d 00:00:00', strtotime('-7 Days'));
        $orders = Order::where(['order_status' => 3, 'ac_emails' => 2])
            ->where('created_at', '<', $date)
            ->get();

        self::send_ac_emails($orders, 3);
        // -- End Third Email -- \\
    }

    public static function send_ac_emails($orders, $ac_status = 1)
    {
        foreach($orders as $order)
        {
            self::send_ac_email($order, $ac_status);
        }
    }

    public static function send_ac_email($order, $ac_status, $update_ac_status = true)
    {
        if($order->country == 233 || $order->country == 39)
        {
            $coupon = 'SUPER10'; // with free shipping
            $subject = Messages::$subjects1[$ac_status];
            $tag_line = '10% Discount + Free Ground Shipping';
            $discount_info = '10% Discount Coupon with Free Ground Shipping';
        }
        else
        {
            $coupon = 'DISCOUNT10'; // without free shipping
            $subject = Messages::$subjects2[$ac_status];
            $tag_line = '10% Discount Only for You!';
            $discount_info = '10% Discount Coupon';
        }

        if($update_ac_status)
        {
            $order->ac_emails = $ac_status;
            $order->save();
        }

        $order->ac_subject = $subject;
        $order->ac_coupon = $coupon;
        $order->ac_tag_line = $tag_line;
        $order->ac_discount_info = $discount_info;

        // Saving the message in DB
        $message = (new SendACEmailOne($order))->render();
        $data['customer_id']    = $order->customer_id;
        $data['order_id']       = $order->id;
        $data['type']           = 'ac_email';
        $data['subject']        = $subject;
        $data['message']        = $message;
        // End saving the message in DB

        Messages::create($data);

        Mail::send(new SendACEmailOne($order));
    }
}
