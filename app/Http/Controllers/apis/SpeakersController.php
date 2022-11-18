<?php

namespace App\Http\Controllers\apis;

use App\Http\Controllers\Controller;
use App\Models\Events;
use App\Models\Speaker;
use Illuminate\Http\Request;

class SpeakersController extends Controller
{
    public function index()
    {
        $data['speakers'] = Speaker::where('status', 'Y')->get();
        $data['event'] = Events::find(7);

        return response()->json($data, 200);
    }

    public function speaker_details($id)
    {
        $speaker = Speaker::where('id', $id)->first();

        if ($speaker) {
            return response()->json($speaker, 200);
        } else {
            return response()->json('Speaker not found', 202);
        }
    }

    public function web_speaker_details($id)
    {
        $data['speaker'] = Speaker::find($id);
        //Breadcrumbs
        $slugUrl = 'news';
        $data['breadcrumb'] = true;
        $data['breadcrumbs']    = [];
        array_push($data['breadcrumbs'], (array)['name' => 'speaker','link' => '/speaker']);
        
        //Page Type
        $data['page_type']    = 'speakers_details';

        if ($data['speaker']) {
            return response()->json($data, 200);
        } else {
            return response()->json('Speaker not found', 201);
        }
    }

    public function web_search_speakers($search){
        if(trim($search) == null)
            $search = null;

        $query = Speaker::where('status','Y');
        
        $search = trim($search);
        if($search != null)
        {
            $query->where(function($query) use ($search)  {

                $query->orWhere('first_name', 'like', '%' . $search . '%');
                $query->orWhere('last_name', 'like', '%' . $search . '%');
            });
            
            $data['speakers'] = $query->get();
        }else{
            $data['speakers'] = Speaker::where('status','Y')->get();
        }
        $data['page_type']    = 'speakers_list';
        return response()->json($data, 200);
    }

    public function filter_speakers(Request $request){  
        $data['speakers']= Self::getSpeakerFilter($request->all());
        $data['page_type']    = 'speakers_list';
        return response()->json($data, 200);
    }

    public function getSpeakerFilter(array $filter = []){
        $query = Speaker::where('status','Y');
        if(count($filter) > 0)
        {
            $query->where( function($q) use($filter) {
                if (isset($filter['job_title']))
                {
                    $q->orWhere(function ($subQ) use ($filter) {
                        foreach ($filter['job_title'] as $job_title) {
                            $subQ->orWhere('job_title',$job_title);
                        }
                    });
                }

                if (isset($filter['institute']))
                {
                    $q->orWhere( function ($subQ) use ($filter) {
                        foreach ($filter['institute'] as $institute) {
                            $subQ->orWhere('institute',$institute);
                        }
                    });
                }
            });
        }
        return $query->paginate(12);
    }
}
