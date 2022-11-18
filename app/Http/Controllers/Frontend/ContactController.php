<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Support\Facades\Mail;
use App\Mail\Frontend\Contact\SendContact;
use App\Http\Requests\Frontend\Contact\SendContactRequest;

/**
 * Class ContactController.
 */
class ContactController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $data['breadcrumb']     = true;
        $data['page'] = Page::find(4);

        $data['breadcrumbs'][]  = @$data['page']->heading;

        $view = 'frontend.contact';
    
            return view($view, compact('data'));
    }

    /**
     * @param SendContactRequest $request
     *
     * @return mixed
     */
    public function send(SendContactRequest $request)
    {   
        Mail::send(new SendContact($request));

        {
            return ['status' => 1, 'message' => 'Thank you for contacting us.'];
        }
    }
}
