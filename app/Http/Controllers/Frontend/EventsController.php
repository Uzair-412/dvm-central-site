<?php

namespace App\Http\Controllers\Frontend;

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

/**
 * Class HomeController.
 */
class EventsController extends EventsBaseController
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */

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
        $data['events'] = Events::where('status', 'Y')->get();
        $view = 'frontend.events.index';
        return view($view, compact('data'));
    }

    public function show()
    {
        // If exhibitor coming from Vendor Portal or Email to directly sign-in using hash link
        if(request()->input('h')) 
        {
            $redirect_to = EventVendors::validateHash(request()->input('h'));
            return redirect()->to($redirect_to); // Redirecting to their own exhibitor portal in edit mode
        }
        // End sign-in and redirect

        $view = 'frontend.events.show';

        $data['exhibitors'] = $this->event->vendors()->where('is_featured', 'Y')->get();
        // also renaming to exhibitors for proper understanding.

        return view($view, compact('data'));
    }

    public function exhibitors($event_slug)
    {
        $view = 'frontend.events.exhibitors';
        
        //$data['exhibitors'] = $this->event->vendors; 
        // renaming to exhibitors for proper understanding.

        $data = [];
        $event = Events::where('slug', $event_slug)->first();
        return view($view, compact('data','event'));
    }

    public function exhibitors_detail($event_name, $id, $display_name)
    {
        $view = 'frontend.events.exhibitors-detail';
    
        $data['edit_mode'] = false;

        $data['chat_resp'] = $data['exhibitor_data'] = EventVendors::find($id);
        
        $data['chat_data'] = self::chat_setup(['chat_resp' => $data['chat_resp'], 'chat_sender_user_type' => 'exhibitor']);

        return view($view, compact('data'));
    }

    public function exhibitors_edit($event_name, $id, $display_name)
    {
        if(session()->has('ses_exhibitor'))
        {
            $ses_exhibitor_id = session()->get('ses_exhibitor')['vendor_event']['id'];

            if($id == $ses_exhibitor_id)
            {
                $view = 'frontend.events.exhibitors-detail';
        
                $data['edit_mode'] = true;

                $ev = EventVendors::find($id);
                $data['exhibitor_data'] = $ev;

                $data['exhibitor_data']->obj_categories = EventsCategories::getExhibitorCategories($ev->categories); 

                return view($view, compact('data'));   
            }
        }

        return redirect('/events/'.$this->slug);
    }

    public function webinars()
    {
        $view = 'frontend.webinars.index';
        return view($view);
    }

    public function webinars_detail($event_name, $id)
    {

        $date = date("Y-m-d H:i:s");
        if(session()->get('ses_attendee')){
            $data['attendee_email'] = session()->get('ses_attendee')['attendee_user']->users->email;
        }
        $data['webinars'] = Webinar::where(['event_id' => $this->event->id, 'status'=> 'Y'])->latest()->take(5)->get();
        $data['webinar'] = Webinar::find($id);
        
        return view('frontend.webinars.show', compact('data'));
    }

    public function speakers()
    {
        $view = 'frontend.events.speakers';
        
        $data['speakers'] = Speaker::where('status', 'Y')->get();

        return view($view, compact('data'));
    }

    public function speakers_detail($event_name, $id)
    {
        $view = 'frontend.events.speakers-detail';
    
        $data['edit_mode'] = false;

        $data['speaker_data'] = Speaker::find($id);

        if($data['speaker_data']->status == 'N')
            return redirect()->back();        
        $data['credentials'] = explode(',',$data['speaker_data']->credentials);

        return view($view, compact('data'));
    }

    public function document_download($id)
    {
        $data = SpeakerFiles::find($id);
        $file = public_path().'/up_data/speakers/files/'.$data->file;
        return Response::download($file);
    }

    public function job_listings()
    {
        $view = 'frontend.events.job-listings';
        
        //$data['jobs'] = EvJob::where('event_id', $this->event->id)->get();
        $data = [];
        
        return view($view, compact('data'));
    }

    public function messages($event_name, $id, $display_name)
    {
        if(session()->has('ses_exhibitor'))
        {
            $view = 'frontend.events.exhibitors-messages';
    
            $data['exhibitor_data'] = EventVendors::find($id);
                    
            return view($view, compact('data'));
        }

        return redirect('/events/'.$this->slug);
    }

    public static function chat_setup($data)
    {
        $resp_user_id = $ses_user_id = null;
        $return_data['enable_chat'] = false;

        if(isset($data['resp_user_id']))
        {
            $resp_user_id = $data['resp_user_id'];
            $chat_user_ids[] = $resp_user_id;
        }
            
        if(isset($data['ses_user_id']))
        {
            $ses_user_id = $data['ses_user_id'];
            $chat_user_ids[] = $ses_user_id;    
        }  
        
        if(!$resp_user_id)
        {
            if($data['chat_resp'])
            {
                //$return_data['chat_resp'] = $data['chat_resp'];
                if($data['chat_sender_user_type'] == 'exhibitor')
                {
                    $resp_user_id = $data['chat_resp']->vendor->user;
                    $chat_user_ids[] = $resp_user_id;
                }   
                else 
                {
                    $resp_user_id = $data['chat_resp']->user;
                    $chat_user_ids[] = $resp_user_id;
                }
            }
        }
        else
        {
            // need to do something here...
        }
        
        if(!$ses_user_id) // means we have to determine sender / logged in user id
        {
            if(session()->get('ses_user_id') != $resp_user_id)
            {
                $return_data['enable_chat'] = true;
                    
                $ses_user_id = session()->get('ses_user_id');

                $chat_user_ids[] = $ses_user_id ;
            }

            // if(session()->has('ses_exhibitor')) 
            // {
            //     if(session()->get('ses_user_id') != $resp_user_id)
            //     {
            //         $return_data['enable_chat'] = true;
                    
            //         $ses_user_id = session()->get('ses_exhibitor')['vendor_event']->vendor->user;

            //         $chat_user_ids[] = $ses_user_id ;
            //     }
            // }
            // else 
            // {
            //     if(session()->get('ses_user_id') != $resp_user_id)
            //     {
            //         $return_data['enable_chat'] = true;
                 
            //         $ses_user_id = session()->get('ses_exhibitor')['vendor_event']->vendor->user;

            //         $chat_user_ids[] = $ses_user_id ;
            //     }
            // }           
        }     
        
        sort($chat_user_ids);

        $return_data['chat_channel']        = Chat::getHash($chat_user_ids);
        $return_data['chat_user_ids']       = $chat_user_ids;

        $return_data['chat_resp']           = User::find($resp_user_id);
        $return_data['chat_sender']         = User::find($ses_user_id);

        $return_data['chat_resp_user_id']   = $resp_user_id;
        $return_data['chat_sender_user_id'] = $ses_user_id;

        $chat = Chat::where('channel', $return_data['chat_channel'])->first();
        if($chat)
        {
            $return_data['chat_id'] = $chat->id;
        }

        if(isset($data['start_chat']) && !isset($return_data['chat_id']))
        {
            $chat_data = ['channel' => $return_data['chat_channel'], 'user_ids' => implode(',', $chat_user_ids)];
            $chat = Chat::create($chat_data);
            $return_data['chat_id'] = $chat->id;
        }

        return $return_data;
    }

    public function addToCalender(Request $request)
    {
        $data = Webinar::find($request->webinar_id);
        $file = public_path().'/up_data/webiners/files/'.$data->file;
        return Response::download($file);
    }
}
