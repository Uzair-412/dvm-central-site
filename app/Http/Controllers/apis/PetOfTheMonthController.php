<?php

namespace App\Http\Controllers\apis;

use App\Http\Controllers\Controller;
use App\Models\Pet;
use App\Models\PetsImage;
use App\Models\State;
use Illuminate\Http\Request;

class PetOfTheMonthController extends Controller
{
    public function index()
    {
        $pets = Pet::where('status', 1)->get();
        return response()->json($pets, 200);
    }

    public function detail($id)
    {
        $data['pet'] = Pet::find($id);
        $data['images'] = PetsImage::where('pet_id', $id)->get();
        $data['pets'] = Pet::where('status', 1)->get();
        $data['state'] = State::find($data['pet']->state);
        return response()->json($data, 200);
    }

    public function share(Request $request)
    {
        $video_path = '';
        $path = dirname(getcwd()) . '/public/up_data/pets-of-the-month';
        if ($_FILES['video']['name']) {
            $videoArray = explode('.',$_FILES['video']['name']);
            $fileName = $this->slugify($request->pet_name.'video').'.'.end($videoArray);
            $destinationPath = $path . '/videos';
            if(!is_dir($destinationPath))
            {
                mkdir($destinationPath);
            }
            $destinationPath = $destinationPath . '/'.$fileName;
            move_uploaded_file($_FILES['video']['tmp_name'], $destinationPath);
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

        $files = $_FILES['images']['name'];
        foreach ($files as $key => $file) {
            if($file)
            {
                $fileArray = explode('.', $file);
                $fileName = $this->slugify($request->pet_name.'image-'.$key).'.'.end($fileArray);
                $destinationPath = $path . '/images';
                if(!is_dir($destinationPath))
                {
                    mkdir($destinationPath);
                }
                $destinationPath = $destinationPath . '/'.$fileName;
                move_uploaded_file($_FILES['images']['tmp_name'][$key], $destinationPath);
                $Image = new PetsImage();
                $Image->pet_id = $pet->id;
                $Image->pet_image = $fileName;
                $Image->save();
            }
        }

        return response()->json(['success' => 'Pet shared successfuly'], 200);
    }
}
