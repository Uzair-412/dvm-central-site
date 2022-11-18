<?php

namespace App\Console\Commands;

use App\Mail\Frontend\App\SendAppOrdersCsv;
use App\Mail\Frontend\App\SendGiveawayWinnerNotification;
use App\Models\AppOrders;
use App\Models\AppOrdersItems;
use App\Models\FormSubmission;
use Illuminate\Console\Command;

class GiveawayWinnerNotification extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'GWN:Emails';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send emails to all participants announcing the winner';

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
        if(time() > strtotime('2020-12-07 09:00:00'))
        {
            $data['winner_info'] = 'Jessica Benson (j*********n@****.edu) Kopec Veterinary Associates, Elizabethtown, 17022';

            $result = FormSubmission::where(['type' => 'Enter to Win - AAEP', 'winner_mail_sent' => 'N', 'winner' => 'N'])->limit(2)->get();

            foreach($result as $row)
            {
                FormSubmission::where(['email' => $row->email, 'type' => 'Enter to Win - AAEP'])->update(['winner_mail_sent' => 'Y']);

                $data['first_name'] = $row->first_name;

                //\Mail::to(['farhanasim@gmail.com'])->send(new SendGiveawayWinnerNotification($data));
                \Mail::to([$row->email])->send(new SendGiveawayWinnerNotification($data));
            }
        }
    }
}
