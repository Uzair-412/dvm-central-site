<?php

namespace App\Http\Controllers\ApisV2;


use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Support\Facades\Mail;
use App\Mail\Frontend\Contact\SendContact;
use App\Http\Requests\Frontend\Contact\SendContactRequest;

class ContactController extends Controller
{
    public function index()
    {
        $data['breadcrumbs'] = [];
        $parentSlug = "contact";
        array_push($data['breadcrumbs'], (array)['name' => $parentSlug, 'link' => $parentSlug]);
        $data['page'] = Page::find(4);
        return response()->json($data, 200);
    }

    /**
     * @param SendContactRequest $request
     *
     * @return mixed
     */
    public function send(SendContactRequest $request)
    {
        try {
            Mail::send(new SendContact($request));
        } catch (\Throwable $th) {

            return response()->json(['error' => $th->getMessage(),], 200);
        }
        return response()->json(['message' => __('Message Sent Successfully')], 200);
    }
}
