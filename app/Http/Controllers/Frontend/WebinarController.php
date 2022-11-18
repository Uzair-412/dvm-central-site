<?php

namespace App\Http\Controllers\Frontend;


use App\Http\Controllers\Frontend\EventsController;
use App\Models\Webinar;
use App\Models\Events;
use Illuminate\Support\Facades\URL;

class WebinarController extends EventsController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['webinars'] = Webinar::where(['event_id' => $this->event->id, 'status'=> 'Y'])->get();
        return view('frontend.webinars.index', compact('data'));
    }

    public function webinarShow($event, $id)
    {
        $event_id = Events::where('slug', $event)->value('id');
        $date = date("Y-m-d H:i:s");
        $data['webinars'] = Webinar::where(['event_id' => $event_id, 'status'=> 'Y'])->latest()->take(5)->get();
        $data['webinar'] = Webinar::find($id);

        return view('frontend.webinars.show', compact('data'));
    }
}
