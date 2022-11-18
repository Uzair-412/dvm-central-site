<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CommonDisease;
use App\Http\Requests\Backend\CommonDiseasesRequest;
use App\Models\AnimalPet;
class PetDiseasesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function index()
    {
        $data['p_heading'] = 'Manage Pet Diseases';
        $data['p_description'] = 'Here is the list of Pet Diseases';
        $data['posts'] = CommonDisease::paginate(10);
        return view('backend.common-diseases.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function create()
    {
        $data['p_heading'] = 'Create Pet Disease';
        $data['p_description'] = 'Create a new pet disease by filling the form below';
        $data['animals'] = AnimalPet::select('id','name')->get(); 
        return view('backend.common-diseases.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CommonDiseasesRequest $request)
    {
        $validated = $request->validated();

        if (!$validated) {
            return back();
        }

        $data = $request->only(
            'name',
            'overview_heading',
            'prevention_heading',
            'treatment_heading',
            'more_info_heading',
            'overview_content',
            'prevention_content',
            'treatment_content',
            'more_info_content',
            'meta_title',
            'meta_keywords',
            'meta_description',
            'slug',
            'site_url',
            'animal_pet_id'
        );

        CommonDisease::create($data);

        return redirect()
            ->route('admin.common-diseases.index')
            ->with('flash_success', 'Pet Disease added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = CommonDisease::find($id);

        $data['post'] = $post;
        $data['p_heading'] = 'Update Pet Disease';
        $data['p_description'] = 'Modify Pet Disease by filling the form below';
        $data['animals'] = AnimalPet::select('id','name')->get(); 
        return view('backend.common-diseases.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(CommonDiseasesRequest $request, $id)
    {
        $post = CommonDisease::find($id);

        $validated = $request->validated();

        if (!$validated) {
            return back();
        }

        $data = $request->only(
            'name',
            'overview_heading',
            'prevention_heading',
            'treatment_heading',
            'more_info_heading',
            'overview_content',
            'prevention_content',
            'treatment_content',
            'more_info_content',
            'meta_title',
            'meta_keywords',
            'meta_description',
            'slug',
            'site_url',
            'animal_pet_id'
        );

        $post->update($data);

        return redirect()
            ->route('admin.common-diseases.index')
            ->with('flash_success', 'Pet Disease updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = CommonDisease::find($id);
        $post->delete();
        return back()->with( 'flash_success','Pet Disease deleted successfully.');
    }
}
