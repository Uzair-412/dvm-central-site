<?php

namespace App\Http\Controllers\ApisV2\Resources;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\SurgicalProceduresArticle;
use App\Models\SurgicalProceduresCategory;
use DB;
use Illuminate\Http\Request;

class SurgicalProceduresController extends Controller
{
    public function surgicalProcedures()
    {
        $data['page'] = Page::find(7);

        $data['meta_title']     = $data['page']->meta_title;
        $data['meta_keywords']     = $data['page']->meta_keywords;
        $data['meta_description']     = $data['page']->meta_description;
        
        $data['categories']     = SurgicalProceduresCategory::with('getSelectedColumnsFromArticles')->where('status', 'Y')->orderBy('name', 'asc')->get(array('id','name','slug'));
        

        //Breadcrumbs
        $data['breadcrumbs']    = [];
        $parentSlug    = "resources";
        $parentSlugName    = "Resources";

        $slugName    = "Surgical Procedures";

        array_push($data['breadcrumbs'], (array)['name' => $parentSlugName,'link' => $parentSlug]);
        array_push($data['breadcrumbs'], (array)['name' => $slugName]);

        return response()->json($data, 200);
    }

    public function surgicalProceduresArticle($category, $article)
    {
        $data['category'] = SurgicalProceduresCategory::where('slug', $category)->first();
        $data['article'] = SurgicalProceduresArticle::where('slug', $article)->first();

        $data['meta_title']     = $data['article']->meta_title;
        $data['meta_keywords']     = $data['article']->meta_keywords;
        $data['meta_description']     = $data['article']->meta_description;

        $data['categories']     = SurgicalProceduresCategory::with('getSelectedColumnsFromArticles')->where('status', 'Y')->orderBy('name', 'asc')->get();

        $data['breadcrumbs']    = [];

        $parentSlug1    = "resources";
        $parentName1    = "Resources";
        
        $parentSlug2    = "resources/surgical-procedures";
        $parentName2    = "Surgical Procedures";
        
        $categoryName    = $data['category']->name;
        $articleName    = $data['article']->name;
        
        array_push($data['breadcrumbs'], (array)['name' => $parentName1,'link' => $parentSlug1]);
        array_push($data['breadcrumbs'], (array)['name' => $parentName2,'link' => $parentSlug2]);
        
        array_push($data['breadcrumbs'], (array)['name' => $categoryName]);
        array_push($data['breadcrumbs'], (array)['name' => $articleName]);

        $data['page_type'] = "surgery_detail";
        $data['section'] = 'articles';
        
        return response()->json($data, 200);
    }
}