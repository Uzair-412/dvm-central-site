<?php

namespace App\Http\Controllers\ApisV2\Resources;

use App\Http\Controllers\Controller;
use App\Models\AnimalPet;
use App\Models\CommonDisease;
use DB;
use Illuminate\Http\Request;

class CommonDiseaseController extends Controller
{
    //List of Common Disease Animals API Route for Web
    public function listOfAnaimals()
    {
        $data['animals'] = AnimalPet::get(array('name','slug'));
        
        //Page Type
        $data['page_type']    = 'animal';
        return response()->json($data, 200);
    }

    //Common Disease API Route for Web
    public function commonDiseases($slug = '')
    {
        // die("hi check");
        $data['listOfAnimals'] = AnimalPet::get(array('name','slug'));
        $data['animals'] = AnimalPet::with('diseases')->where('slug', $slug)->first();
        
        $slugUrl = $data['animals']->slug;
        $slugUrlParent1 = "resources";
        $slugUrlParent2 = "common-diseases";
        $slugLinkParent2 = "resources/common-diseases";
        // $data['breadcrumb'] = true;
        $data['breadcrumbs']    = [];
        array_push($data['breadcrumbs'], (array)['name' => $slugUrlParent1,'link' => $slugUrlParent1]);
        array_push($data['breadcrumbs'], (array)['name' => $slugUrlParent2,'link' => $slugLinkParent2]);
        // array_push($data['breadcrumbs'], (array)['name' => $slugUrl,'link' => $slugUrl]);
        array_push($data['breadcrumbs'], ['name' => $data['animals']->name]);
        
        //Page Type
        $data['page_type']    = 'animal';
        
        return response()->json($data, 200);
    }

    public function petsDiseases($pet_slug = '', $disease_slug = '')
    {
        $data['disease_slug'] = $disease_slug;
        $data['pet_slug'] = $pet_slug;
        $data['disease'] = CommonDisease::with('AnimalPet')->where('slug', $disease_slug)->first();

        $slugUrlParent1 = "resources";
        $slugParent1Name = "Resources";

        $slugParent2Name = "Common Diseases";
        $slugLinkParent2 = "resources/common-diseases";

        $slugParent3Name = ucfirst($pet_slug);
        $slugLinkParent3 = $slugLinkParent2.'/'.$pet_slug;

        $data['breadcrumbs']    = [];
        array_push($data['breadcrumbs'], (array)['name' => $slugParent1Name,'link' => $slugUrlParent1]);
        array_push($data['breadcrumbs'], (array)['name' => $slugParent2Name,'link' => $slugLinkParent2]);
        array_push($data['breadcrumbs'], (array)['name' => $slugParent3Name,'link' => $slugLinkParent3]);
        array_push($data['breadcrumbs'], (array)['name' => $data['disease']->name]);

        return response()->json($data, 200);
    }
}