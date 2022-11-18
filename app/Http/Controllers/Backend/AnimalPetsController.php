<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\AnimalPetsRequest;
use Illuminate\Http\Request;
use App\Models\AnimalPet;

class AnimalPetsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['p_heading'] = 'Manage Animal Pets';
        $data['p_description'] = 'Here is the list of Animal Pets';

        $data['posts'] = AnimalPet::paginate(10);

        return view('backend.animal-pets.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['p_heading'] = 'Create Animal Pet';
        $data['p_description'] = 'Create a new animal pet by filling the form below';
        return view('backend.animal-pets.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AnimalPetsRequest $request)
    {
        $validated = $request->validated();

        if (!$validated) {
            return back();
        }
        if ($request->file('pet_icon')) {
            $pet_icon = $request->file('pet_icon');
            $fileName = $this->slugify($request->name) . '.' . $pet_icon->getClientOriginalExtension();
            $destinationPath =
                public_path() . '/up_data/pet-diseases';
            $pet_icon->move($destinationPath, $fileName);
            $pet_icon_path = $fileName;
        }
        $post = new AnimalPet();

        $post->name = $request->name;
        $post->position = $request->position;
        $post->overview_heading = $request->overview_heading;
        $post->healthy_people_heading = $request->healthy_people_heading;
        $post->healthy_pet_heading = $request->healthy_pet_heading;
        $post->resources_heading = $request->resources_heading;
        $post->overview_content = $request->overview_content;
        $post->healthy_people_content = $request->healthy_people_content;
        $post->healthy_pet_content = $request->healthy_pet_content;
        $post->resources_content = $request->resources_content;
        $post->meta_title = $request->meta_title;
        $post->meta_keywords = $request->meta_keywords;
        $post->meta_description = $request->meta_description;
        $post->slug = $request->slug;
        $post->site_url = $request->site_url;
        if (isset($pet_icon_path)) {
            $post->pet_icon = $pet_icon_path;
        } else {
            $post->pet_icon = null;
        }
        $post->save();

        return redirect()
            ->route('admin.animal-pets.index')
            ->with('flash_success', 'Animal Pet added successfully.');
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
        $post = AnimalPet::find($id);

        $data['post'] = $post;
        $data['p_heading'] = 'Update Animal Pet';
        $data['p_description'] = 'Modify Animal Pet by filling the form below';

        return view('backend.animal-pets.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(AnimalPetsRequest $request, $id)
    {
        $post = AnimalPet::find($id);

        $validated = $request->validated();

        if (!$validated) {
            return back();
        }

        if ($request->file('pet_icon')) {
            $pet_icon = $request->file('pet_icon');
            $fileName = $this->slugify($request->name) . '.' . $pet_icon->getClientOriginalExtension();
            $destinationPath =
                public_path() . '/up_data/pet-diseases';
            $pet_icon->move($destinationPath, $fileName);
            $pet_icon_path = $fileName;
        }   
        // dd($request->all());
        $post->name = $request->name;
        $post->position = $request->position;
        $post->overview_heading = $request->overview_heading;
        $post->healthy_people_heading = $request->healthy_people_heading;
        $post->healthy_pet_heading = $request->healthy_pet_heading;
        $post->resources_heading = $request->resources_heading;
        $post->overview_content = $request->overview_content;
        $post->healthy_people_content = $request->healthy_people_content;
        $post->healthy_pet_content = $request->healthy_pet_content;
        $post->resources_content = $request->resources_content;
        $post->meta_title = $request->meta_title;
        $post->meta_keywords = $request->meta_keywords;
        $post->meta_description = $request->meta_description;
        $post->slug = $request->slug;
        $post->site_url = $request->site_url;
        if(isset($pet_icon_path)){
            $post->pet_icon = $pet_icon_path;
        }else{
            $post->pet_icon = null;
        }
        $post->save();

        return redirect()
            ->route('admin.animal-pets.index')
            ->with('flash_success', 'Animal Pet updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = AnimalPet::find($id);
        $post->delete();
        return back()->with('flash_success', 'Animal Pet deleted successfully.');
    }
}
