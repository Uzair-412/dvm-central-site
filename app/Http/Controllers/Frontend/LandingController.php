<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\EnterToWinRequest;
use App\Http\Requests\Backend\LandingRequest;
use App\Mail\Frontend\Order\SendFormSubmission;
use App\Mail\Frontend\Order\SendEnterToWin;
use App\Models\BlogPost;
use App\Models\FormSubmission;
use App\Models\Page;
use App\Models\Settings;
use App\Models\State;
use App\Helpers\General\AMP;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

/**
 * Class ShopController.
 */

class LandingController extends Controller
{
    public function index($slug)
    {
        return redirect('/', 301);
    }

    public function request_session(Request $request)
    {
        $data['page'] = Page::find(21);

        $data['breadcrumb']     = true;
        $data['breadcrumbs'][]  = $data['page']->heading;

        $date = date('Y-m-d');
        $data['recent_posts'] = BlogPost::where('status', 'Y')->where('publish_date', '<=', $date)->orderBy('publish_date', 'desc')->paginate(2);

        $zoom = self::getZoomSession();

        $data['zoom'] = $zoom;

        $view = 'frontend.landing.request-session';
        /*if(AMP::check())
        $view .= '-amp';*/

        return view($view, compact('data'));
    }

    public function submit_session(LandingRequest $request)
    {
        $secretKey = "6LfcLOIUAAAAACvL31aWNJ0DgtWm4WzQ8OHrxv8N";
        $ip = $_SERVER['REMOTE_ADDR'];

        $url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . urlencode($secretKey) .  '&response=' . urlencode($_POST['g-recaptcha-response']);
        $response = file_get_contents($url);
        $responseKeys = json_decode($response,true);

        if($responseKeys["success"])
        {
            $validated = true;
        }
        else
        {
            $validated = false;
        }

        if(!$validated)
        {
            return back()->with('flash_danger','Unable to check your captcha input, please try again.');
        }

        $validated = $request->validated();

        if(!$validated)
            return back();

        $data = $request->all();

        $data['custom_fields'] = json_encode(['product' => $request->input('product'), 'role' => $request->input('role'), 'time_to_call' => $request->input('time_to_call')]);

        $data['type'] = 'Request for Demo';

        FormSubmission::create($data);

        Mail::send(new SendFormSubmission($data));

        return back()->with('flash_success','We have received your request, we will contact you.');
    }

    public function enter_to_win(Request $request)
    {
        $data['page'] = Page::find(22);

        $data['breadcrumb']     = true;
        $data['breadcrumbs'][]  = $data['page']->heading;

        $data['states'] = State::where('country_id', 233)->orderBy('name')->pluck('name', 'iso2');

        $view = 'frontend.landing.enter-to-win';
        /*if(AMP::check())
            $view .= '-amp';*/

        return view($view, compact('data'));
    }

    public function enter_to_win_vdf(Request $request)
    {
        $data['page'] = Page::find(22);

        $data['breadcrumb']     = true;
        $data['breadcrumbs'][]  = $data['page']->heading;

        $data['states'] = State::where('country_id', 233)->orderBy('name')->pluck('name', 'iso2');

        $view = 'frontend.landing.enter-to-win-winner-vdf';//$view = 'frontend.landing.enter-to-win-vdf';
        /*if(AMP::check())
            $view .= '-amp';*/

        return view($view, compact('data'));
    }

    public function enter_to_win_vdf_submit(EnterToWinRequest $request)
    {
        $secretKey = "6LfcLOIUAAAAACvL31aWNJ0DgtWm4WzQ8OHrxv8N";
        $ip = $_SERVER['REMOTE_ADDR'];

        $url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . urlencode($secretKey) .  '&response=' . urlencode($_POST['g-recaptcha-response']);
        $response = file_get_contents($url);
        $responseKeys = json_decode($response,true);

        if($responseKeys["success"])
        {
            $validated = true;
        }
        else
        {
            $validated = false;
        }

        if(!$validated)
        {
            return back()->with('flash_danger','Unable to check your captcha input, please try again.');
        }

        $validated = $request->validated();

        if(!$validated)
            return back();

        $data = $request->all();

        $data['custom_fields'] = json_encode(['role' => $request->input('role'), 'state' => $request->input('state')]);

        $data['type'] = 'Enter to Win - VDF';

        FormSubmission::create($data);

        Mail::send(new SendEnterToWin($data));

        return back()->with('flash_success','Thank you for entering your details.');
    }

    public function enter_to_win_submit(EnterToWinRequest $request)
    {
        $secretKey = "6LfcLOIUAAAAACvL31aWNJ0DgtWm4WzQ8OHrxv8N";
        $ip = $_SERVER['REMOTE_ADDR'];

        $url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . urlencode($secretKey) .  '&response=' . urlencode($_POST['g-recaptcha-response']);
        $response = file_get_contents($url);
        $responseKeys = json_decode($response,true);

        if($responseKeys["success"])
        {
            $validated = true;
        }
        else
        {
            $validated = false;
        }

        if(!$validated)
        {
            return back()->with('flash_danger','Unable to check your captcha input, please try again.');
        }

        $validated = $request->validated();

        if(!$validated)
            return back();

        $data = $request->all();

        $data['custom_fields'] = json_encode(['role' => $request->input('role'), 'state' => $request->input('state')]);

        $data['type'] = 'Enter to Win - Monthly April';

        FormSubmission::create($data);

        Mail::send(new SendEnterToWin($data));

        return back()->with('flash_success','Thank you for entering your details.');
    }

    public static function getZoomSession()
    {
        $settings = Settings::where('key_group', 'zoom')->get();
        $zoom = [];
        foreach($settings as $setting)
        {
            $zoom[$setting->key_name] = $setting->key_value;
        }

        $show_zoom = false;

        if($zoom['ZOOM_MODE'] == 'auto')
        {
            $time = json_decode($zoom['ZOOM_TIME']);
            $ts_start = strtotime(date('Y-m-d '.$time->start_time.':00'));
            $ts_end = strtotime(date('Y-m-d '.$time->end_time.':00'));
            if(time() >= $ts_start && time() <= $ts_end)
                $show_zoom = true;
        }
        else
        {
            if($zoom['ZOOM_ENABLE'] == 'Y')
                $show_zoom = true;
        }

        $zoom['show_zoom'] = $show_zoom;

        return $zoom;
    }


    public function enter_to_win_mvc_scissors(Request $request)
    {
        $data['page'] = Page::find(22);

        $data['breadcrumb']     = true;
        $data['breadcrumbs'][]  = $data['page']->heading;

        $data['states'] = State::where('country_id', 233)->orderBy('name')->pluck('name', 'iso2');

        $view = 'frontend.landing.enter-to-win-mvc-scissors-winner';
        /*if(AMP::check())
            $view .= '-amp';*/

        return view($view, compact('data'));
    }

    public function enter_to_win_mvc_scissors_submit(EnterToWinRequest $request)
    {
        $secretKey = "6LfcLOIUAAAAACvL31aWNJ0DgtWm4WzQ8OHrxv8N";
        $ip = $_SERVER['REMOTE_ADDR'];

        $url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . urlencode($secretKey) .  '&response=' . urlencode($_POST['g-recaptcha-response']);
        $response = file_get_contents($url);
        $responseKeys = json_decode($response,true);

        if($responseKeys["success"])
        {
            $validated = true;
        }
        else
        {
            $validated = false;
        }

        if(!$validated)
        {
            return back()->with('flash_danger','Unable to check your captcha input, please try again.');
        }

        $validated = $request->validated();

        if(!$validated)
            return back();

        $data = $request->all();

        $data['custom_fields'] = json_encode(['role' => $request->input('role'), 'state' => $request->input('state')]);

        $data['type'] = 'Enter to Win - MVC - Scissors';

        FormSubmission::create($data);

        Mail::send(new SendEnterToWin($data));

        return back()->with('flash_success','Thank you for entering your details.');
    }

    public function enter_to_win_mvc_deciduous(Request $request)
    {
        $data['page'] = Page::find(22);

        $data['breadcrumb']     = true;
        $data['breadcrumbs'][]  = $data['page']->heading;

        $data['states'] = State::where('country_id', 233)->orderBy('name')->pluck('name', 'iso2');

        $view = 'frontend.landing.enter-to-win-mvc-deciduous-winner';
        /*if(AMP::check())
            $view .= '-amp';*/

        return view($view, compact('data'));
    }

    public function enter_to_win_mvc_deciduous_submit(EnterToWinRequest $request)
    {
        $secretKey = "6LfcLOIUAAAAACvL31aWNJ0DgtWm4WzQ8OHrxv8N";
        $ip = $_SERVER['REMOTE_ADDR'];

        $url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . urlencode($secretKey) .  '&response=' . urlencode($_POST['g-recaptcha-response']);
        $response = file_get_contents($url);
        $responseKeys = json_decode($response,true);

        if($responseKeys["success"])
        {
            $validated = true;
        }
        else
        {
            $validated = false;
        }

        if(!$validated)
        {
            return back()->with('flash_danger','Unable to check your captcha input, please try again.');
        }

        $validated = $request->validated();

        if(!$validated)
            return back();

        $data = $request->all();

        $data['custom_fields'] = json_encode(['role' => $request->input('role'), 'state' => $request->input('state')]);

        $data['type'] = 'Enter to Win - MVC - Deciduous';

        FormSubmission::create($data);

        Mail::send(new SendEnterToWin($data));

        return back()->with('flash_success','Thank you for entering your details.');
    }

    public function enter_to_win_vvs_deciduous(Request $request)
    {
        $data['page'] = Page::find(22);

        $data['breadcrumb']     = true;
        $data['breadcrumbs'][]  = $data['page']->heading;

        $data['states'] = State::where('country_id', 233)->orderBy('name')->pluck('name', 'iso2');

        $view = 'frontend.landing.enter-to-win-vvs-deciduous-winner';
        /*if(AMP::check())
            $view .= '-amp';*/

        return view($view, compact('data'));
    }

    public function enter_to_win_vvs_deciduous_submit(EnterToWinRequest $request)
    {
        $secretKey = "6LfcLOIUAAAAACvL31aWNJ0DgtWm4WzQ8OHrxv8N";
        $ip = $_SERVER['REMOTE_ADDR'];

        $url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . urlencode($secretKey) .  '&response=' . urlencode($_POST['g-recaptcha-response']);
        $response = file_get_contents($url);
        $responseKeys = json_decode($response,true);

        if($responseKeys["success"])
        {
            $validated = true;
        }
        else
        {
            $validated = false;
        }

        if(!$validated)
        {
            return back()->with('flash_danger','Unable to check your captcha input, please try again.');
        }

        $validated = $request->validated();

        if(!$validated)
            return back();

        $data = $request->all();

        $data['custom_fields'] = json_encode(['role' => $request->input('role'), 'state' => $request->input('state')]);

        $data['type'] = 'Enter to Win - VVS - Deciduous';

        FormSubmission::create($data);

        Mail::send(new SendEnterToWin($data));

        return back()->with('flash_success','Thank you for entering your details.');
    }

    public function enter_to_win_vvs_scissors(Request $request)
    {
        $data['page'] = Page::find(22);

        $data['breadcrumb']     = true;
        $data['breadcrumbs'][]  = $data['page']->heading;

        $data['states'] = State::where('country_id', 233)->orderBy('name')->pluck('name', 'iso2');

        $view = 'frontend.landing.enter-to-win-vvs-scissors-winner';
        /*if(AMP::check())
            $view .= '-amp';*/

        return view($view, compact('data'));
    }

    public function enter_to_win_vvs_scissors_submit(EnterToWinRequest $request)
    {
        $secretKey = "6LfcLOIUAAAAACvL31aWNJ0DgtWm4WzQ8OHrxv8N";
        $ip = $_SERVER['REMOTE_ADDR'];

        $url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . urlencode($secretKey) .  '&response=' . urlencode($_POST['g-recaptcha-response']);
        $response = file_get_contents($url);
        $responseKeys = json_decode($response,true);

        if($responseKeys["success"])
        {
            $validated = true;
        }
        else
        {
            $validated = false;
        }

        if(!$validated)
        {
            return back()->with('flash_danger','Unable to check your captcha input, please try again.');
        }

        $validated = $request->validated();

        if(!$validated)
            return back();

        $data = $request->all();

        $data['custom_fields'] = json_encode(['role' => $request->input('role'), 'state' => $request->input('state')]);

        $data['type'] = 'Enter to Win - VVS - Scissors';

        FormSubmission::create($data);

        Mail::send(new SendEnterToWin($data));

        return back()->with('flash_success','Thank you for entering your details.');
    }
}
