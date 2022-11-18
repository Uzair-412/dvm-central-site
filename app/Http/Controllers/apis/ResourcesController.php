<?php

namespace App\Http\Controllers\apis;

use App\Http\Controllers\Controller;
use App\Models\AnimalPet;
use App\Models\CommonDisease;
use App\Models\Country;
use App\Models\NewsPost;
use App\Models\Page;
use App\Models\Program;
use App\Models\Programs\Association;
use App\Models\Programs\Institute;
use App\Models\Programs\Types;
use App\Models\State;
use App\Models\SurgicalProceduresArticle;
use App\Models\SurgicalProceduresCategory;
use DB;
use Illuminate\Http\Request;

class ResourcesController extends Controller
{
    public function index()
    {
        $data['News'] = NewsPost::where('status', 'Y')
            ->limit(4)
            ->orderBy('publish_date', 'DESC')
            ->get();
        $data['Program'] = Program::where('status', 'Y')
            ->limit(3)
            ->orderBy('id', 'DESC')
            ->get();
        return response()->json($data, 200);
    }

    public function news()
    {
        $News = NewsPost::where('status', 'Y')
            ->orderBy('publish_date', 'DESC')
            ->paginate(20);
        return response()->json($News, 200);
    }

    public function single_news($slug)
    {
        $data['News'] = NewsPost::where([
            ['slug', $slug],
            ['status', 'Y'],
        ])->first();
        $data['RelatedNews'] = NewsPost::relatedNews($data['News']);
        
        //Breadcrumbs
        $slugUrl = 'news';
        $data['breadcrumb'] = true;
        $data['breadcrumbs']    = [];
        array_push($data['breadcrumbs'], (array)['name' => $slugUrl,'link' => $slugUrl]);
        array_push($data['breadcrumbs'], ['name' => $data['News']->name]);
        
        //Page Type
        $data['page_type']    = 'news_detail';
        return response()->json($data, 200);
    }

    public function programs()
    {
        $data['programs'] = Program::getProgramsFilter();
        $data['types'] = Types::where('programs_types.status', 'Y')
        ->join('programs', 'programs.type_id', '=', 'programs_types.id')
        ->select('programs_types.id', 'programs_types.name')
        ->groupBy('programs_types.id')
        ->get();

        $data['states'] = State::where('programs_institutes.status', 'Y')
        ->join('programs_institutes', 'programs_institutes.state_id', '=', 'states.id')
        ->select('states.*')
        ->groupBy('states.id')
        ->get();

        $data['countries'] = Country::where('programs_institutes.status', 'Y')
        ->join('programs_institutes', 'programs_institutes.country_id', '=', 'countries.id')
        ->select('countries.*')
        ->groupBy('countries.id')
        ->get();

        $data['cities'] = Institute::where('programs_institutes.status', 'Y')
        ->select(DB::raw('DISTINCT city'))->get();
        return response()->json($data, 200);
    }

    public function filter_programs(Request $request)
    {
        $programs = Program::getProgramsFilter($request->all());
        return response()->json($programs, 200);
    }

    public function associations()
    {
        $data['Associations'] = Association::getAssociationFilter();

        $data['states'] = State::where('associations.status', 'Y')
        ->join('associations', 'associations.state_id', '=', 'states.id')
        ->select('states.*')
        ->groupBy('states.id')
        ->get();

        $data['countries'] = Country::where('associations.status', 'Y')
        ->join('associations', 'associations.country_id', '=', 'countries.id')
        ->select('countries.*')
        ->groupBy('countries.id')
        ->get();

        $data['cities'] = Association::where('associations.status', 'Y')
        ->select(DB::raw('DISTINCT city'))->get();
        return response()->json($data, 200);
    }

    public function filter_associations(Request $request)
    {
        $associations = Association::getAssociationFilter($request->all());
        return response()->json($associations, 200);
    }

    public function surgical_procedures()
    {
        $data['page'] = Page::find(7);

        $data['meta_title']     = $data['page']->meta_title;
        $data['meta_keywords']     = $data['page']->meta_keywords;
        $data['meta_description']     = $data['page']->meta_description;

        $data['breadcrumb']     = true;
        $data['breadcrumbs'][]  = 'Resources';
        $data['breadcrumbs'][]  = 'Surgical Procedures';

        $data['categories']     = SurgicalProceduresCategory::with('articles')->where('status', 'Y')->orderBy('name', 'asc')->get();
        $data['section'] = 'page';

        return response()->json($data, 200);
    }

    public function surgical_procedures_category($category)
    {
        $data['category'] = SurgicalProceduresCategory::where('slug', $category)->first();
        return response()->json($data, 200);
        $data['meta_title']     = $data['category']->name;
        $data['meta_keywords']     = '';
        $data['meta_description']     = '';

        $data['categories']     = SurgicalProceduresCategory::where('status', 'Y')->orderBy('name', 'asc')->get();
        $data['articles']       = SurgicalProceduresArticle::where(['status' => 'Y', 'category_id' => $data['category']->id])->orderBy('name', 'asc')->get();

        $data['section'] = 'categories';
        return response()->json($data, 200);
    }

    public function surgical_procedures_article($category, $article)
    {
        $data['breadcrumbs']    = [];
        $data['category'] = SurgicalProceduresCategory::where('slug', $category)->first();
        $data['article'] = SurgicalProceduresArticle::where('slug', $article)->first();

        $data['meta_title']     = $data['article']->meta_title;
        $data['meta_keywords']     = $data['article']->meta_keywords;
        $data['meta_description']     = $data['article']->meta_description;

        $data['categories']     = SurgicalProceduresCategory::with('articles')->where('status', 'Y')->orderBy('name', 'asc')->get();

        $data['section'] = 'articles';
        $data['page_type'] = "surgery_detail";

        $parentSlug1    = "resources";
        $parentName1    = "Resources";
        
        $parentSlug2    = "resources/surgical-procedures";
        $parentName2    = "Surgical Procedures";
        
        $categorySlug    = $data['category']->slug;
        $categoryName    = $data['category']->name;
        
        // $articleSlug    = $data['category']->slug;
        $articleName    = $data['article']->name;
        
        array_push($data['breadcrumbs'], (array)['name' => $parentName1,'link' => $parentSlug1]);
        array_push($data['breadcrumbs'], (array)['name' => $parentName2,'link' => $parentSlug2]);
        
        array_push($data['breadcrumbs'], (array)['name' => $articleName]);
        
        array_push($data['breadcrumbs'], (array)['name' => $categoryName]);
        
        return response()->json($data, 200);
    }
    //Common Disease API Route for Mobile Apps
    public function common_diseases($slug = '')
    {
        $data['breadcrumb'] = true;
        $data['breadcrumbs'][] = 'Animal Pets';
        $data['animals'] = AnimalPet::with('diseases')->get();
        $data['pet_slug'] = $slug;
        return response()->json($data, 200);
    }

    //List of Common Disease Animals API Route for Web
    public function listOfAnaimals()
    {
        $data['animals'] = AnimalPet::get(array('name','slug'));
        
        //Page Type
        $data['page_type']    = 'animal';
        return response()->json($data, 200);
    }

    //Common Disease API Route for Web
    public function web_common_diseases($slug = '')
    {
        // die("hi check");
        $data['animals'] = AnimalPet::with('diseases')->where('slug', $slug)->first();
        
        $slugUrl = $data['animals']->slug;
        $slugUrlParent1 = "resources";
        $slugUrlParent2 = "common-diseases";
        $slugLinkParent2 = "resources/common-diseases";
        $data['breadcrumb'] = true;
        $data['breadcrumbs']    = [];
        array_push($data['breadcrumbs'], (array)['name' => $slugUrlParent1,'link' => $slugUrlParent1]);
        array_push($data['breadcrumbs'], (array)['name' => $slugUrlParent2,'link' => $slugLinkParent2]);
        array_push($data['breadcrumbs'], (array)['name' => $slugUrl,'link' => $slugUrl]);
        array_push($data['breadcrumbs'], ['name' => $data['animals']->name]);
        
        //Page Type
        $data['page_type']    = 'animal';
        
        return response()->json($data, 200);
    }

    public function pets_diseases($pet_slug = '', $disease_slug = '')
    {
        $data['disease_slug'] = $disease_slug;
        $data['pet_slug'] = $pet_slug;
        $data['breadcrumb'] = true;
        $data['breadcrumbs'][] = 'Pet Diseases';
        $data['disease'] = CommonDisease::with('AnimalPet')->where('slug', $disease_slug)->first();
        return response()->json($data, 200);
    }
}