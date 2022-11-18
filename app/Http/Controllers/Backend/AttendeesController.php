<?php

namespace App\Http\Controllers\Backend;

use App\Models\State;
use App\Models\Country;
use App\Models\Attendee;
use Illuminate\Http\Request;
use App\Domains\Auth\Models\User;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\AttendeeRequest;

class AttendeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['p_heading']      = 'Manage Attendee';
        $data['p_description']  = 'Here is the list of Attendee';

        return view('backend.attendees.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['p_heading']      = 'Create Attendee';
        $data['p_description']  = 'Create a new Attendee by filling the form below';
        $data['countries']      = Country::pluck('name', 'id');
        $data['credentials']    = [];
        $data['users'] = User::select('id', DB::raw("CONCAT(first_name, ' ', last_name) AS name"))->where('type','attendee')->orWhere('type','customer')->get();

        $data['cmd'] = 'create';

        return view('backend.attendees.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AttendeeRequest $request)
    {
        $validated = $request->validated();

        if(!$validated){
            return back();
        }else{
            $data = $request->except('image');

            if($request->file('image')){
                $file = $request->file('image');
                $filename = date('Ymdis').'.'.$file->getClientOriginalExtension();
                $file->move(public_path('up_data/attendees/images/'),$filename);
                $data['image'] = $filename;
            }else{
                $data['image'] = "na.webp";
            }
  
        }

        if(isset($data['credentials']) && is_array($data['credentials']))
            $data['credentials'] = implode(',', $data['credentials']);

        $attendee = Attendee::create($data);

        return redirect()->route('admin.attendees.index')->with('flash_success','Attendee added successfully.');
    }

        
    /**
     * show
     *
     * @param  mixed $attendee
     * @return void
     */
    public function show(Attendee $attendee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Attendee  $attendee
     * @return \Illuminate\Http\Response
     */
    public function edit(Attendee $attendee)
    {
        $data['attendees']           = $attendee;
        $data['p_heading']      = 'Update Attendee';
        $data['p_description']  = 'Modify Attendee by filling the form below';

        $data['countries']      = Country::pluck('name', 'id');

        $country = Country::select('id')->where('id', $data['attendees']->country)->first();
        $data['attendee_country'] = $country->id;
        $data['attendee_state'] = State::get_state_name($data['attendees']->state);
        $data['users'] = User::select('id', DB::raw("CONCAT(first_name, ' ', last_name) AS name"))->where('type','attendee')->orWhere('type','customer')->get();
        
        $credentials            = explode(',', $data['attendees']->credentials);

        if(trim($data['attendees']->credentials) != null && is_array($credentials) && count($credentials) > 0)
        {
            foreach($credentials as $credential)
            {
                $data['credentials'][$credential] = $credential;
            }
            $data['attendees']->credentials = $credentials;
        }
        else
        {
            $data['credentials'] = [];
        }

        $data['cmd'] = 'edit';

        return view('backend.attendees.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Attendee  $attendee
     * @return \Illuminate\Http\Response
     */
    public function update(AttendeeRequest $request, Attendee $attendee)
    {
        $validated = $request->validated();

        if(!$validated){
            return back();
        }else{

            $data = $request->except('image');

            if($request->file('image')){
                $file = $request->file('image');
                @unlink(public_path('up_data/attendees/images/'.$data['image_old']));
                $filename = date('Ymdis').'.'.$file->getClientOriginalExtension();
                $file->move(public_path('up_data/attendees/images/'),$filename);
                $data['image'] = $filename;
            }else{
                $data['image'] = $data['image_old'];
            }
  
        }
        
        if(isset($data['credentials']) && is_array($data['credentials']))
            $data['credentials'] = implode(',', $data['credentials']);

        $attendee->update($data);
        
        return redirect()->route('admin.attendees.index')->with('flash_success','Attendee updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Attendee  $attendee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Attendee $attendee)
    {
        
        @unlink(public_path('up_data/attendees/images/'.$attendee->image));
        $attendee->delete();
        
        return back()->with('flash_success','Attendee deleted successfully.');
    }
}
