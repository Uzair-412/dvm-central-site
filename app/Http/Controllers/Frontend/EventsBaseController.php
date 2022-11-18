<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Events;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Redirect;

/**
 * Class EventsBaseController.
 */
class EventsBaseController
{
    public $event;

    public function __construct($slug)
    {
        $event = Events::getEventBySlug($slug);
        if($event)
        {
            $this->event = $event;
            View::share('event', $event);
        }
        else
            Redirect::to('/events')->send();
    }
}