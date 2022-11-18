<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Pet;
use App\Models\PetsImage;
use App\Models\State;
use Illuminate\Http\Request;

class PetController extends Controller
{
    public function index()
    {
        $data['breadcrumb'] = true;
        $data['breadcrumbs'][] = 'Pets of The Month';
        $data['pets'] = Pet::where('status', 1)->get();
        return view('frontend.pages.pets.index', compact('data'));
    }

    public function detail($id)
    {
        $data['breadcrumb'] = true;
        $data['breadcrumbs'][] = 'Pet of The Month';
        $data['pet'] = Pet::find($id);
        $data['breadcrumbs'][] = $data['pet']->pet_name;
        $data['images'] = PetsImage::where('pet_id', $id)->get();
        $data['pets'] = Pet::where('status', 1)->get();
        $data['state'] = State::find($data['pet']->state);
        return view('frontend.pages.pet.index', compact('data'));
    }

    public function apply()
    {
        $data['list'] = [];

        $data['breadcrumb'] = true;
        $data['breadcrumbs'][] = 'Pets of The Month';
        $data['breadcrumbs'][] = 'Share Your Pet\'s Details';
        $data['states'] = State::orderBy('name', 'ASC')->pluck('name', 'id');
        return view('frontend.pages.pet.apply', compact('data'));
    }

    public function share(Request $request)
    {
        $video_path = '';
        if ($request->file('video')) {
            $video = $request->file('video');
            $fileName = $this->slugify($request->pet_name.'video').'.'.$video->getClientOriginalExtension();
            $destinationPath =
                public_path() . '/up_data/pets-of-the-month/videos';
            $video->move($destinationPath, $fileName);
            $video_path = $fileName;
        }

        $pet = new Pet();
        $pet->first_name = $request->first_name;
        $pet->last_name = $request->last_name;
        $pet->email = $request->email;
        $pet->phone = $request->phone;
        $pet->pet_name = $request->pet_name;
        $pet->pet_age = $request->pet_age;
        $pet->address = $request->address;
        $pet->city = $request->city;
        $pet->zip = $request->zip;
        $pet->state = $request->state;
        $pet->description = $request->description;
        $pet->pet_created_time = '';
        $pet->status = 0;
        $pet->video = $video_path;
        $pet->created_at = date('Y-m-d H:i:s');
        $pet->save();

        $files = $request->file('images');
        foreach ($files as $key => $file) {
            $fileName = $this->slugify($request->pet_name.'image-'.$key).'.'.$file->getClientOriginalExtension();
            $destinationPath =
                public_path() . '/up_data/pets-of-the-month/images';
            $file->move($destinationPath, $fileName);
            $path = $fileName;
            $Image = new PetsImage();
            $Image->pet_id = $pet->id;
            $Image->pet_image = $path;
            $Image->save();
        }
        echo 1;
    }
}
