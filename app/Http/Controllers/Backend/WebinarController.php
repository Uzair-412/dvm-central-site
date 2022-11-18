<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Webinar;
use App\Models\Events;
use App\Models\Speaker;
use App\Models\SpeakerWebinar;
use Spatie\IcalendarGenerator\Components\Calendar;
use Spatie\IcalendarGenerator\Components\Event;
use DateTime;
use App\Http\Requests\Backend\WebinarsRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class WebinarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data['p_heading']      = 'Manage Webinars';
        $data['p_description']  = 'Here is the list of Webinars';

        $data['webniar']     = Webinar::paginate(10);

        return view('backend.webinars.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $data['p_heading']      = 'Create Webinars';
        $data['p_description']  = 'Create a new Webinars by filling the form below';
        $data['webinars']['status'] = 'Y';
        $data['events'] = Events::where('show_in_vendor', 'Y')->get()->pluck('name', 'id');
        // $data['speakers'] = Speaker::where('status', 'Y')->get()->pluck('first_name', 'id');
        $data['speakers'] = Speaker::pluckSpeaker();
        $data['speaker'] = null;
        
        return view('backend.webinars.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(WebinarsRequest $request)
    {   
        if($request->show_in_app == null){
            $request->show_in_app = 0;
        }
        $validated = $request->validated();

        if($validated){
            if($request->file('image')){
                $file = $request->file('image');
                $filename = date('Ymdis').'.'.$file->getClientOriginalExtension();
                $file->move(public_path('up_data/webiners/images/'),$filename);
                $data['image'] = $filename;
            }else{
                $data['image'] = "na.webp";
            }
            
            $data['webinar'] = Webinar::create($validated + [
                'image' => $data['image'],
                'file' => date('Ymdis').'.ics',
                'event_id' => $request->event_id,
                'short_detail' => $request->short_detail,
                'full_detail' => $request->full_detail,
                'location' => $request->location,
                'zoom_link' => $request->zoom_link,
                'zoom_meeting_id' => $request->zoom_meeting_id,
                'zoom_password' => $request->zoom_password,
                'status' => $request->status,
                'video_url'=>$request->video_url,
                'video_type' => $request->video_type,
                'show_in_app' => (int)@$request->show_in_app,
                'webinar_type' => $request->webinar_type,
            ]);

            $data['speaker_id'] = $request->speaker_id;
            foreach($data['speaker_id'] as $speaker_id)
            {
                SpeakerWebinar::create([
                    'speaker_id' => $speaker_id,
                    'webinar_id' => $data['webinar']->id,
                ]);
            }

            $data['eventcal'] = $this->EventCalendar($data['webinar']);
            
            return redirect()->route('admin.webinars.index')->with('flash_success','Webinar created successfully.');
        }
    }

    public function EventCalendar($data)
    {
    
        $data['calendar'] = Calendar::create()
            ->name($data->name)
            ->description($data->short_detail)
            ->event(Event::create($data->name)
            ->startsAt(new DateTime($data->start_date))
            ->endsAt(new DateTime($data->end_date))
            )->get()
         ;

         $file = $data->file;
         $destinationPath = public_path()."/up_data/webiners/files/";
         if (!is_dir($destinationPath)) {  mkdir($destinationPath,0777,true);  }
         $data = File::put($destinationPath.$file,$data['calendar']);
        
        return $data;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['webiner']     = Webinar::find($id);
        if(@$data['webiner']){
            $data['p_heading']      = $data['webiner']['name'];
            $data['p_description']  = 'Here is the Webinar Details';

            return view('backend.webinars.show', compact('data'));
        }
        
        return redirect()->route('admin.webinars.index')->with('flash_danger','Page not found.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['webinars'] = Webinar::find($id);

        if(@$data['webinars']){
            $data['webinars']['start_date'] = date('Y-m-d\TH:i', strtotime($data['webinars']['start_date']));
            $data['webinars']['end_date'] = date('Y-m-d\TH:i', strtotime($data['webinars']['end_date']));
            $data['events'] = Events::where('show_in_vendor', 'Y')->get()->pluck('name', 'id');
            $data['speakers'] = Speaker::pluckSpeaker();
            $data['p_heading']      = 'Update Webinars';
            $data['p_description']  = 'Update a Webinars by filling the form below';
            $data['speaker'] = $data['webinars']->speaker->pluck('id')->toArray();
            // dd($data['speakers'] = $data['speakers']->toArray());
            return view('backend.webinars.edit', compact('data'));
        }

        return redirect()->route('admin.webinars.index')->with('flash_danger','Page not found.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(WebinarsRequest $request, $id)
    {
        if ($request->show_in_app == null) {
            $request->show_in_app = 0;
        }
        $validated = $request->validated();
        $data['webinar'] = Webinar::find($id);

        if($validated){
            if($request->file('image')){
                $file = $request->file('image');
                @unlink(public_path('up_data/webiners/images/'.$data['webinar']['image']));
                $filename = date('Ymdis').'.'.$file->getClientOriginalExtension();
                $file->move(public_path('up_data/webiners/images/'),$filename);
                $data['image'] = $filename;
            }else{
                $data['image'] = $data['webinar']['image'];
            }

            $data['webinar']->update($validated + [
                'image' => $data['image'],
                'event_id' => $request->event_id,
                'short_detail' => $request->short_detail,
                'full_detail' => $request->full_detail,
                'location' => $request->location,
                'zoom_link' => $request->zoom_link,
                'zoom_meeting_id' => $request->zoom_meeting_id,
                'zoom_password' => $request->zoom_password,
                'status' => $request->status,
                'video_url' => $request->video_url,
                'video_type' => $request->video_type,
                'show_in_app' => $request->show_in_app,
                'webinar_type' => $request->webinar_type,
            ]);
            
            $data['speaker_id'] = $request->speaker_id;
            $data['speakerWebinar'] = SpeakerWebinar::where('webinar_id', $data['webinar']->id)->get();
            foreach($data['speakerWebinar'] as $speakerWebinar){
                $test = $speakerWebinar->delete();
            }
            
            foreach($data['speaker_id'] as $speaker_id)
            {
                SpeakerWebinar::create([
                    'speaker_id' => $speaker_id,
                    'webinar_id' => $data['webinar']->id,
                ]);
            }

            return redirect()->route('admin.webinars.index')->with('flash_success','Webinar updated successfully.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data['webinar'] = Webinar::find($id);
        @unlink(public_path('up_data/webiners/images/'.$data['webinar']['image']));
        $data['webinar']->delete();
        return redirect()->route('admin.webinars.index')->with('flash_success','Webinar deleted successfully.');
    }
}
