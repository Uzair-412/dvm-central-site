<?php

namespace App\Http\Controllers\Backend;

use App\Models\Speaker;
use App\Models\Country;
use App\Models\State;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\SpeakerRequest;
use Illuminate\Support\Str;
use App\Http\Requests\Backend\SpeakerFilesRequest;
use App\Models\SpeakerFiles;

class SpeakersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['p_heading']      = 'Manage Speaker';
        $data['p_description']  = 'Here is the list of Speaker';

        return view('backend.speakers.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['p_heading']      = 'Create Speaker';
        $data['p_description']  = 'Create a new Speaker by filling the form below';
        $data['countries']      = Country::pluck('name', 'id');
        $data['credentials']    = [];

        $data['cmd'] = 'create';

        return view('backend.speakers.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SpeakerRequest $request)
    {
        $validated = $request->validated();

        if(!$validated)
            return back();

        $data = $request->all();
        
        if(isset($data['credentials']) && is_array($data['credentials']))
            $data['credentials'] = implode(',', $data['credentials']);

        if($request->file('profile'))
        {
            $path = public_path($this->getStorage());
            $ext = '.'.$request->file('profile')->getClientOriginalExtension();

            $file_name = Str::slug($data['first_name'].' '.$data['last_name']).'-profile-'.time().$ext;
            $data['profile'] = $file_name;
            $request->file('profile')->move($path, $file_name);
        }

        $speaker = Speaker::create($data);

        if($speaker)
            return redirect()->route('admin.speakers.index')->with('flash_success','Speaker added successfully.');
    }

        
    /**
     * show
     *
     * @param  mixed $speaker
     * @return void
     */
    public function show(Speaker $speaker)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Speaker  $speaker
     * @return \Illuminate\Http\Response
     */
    public function edit(Speaker $speaker)
    {
        $data['speakers']           = $speaker;
        $data['p_heading']      = 'Update Speaker';
        $data['p_description']  = 'Modify Speaker by filling the form below';

        $data['countries']      = Country::pluck('name', 'id');

        $country = Country::select('id')->where('id', $data['speakers']->country)->first();
        $data['speaker_country'] = $country->id;
        $data['speaker_state'] = State::get_state_name($data['speakers']->state);
        
        $credentials            = explode(',', $data['speakers']->credentials);

        if(trim($data['speakers']->credentials) != null && is_array($credentials) && count($credentials) > 0)
        {
            foreach($credentials as $credential)
            {
                $data['credentials'][$credential] = $credential;
            }
            $data['speakers']->credentials = $credentials;
        }
        else
        {
            $data['credentials'] = [];
        }

        $data['cmd'] = 'edit';

        return view('backend.speakers.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Speaker  $speaker
     * @return \Illuminate\Http\Response
     */
    public function update(SpeakerRequest $request, Speaker $speaker)
    {
        $validated = $request->validated();

        if(!$validated)
            return back();

        $data = $request->all();
        
        if(isset($data['credentials']) && is_array($data['credentials']))
            $data['credentials'] = implode(',', $data['credentials']);

        if($request->file('profile'))
        {
            $path = public_path($this->getStorage());

            if($speaker->profile != '')
            {
                $file = $path.'/'.$speaker->profile;

                if(file_exists($file) && is_file($file))
                {
                    unlink($file);
                }
            }

            $ext = '.'.$request->file('profile')->getClientOriginalExtension();
            $file_name = Str::slug($data['first_name'].' '.$data['last_name']).'-profile-'.time().$ext;
            $data['profile'] = $file_name;
            $request->file('profile')->move($path, $file_name);
        }

        $speaker->update($data);
        
        return redirect()->route('admin.speakers.index')->with('flash_success','Speaker updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Speaker  $speaker
     * @return \Illuminate\Http\Response
     */
    public function destroy(Speaker $speaker)
    {
        $image = $speaker->image;

        $file = public_path($this->getStorage()).'/'.$image;
        if(file_exists($file) && is_file($file))
            unlink($file);
        
        $speaker->delete();
        return back()->with('flash_success','Speaker deleted successfully.');
    }

    public function getStorage()
    {
        return env('UPLOADS_DIR').'/up_data/speakers';
    }

    public function file_manager($id)
    {

        $data['p_heading']      = 'Update Speaker File';

        $data['speaker'] = Speaker::find($id);
        $data['speaker-files'] = SpeakerFiles::where('speaker_id', $data['speaker']->id)->get();


        return view('backend.speakers.file-manager', compact('data'));
    }

    public function file_upload(SpeakerFilesRequest $request)
    {
        $validated = $request->validated();

        if(!$validated)
            return back();


        if($request->file('file')){
            $file = $request->file('file');
            $filename = date('Ymdis').'.'.$file->getClientOriginalExtension();
            $file->move(public_path('up_data/speakers/files/'),$filename);
            $data['file'] = $filename;
        }

        if($request->file('image')){
            $file = $request->file('image');
            $filename = date('Ymdis').'.'.$file->getClientOriginalExtension();
            $file->move(public_path('up_data/speakers/images/'),$filename);
            $data['image'] = $filename;
        }else{
            $data['image'] = "na.webp";
        }

        $data['speaker-file'] = SpeakerFiles::create([
            'title' => $request->title,
            'description' => $request->description,
            'position' => $request->position,
            'speaker_id' => $request->speaker_id,
            'file' => $data['file'],
            'image' => $data['image']
        ]);

        return redirect()->back()->with('flash_success','Speaker files add successfully.'); 
    }

    public function file_upload_edit($speaker_id, $id)
    {

        $data['p_heading']      = 'Update Speaker File';

        $data['speaker-files'] = SpeakerFiles::find($id);
        $data['speaker-file'] = SpeakerFiles::where('speaker_id',$speaker_id)->get();
        // dd($data['speaker-file']);
        return view('backend.speakers.file-manager-edit', compact('data'));
    }

    public function file_upload_update(SpeakerFilesRequest $request, $speaker_id, $id)
    {
        $validated = $request->validated();

        if(!$validated)
            return back();

        $data['speaker-file'] = SpeakerFiles::find($id);
        
        if($request->file('new_file')){
            $file = $request->file('new_file');
            @unlink(public_path('up_data/speakers/files/'.$request->file));
            $filename = date('Ymdis').'.'.$file->getClientOriginalExtension();
            $file->move(public_path('up_data/speakers/files/'),$filename);
            $data['file'] = $filename;
        }else{
            $data['file'] = $request->file;
        }

        if($request->file('new_image')){
            $file = $request->file('new_image');
            @unlink(public_path('up_data/speakers/files/'.$request->image));
            $filename = date('Ymdis').'.'.$file->getClientOriginalExtension();
            $file->move(public_path('up_data/speakers/images/'),$filename);
            $data['image'] = $filename;
        }else{
            $data['image'] = $request->image;
        }
        
        $data['speaker-file']->update([
            'title' => $request->title,
            'description' => $request->description,
            'position' => $request->position,
            'speaker_id' => $request->speaker_id,
            'file' => $data['file'],
            'image' => $data['image']
        ]);

        if($data['speaker-file'])
            return redirect()->route('admin.speaker.file.upload', [$request->speaker_id])->with('flash_success','Speaker files update successfully.');
    }
}
