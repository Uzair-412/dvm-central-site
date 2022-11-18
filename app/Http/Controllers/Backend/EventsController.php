<?php

namespace App\Http\Controllers\Backend;

use App\Models\Slug;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;
use App\Models\Events;
use App\Models\EventSpeaker;
use App\Models\Speaker;
use App\Models\State;
use DateTime;
use DB;

class EventsController extends Controller
{
    protected $storage;
    public $hours = ['00' => '00', '01' => '01', '02' => '02', '03' => '03', '04' => '04', '05' => '05', '06' => '06', '07' => '07', '08' => '08', '09' => '09', '10' => '10', '11' => '11', '12' => '12', 
    '13' => '13', '14' => '14', '15' => '15', '16' => '16', '17' => '17', '18' => '18', '19' => '19', '20' => '20', '21' => '21', '22' => '22', '23' => '23'];
    public $minutes = ['00' => '00', '15' => '15', '33' => '33', '45' => '45'];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['p_heading']      = 'Manage Events';
        $data['p_description']  = 'Here is the list of Events';

        $data['events']     = Events::paginate(10);

        return view('backend.events.index', compact('data'));
    }

    /**
     * Event the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['p_heading']      = 'Create Event';
        $data['p_description']  = 'Create a new event by filling the form below';

        $data['status']             = 'Y';
        $data['show_in_vendor']     = 'Y';
        
        $data['type']       = 'virtual';
        $data['hours']      = $this->hours;
        $data['minutes']    = $this->minutes;
        $data['speakers']   = Speaker::select(DB::raw("CONCAT(first_name,' ',last_name) AS name"),'id')->pluck('name', 'id');
        $data['states']     = State::where('country_id', 233)->orderBy('name', 'asc')->pluck('name','id');

        return view('backend.events.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $slug = $data['slug'];

        $data['end_date'] = $data['end_date'].' '.$data['end_hh'].':'.$data['end_mm'].':00';
        $data['start_date'] = $data['start_date'].' '.$data['start_hh'].':'.$data['start_mm'].':00';

        $check = (new Slug())->checkIfExists($slug);
        
        if($check)
        {
            return back()->with('flash_danger','The slug is not unique.');
        }

        if($request->file('image'))
        {
            $path = public_path($this->getStorage());
            $path = $path.'/images/';
            $ext = '.'.$request->file('image')->getClientOriginalExtension();

            $file_name = Str::slug($data['name']).'-image-'.time().$ext;
            $data['image'] = $file_name;
            $request->file('image')->move($path, $file_name);
        }

        if($request->file('thumbnail'))
        {  
            $path = public_path($this->getStorage());
            $path = $path.'/thumbnails/';
            $ext = '.'.$request->file('thumbnail')->getClientOriginalExtension();

            $file_name = Str::slug($data['name']).'-thumbnail-'.time().$ext;
            $data['thumbnail'] = $file_name;
            $request->file('thumbnail')->move($path, $file_name);
        }

        if($request->file('video'))
        {
            $path = public_path($this->getStorage());
            $path = $path.'/videos/';
            $ext = '.'.$request->file('video')->getClientOriginalExtension();

            $file_name = Str::slug($data['name']).'-video-'.time().$ext;
            $data['video'] = $file_name;
            $request->file('video')->move($path, $file_name);
        }

        $speakers = $data['speakers'];
        unset($data['speakers']);
        $event = Events::create($data);
        foreach($speakers as $speaker_id)
        {
            $event_new_speaker = new EventSpeaker();
            $event_new_speaker->speaker_id = $speaker_id;
            $event_new_speaker->event_id = $event->id;
            $event_new_speaker->created_at = date('Y-m-d H:i:s');
            $event_new_speaker->save();
        }
        $event->slugs()->create(['slug' => $slug]);

        return redirect()->route('admin.events.index')->with('flash_success','Event created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Events $events)
    {
        //
    }

    /**
     * Event the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Events $event)
    {
        $data['event']           = $event;
        $data['p_heading']      = 'Update Trade event';
        $data['p_description']  = 'Modify trade events by filling the form below';

        $data['status']             = 'Y';
        $data['show_in_vendor']     = 'Y';
        
        $data['type']       = 'virtual';

        // Start Time
        $start_date_time = $data['event']['start_date'];
        $start_time = explode(" ", $start_date_time);
        $start_date = explode(":", $start_time[0]);
        $data['event']->start_date = $start_date[0];
        $data['start_time'] = explode(":", $start_time[1]);

        // End Time
        $end_date_time = $data['event']['end_date'];
        $end_time = explode(" ", $end_date_time);
        $end_date = explode(":", $end_time[0]);
        $data['event']->end_date = $end_date[0];
        $data['end_time'] = explode(":", $end_time[1]);
        
        $data['hours']      = $this->hours;
        $data['minutes']    = $this->minutes;
        $data['speakers']   = Speaker::select(DB::raw("CONCAT(first_name,' ',last_name) AS name"),'id')->pluck('name', 'id');
        $data['states']     = State::where('country_id', 233)->orderBy('name', 'asc')->pluck('name','id');

        return view('backend.events.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Events $event)
    {
        $data = $request->all();

        $data['end_date'] = $data['end_date'].' '.$data['end_hh'].':'.$data['end_mm'].':00';
        $data['start_date'] = $data['start_date'].' '.$data['start_hh'].':'.$data['start_mm'].':00';

        if($request->file('image'))
        {
            $path = public_path($this->getStorage());
            $path = $path.'/images';
            if($event->image != '')
            {
                $file = $path.'/'.$event->image;

                if(file_exists($file) && is_file($file))
                {
                    unlink($file);
                }
            }

            $ext = '.'.$request->file('image')->getClientOriginalExtension();
            $file_name = Str::slug($data['name']).'-image-'.time().$ext;
            $data['image'] = $file_name;
            $request->file('image')->move($path, $file_name);
        }

        if($request->file('thumbnail'))
        {  
            $path = public_path($this->getStorage());
            $path = $path.'/thumbnails';
            $ext = '.'.$request->file('thumbnail')->getClientOriginalExtension();
            // dd($path, $ext);
            if($event->thumbnail != '')
            {
                $file = $path.$event->thumbnail;
                if(file_exists($file) && is_file($file))
                {   
                    unlink($file);
                }
            }

            $file_name = Str::slug($data['name']).'-thumbnail-'.time().$ext;
            $data['thumbnail'] = $file_name;
            $request->file('thumbnail')->move($path, $file_name);
        }

        if($request->file('video'))
        {
            $path = public_path($this->getStorage());
            $path = $path.'/videos';
            if($event->video != '')
            {
                $file = $path.'/'.$event->video;

                if(file_exists($file) && is_file($file))
                {
                    unlink($file);
                }
            }

            $ext = '.'.$request->file('video')->getClientOriginalExtension();
            $file_name = Str::slug($data['name']).'-video-'.time().$ext;
            $data['video'] = $file_name;
            $request->file('video')->move($path, $file_name);
        }

        $speakers = $data['speakers'];
        unset($data['speakers']);
        $event->update($data);
        
        EventSpeaker::where('event_id', $event->id)->delete();
        foreach($speakers as $speaker_id)
        {
            $event_new_speaker = new EventSpeaker();
            $event_new_speaker->speaker_id = $speaker_id;
            $event_new_speaker->event_id = $event->id;
            $event_new_speaker->created_at = date('Y-m-d H:i:s');
            $event_new_speaker->save();
        }

        return redirect()->route('admin.events.index')->with('flash_success','Trade event updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Events $event)
    {
        $image = $event->image;
        $video = $event->video;
        $event->delete();

        $file = public_path($this->getStorage()).'/'.$image;
        if(file_exists($file) && is_file($file))
            unlink($file);

        $file = public_path($this->getStorage()).'/'.$video;
        if(file_exists($file) && is_file($file))
            unlink($file);

        return back()->with('flash_success','Trade event deleted successfully.');
    }

    public function getStorage()
    {
        return env('UPLOADS_DIR').'/up_data/events';
    }
}
