<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Pet;
use App\Models\PetsImage;
use App\Models\State;
use Illuminate\Http\Request;

class PetController extends Controller
{
    public function index()
    {
        $data['p_heading']      = 'Manage Pets';
        $data['p_description']  = 'Here is the list of pets';
        // $data['pages']     = Page::paginate(10);
        return view('backend.pets.index', compact('data'));
    }

    public function approve(Request $request)
    {
        $pet = Pet::find($request->pet_id);
        if($pet)
        {
            $pet->pet_created_time = strtotime($request->date);
            $pet->status = 1;
            $pet->save();
            return redirect()->route('admin.pets')->with('flash_success', 'Pet approved successfully.');
        }
    }

    public function disApprove(Request $request)
    {
        $pet = Pet::find($request->pet_id);
        if($pet)
        {
            $pet->status = 2;
            $pet->save();
            return redirect()->route('admin.pets')->with('flash_danger', 'Pet disapproved successfully.');
        }
    }

    public function view($id)
    {
        $data['p_heading']      = 'Pet';
        $data['pet'] = Pet::find($id);
        return view('backend.pets.view', $data);
    }

    public function edit($id)
    {
        $data['p_heading']      = 'Edit Pet Details';
        $data['pet'] = Pet::find($id);
        $data['states'] = State::all()->pluck('name', 'id');
        $data['pet_images'] =PetsImage::where('pet_id',$id)->get();
        return view('backend.pets.edit',compact('data'));
    }

    public function update(Request $request){
        $pet = Pet::where('id' ,$request->id)->first();
        $video_path = '';
        if ($request->file('video')) {
            $video = $request->file('video');
            $fileName = $this->slugify($request->pet_name.'video').'.'.$video->getClientOriginalExtension();
            $destinationPath = public_path() . '/up_data/pets-of-the-month/videos';
            //check if video exist then delete it
            $oldVideo = $destinationPath.'/'.$pet->video;
            if (isset ($oldVideo)){
                unlink($oldVideo);
            }
            $video->move($destinationPath, $fileName);
            $video_path = $fileName;
            $pet->video = $video_path;
        }

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
        $pet->pet_created_time = $request->pet_created_time;
        $pet->status = $request->status;
        $pet->created_at = date('Y-m-d H:i:s');
        $pet->save();

        $path = dirname(getcwd()) . '/public/up_data/pets-of-the-month';
        $files = $_FILES['images']['name'];
        foreach ($files as $key => $file) {
            if($file)
            {   
                $oldImages =  PetsImage::where('pet_id' , $pet->id)->get();
                $fileArray = explode('.', $file);
                
                if( !$oldImages){
                    //creatgn new image
                    $fileName = $this->slugify($request->pet_name.'image-'.$key).'.'.end($fileArray);
                    $destinationPath = $path . '/images';
                    if(!is_dir($destinationPath))
                    {
                        mkdir($destinationPath);
                    }
                    $destinationPath = $destinationPath . '/'.$fileName;
                    move_uploaded_file($_FILES['images']['tmp_name'][$key], $destinationPath);
                    $image = new PetsImage();
                    $image->pet_id = $pet->id;
                    $image->pet_image = $fileName;
                    $image->save();
                }else{
                    // replacing old images
                    foreach ($oldImages as $key => $oldImage){
                        $fileName = $this->slugify($request->pet_name.'image-'.$key).'.'.end($fileArray);
                        $destinationPath = $path . '/images';
                        if(!is_dir($destinationPath))
                        {
                            mkdir($destinationPath);
                        }
                        $destinationPath = $destinationPath . '/'.$fileName;
                        move_uploaded_file($_FILES['images']['tmp_name'][$key], $destinationPath);
                        $oldImage->pet_image = $fileName;
                        $oldImage->pet_id = $pet->id;
                        $oldImage->save();
                    }
                }
            }
            

        }
        return redirect()->route('admin.pets')->with('flash_success', 'Pet Updated successfully.');
    }
}
