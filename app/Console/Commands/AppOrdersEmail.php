<?php

namespace App\Console\Commands;

use App\Mail\Frontend\App\SendAppOrdersCsv;
use App\Models\AppOrders;
use App\Models\AppOrdersItems;
use Illuminate\Console\Command;

class AppOrdersEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'AppOrders:Emails';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send list of app orders as email';

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
        $file_name = 'Event_Orders_'.date('m-d-y').'.csv';
        $file_path = public_path().'/up_data/app_orders/'.$file_name;

        $out = fopen($file_path, 'w');

        $data = ['Name', 'Phone', 'Email', 'Address Line 1', 'Address Line 2', 'City', 'State', 'Zip / Post Code', 'Country', 'Notes', 'Sub Total', 'Discount', 'Grand Total','Date / Time'];

        fputcsv($out, $data);

        $orders = AppOrders::where('sent', '=', 'N')->get();

        $send_order_email = false;

        foreach($orders as $order)
        {
            $send_order_email = true;

            //AppOrders::where('id', $order->id)->update(['sent' => 'Y']);


            $data = [];

            $data[] = $order->first_name.' '.$order->last_name;
            $data[] = $order->phone;
            $data[] = $order->email;
            $data[] = $order->address1;
            $data[] = $order->address2;
            $data[] = $order->city;
            $data[] = $order->state;
            $data[] = $order->zip;
            $data[] = $order->country;
            $data[] = $order->notes;
            $data[] = '$'.number_format($order->sub_total, 2);
            $data[] = '($'.number_format($order->discount, 2).')';
            $data[] = '$'.number_format($order->grand_total, 2);
            $data[] = $order->created_at;

            fputcsv($out, $data);
            $data = ['', '', '', '', '', '','','','','','','','',''];

            fputcsv($out, $data);

            $items = AppOrdersItems::where('order_id', '=', $order->id)->get();

            $inc = 0;
            foreach($items as $item)
            {
                if($inc == 0)
                {
                    $data = [];

                    $data[] = '';
                    $data[] = '';
                    $data[] = 'SKU';
                    $data[] = 'Name';
                    $data[] = 'Price';
                    $data[] = 'Quantity';
                    $data[] = 'Total';
                    $data[] = '(Discount)';
                    $data[] = '';
                    $data[] = '';
                    $data[] = '';
                    $data[] = '';
                    $data[] = '';
                    $data[] = '';
                    fputcsv($out, $data);
                }

                $data = [];

                $total_org = $item->price_org * $item->qty;
                $total = $item->price * $item->qty;
                $discount = $total_org - $total;

                $data[] = '';
                $data[] = '';
                $data[] = $item->sku;
                $data[] = $item->name;
                $data[] = '$'.$item->price;
                $data[] = $item->qty;
                $data[] = '$'.number_format($total, 2);
                $data[] = '($'.number_format($discount, 2).')';
                $data[] = '';
                $data[] = '';
                $data[] = '';
                $data[] = '';
                $data[] = '';
                $data[] = '';

                fputcsv($out, $data);

                unset($data);

                $order->sent = 'Y';
                $order->save();

                $inc++;
            }

            $data = ['', '', '', '', '', '','','','','','','','',''];
            fputcsv($out, $data);

            $data = ['', '', '', '', '', '','','','','','','','',''];
            fputcsv($out, $data);

        }

        fclose($out);

        if($send_order_email)
        {
            \Mail::to(['farhanasim@gmail.com', 'farhan@germedusait.com'])->send(new SendAppOrdersCsv($file_path));
        }
    }
}
