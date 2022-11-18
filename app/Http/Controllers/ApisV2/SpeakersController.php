<?php

namespace App\Http\Controllers\ApisV2;

use App\Http\Controllers\Controller;
use App\Models\Events;
use App\Models\Speaker;
use App\Models\Webinar;
use Illuminate\Http\Request;

class SpeakersController extends Controller
{
    public function index()
    {   $data['breadcrumbs'] = [];
        $parentSlug = "speakers";

        /* Fetching speakers data and Fetching webinars those are start date is greater than today's date */
        $data['speakers'] = Speaker::with('webinarSpeakers')->where('status', 'Y')->select('id','first_name','last_name', 'credentials', 'institute', 'job_title', 'profile')->get();

        /* Fetching webinars those are start date is greater than today's date */
        // $data['webinar'] = Webinar::with('speaker')->where([['show_in_app', 1],['webinar_type', 'website'],['status', 'Y'],['start_date', '>=', date('y-m-d h:i:s')]])->get();

        $data['page_type']    = 'speakers_list';
        // $data['event'] = Events::find(7);

        /* Push main job page slug int breadcrumbs array */
        array_push($data['breadcrumbs'], (array)['name' => $parentSlug,'link' => $parentSlug]);
        return response()->json($data, 200);
    }


    public function speakerDetails($id)
    {
        $data['speaker'] = Speaker::find($id);
        //Breadcrumbs
        $data['breadcrumbs']    = [];
        array_push($data['breadcrumbs'], (array)['name' => 'Speakers','link' => 'speakers']);
        array_push($data['breadcrumbs'], (array)['name' => $data['speaker']->first_name.' '.$data['speaker']->last_name]);
        
        //Page Type
        $data['page_type']    = 'speakers_details';

        if ($data['speaker']) {
            return response()->json($data, 200);
        } else {
            return response()->json('Speaker not found', 201);
        }
    }

    public function searchSpeakers(Request $request){
        if(trim($request->search) == null)
        $request->search = null;

        $query = Speaker::where('status','Y')->select('id','first_name','last_name', 'credentials', 'institute', 'job_title', 'profile');
        
        $search = trim($request->search);
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

    public function filterSpeakers(Request $request){  
        $data['speakers']= Self::filter($request->all());
        $data['page_type']    = 'speakers_list';
        return response()->json($data, 200);
    }

    public function filter(array $filter = []){
        $query = Speaker::where('status','Y')->select('id','first_name','last_name', 'credentials', 'institute', 'job_title', 'profile');
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