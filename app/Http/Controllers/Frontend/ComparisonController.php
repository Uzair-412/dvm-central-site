<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ComparisonController extends Controller
{
    public function comparison(){
        $data['breadcrumb']     = true;
        $data['breadcrumbs'][]  = 'Comparison Products';

        $data['products'] = Product::all();

        return view('frontend.pages.compare', compact('data') );
    }

    public function comparison_item(Request $request, Product $products){
        $data['breadcrumb']     = true;
        $data['breadcrumbs'][]  = 'Comparison Products';

        $items = $request->name;
        
        $data['product'] = Product::all();

        if(is_array($items)){
            foreach($items as $item){
                $data['products'][] = Product::where('id', $item)->first()->toArray();
            }
        }else{
            $data['products'] = Product::where('name', $items)->get()->toArray();
        }

        return view('frontend.pages.compare-search', compact('data') );
    }

    public function comparison_id(Request $request){
        $data['breadcrumb']     = true;
        $data['breadcrumbs'][]  = 'Comparison Products';
        $ids = $request->ids;
        $id = $request->id;
        foreach($ids as $i){
                if($i == $id){
                    unset($i);
                }else
                    $data['ids'][] = $i;
        }

        $data['product'] = Product::all();

        if(is_array($data['ids'])){
            foreach($data['ids'] as $item){
                $data['products'][] = Product::where('id', $item)->first()->toArray();
            }
        }
        
        return view('frontend.pages.compare-search', compact('data') );

    }
}
