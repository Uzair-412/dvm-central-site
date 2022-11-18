<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\FaqsRequest;
use App\Models\Faqs;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FaqsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data['p_heading']      = 'Manage Faqs';
        $data['p_description']  = 'Here is the list of all the Faqs';

        $data['faqs']     = Faqs::paginate(10);

        return view('backend.faqs.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {    
        $data['p_heading']      = 'Create Faqs';
        $data['p_description']  = 'Create a new faq by filling the form below';
        $data['in_home'] = 'Y';

        $data['status'] = 'Y';


        return view('backend.faqs.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FaqsRequest $request)
    {
        $validated = $request->validated();

        if(!$validated)
            return back();

        $data = $request->all();

        Faqs::create($data);

        return redirect()->route('admin.faqs.index')->with('flash_success','Faqs created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Faqs $faq)
    {
        $data['p_heading']      = 'Modify Faqs';
        $data['p_description']  = 'Update Faqs by filling the form below';

        $data['faqs']           = $faq;

        return view('backend.faqs.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(FaqsRequest $request, Faqs $faq)
    { 
        $data = $request->only('question', 'answer', 'in_home', 'position', 'status');;

        $faq->update($data);

        return redirect()->route('admin.faqs.index')->with('flash_success','Faqs updated successfully.');
    }
       
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Faqs $faq)
    {
        $faq->delete();

        return back()->with('flash_success','Faqs deleted successfully.');
    }

}
