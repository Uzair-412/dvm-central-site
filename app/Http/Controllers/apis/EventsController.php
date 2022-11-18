<?php

namespace App\Http\Controllers\apis;

use Auth;
use Carbon\Carbon;
use App\Models\Chat;
use App\Models\EvJob;
use App\Models\Events;
use App\Models\Webinar;
use App\Models\Speaker;
use App\Models\Auth\User;
use App\Models\EventVendors;
use Illuminate\Http\Request;
use App\Models\EventsCategories;
use Illuminate\Support\Facades\View;
use App\Models\SpeakerFiles;
use Illuminate\Support\Facades\Route;
use Response;

class EventsController extends EventsBaseController
{
    public $slug;

    public function __construct()
    {
        $this->slug = Route::current()->parameter('event');

        if($this->slug)
        {
            EventsBaseController::__construct($this->slug);
        }
    }

    public function index()
    {
        $data['events'] = Events::all();
        return response()->json($data, 200);
    }
    
    public function details($id)
    {
        $data['events'] = Events::where('id', $id)->first();
        return response()->json($data, 200);
    }
}
