<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Events;
use App\Models\Speaker;
use Illuminate\Http\Request;

class SpeakersController extends Controller
{
    public function index()
    {
        $view = 'frontend.speakers.index';
        
        $data['speakers'] = Speaker::where('status', 'Y')->get();
        $data['event'] = Events::find(7);

        return view($view, $data);
    }

    public function speaker($id)
    {
        $view = 'frontend.speakers.speakers-detail';
    
        $data['edit_mode'] = false;

        $data['speaker_data'] = Speaker::find($id);

        if($data['speaker_data']->status == 'N')
            return redirect()->back();        
        $data['credentials'] = explode(',',$data['speaker_data']->credentials);

        return view($view, compact('data'));
    }
}
