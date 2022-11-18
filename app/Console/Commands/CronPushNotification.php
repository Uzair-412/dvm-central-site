<?php

namespace App\Console\Commands;

use App\Http\Controllers\Backend\PushNotificationController;
use Illuminate\Console\Command;

class CronPushNotification extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cron:push_notification';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
     * @return int
     */
    public function handle()
    {
        $pushNotificationController = new PushNotificationController();
        $response = $pushNotificationController->send_pending_notifications();
        \Log::info($response);
        return 0;
    }
}
