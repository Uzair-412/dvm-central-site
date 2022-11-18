<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Frontend\EventsController;
use App\Models\Attendee;
use Illuminate\Http\Request;
use App\Rules\Captcha;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use LangleyFoxall\LaravelNISTPasswordRules\PasswordRules;
use App\Models\Customer;
use App\Models\Events;
use App\Models\State;
use Illuminate\Support\Facades\Hash;

class AttendeeController extends EventsController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data['attendees'] = Attendee::where('status', 'Y')->get();

        return view('frontend.attendees.index', compact('data'));
    }

    public function attendeeshow($event, $id)
    {
        $data['edit_mode'] = true;
        $data['attendees'] = Attendee::where('status', 'Y')->latest()->take(5)->get();
        $data['attendee'] = Attendee::find($id);
        $data['credentials'] = explode(',',$data['attendee']->credentials);

        $data['chat_resp'] = $data['attendee'];
        
        $data['chat_data'] = EventsController::chat_setup(['chat_resp' => $data['chat_resp'], 'chat_sender_user_type' => 'attendee']);
        //dd($data['chat_data']);

        return view('frontend.attendees.show', compact('data'));
    }

    public function attendeeRegister($event)
    {
        $event = Events::where('slug', $event)->first();
        return view('frontend.attendees.register',compact('event'));
    }

    public function attendeeRegistration(Request $request, $event)
    {
        $data = $this->validator($request->all())->validate();
        $password = Hash::make($data['password']);

        $user = Customer::create([
            'name' => $data['first_name'].' '.$data['last_name'],
            'type' => 'attendee',
            'password' => $password,
            'group_id' => 1,
            'confirmed' => 1,
            'active' => 1,
        ] + $data);
        $attendees = Attendee::create([
            'user' => $user->id,
        ]);

        if($attendees)
        {
            
            $attendee = Attendee::validate($attendees->user, $data['password']);
            if($attendee)
            {
                session()->flash('message', 'You have successfully logged in.');
                return redirect()->route('frontend.events.attendees.edit', [$event, $attendees['id']])->with('flash_success','Customer added successfully.');
            }
        }
    }

    public function attendeeEdit($event, $id)
    {

        if(session()->has('ses_attendee'))
        {

            $data['states'] = State::where('country_id', 233)->select('id', 'name')->get();   
            $data['attendee'] = Attendee::find($id);
            $credentials            = explode(',', $data['attendee']->credentials);

            if(trim($data['attendee']->credentials) != null && is_array($credentials) && count($credentials) > 0)
            {
                foreach($credentials as $credential)
                {
                    $data['credentials'][$credential] = $credential;
                }
                $data['attendee']->credentials = $credentials;
            }
            else
            {
                $data['credentials'] = [];
            }

            if(session()->get('ses_attendee')['attendee_user']['id'] == $data['attendee']->id)
            {
                return view('frontend.attendees.edit', compact('data'));
            }else{
                return redirect()->back();
            }
        }else{
            return redirect()->back();
        }
            
    }


    public function attendeeUpdate(Request $request, $event, $id)
    {
        $attendee = Attendee::find($request->id);
        
        if($request->basic_information == 1)
        {
            if($request->file('image')){
                $file = $request->file('image');
                @unlink(public_path('up_data/attendees/images/'.$attendee->image));
                $filename = date('Ymdis').'.'.$file->getClientOriginalExtension();
                $file->move(public_path('up_data/attendees/images/'),$filename);
                $data['image'] = $filename;
            }else{
                $data['image'] = $attendee->image;
            }
            $attendee->update([
                'address' => $request->address,
                'state' => $request->state,
                'zip' => $request->zip,
                'city' => $request->city,
                'country' => 233,
                'image' => $data['image'],
                'phone' => $request->phone,
                'mobile' => $request->mobile,
            ]); 
        }elseif($request->additional_info == 2){

            if(isset($request->credentials) && is_array($request->credentials))
            $data['credentials'] = implode(',', $request->credentials);

            $attendee->update([
                'job_title' => $request->job_title,
                'institute' => $request->institute,
                'profile' => $request->profile,
                'profession' => $request->profession,
                'classification' => $request->classification,
                'specialty' => $request->specialty,
                'employer_type' => $request->employer_type,
                'practice_role' => $request->practice_role,
                'vets_in_practice' => $request->vets_in_practice,
                'techs_in_practice' => $request->techs_in_practice,
                'practice_revenue' => $request->practice_revenue,
                'credentials' => $data['credentials'],
                'practices_in_group' => $request->practices_in_group,
            ]); 
        }elseif($request->social_info == 3){

            $attendee->update([
                'sm_facebook' => $request->sm_facebook,
                'sm_instagram' => $request->sm_instagram,
                'sm_linkedin' => $request->sm_linkedin,
                'sm_pinterest' => $request->sm_pinterest,
                'sm_vimeo' => $request->sm_vimeo,
                'sm_youtube' => $request->sm_youtube,
                'sm_twitter' => $request->sm_twitter,
                'website' => $request->website,
            ]); 
        }

        return redirect()->back()->with('success','Customer added successfully.');
    }


    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => ['required', 'string', 'max:100'],
            'last_name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')],
            'password' => array_merge(['max:100'], PasswordRules::register($data['email'] ?? null)),
        ]);
    }
}
