<?php

namespace App\Http\Controllers\apis;

use App\Http\Controllers\Controller;
use App\Models\ProductAnswer;
use App\Models\ProductQuestion;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
class ProductRelatedChatController extends Controller
{
    public function product_question(Request $request)
    {
        try {
            $data = $request->all();
            $question = ProductQuestion::create($data);
            if ($question) {
                return response()->json(['success' => 'Question Submitted Successfully.' , 'data' => $data], 200);
            }
        } catch (\Throwable $th) {
            return response()->json(
                ['error' => $th->getMessage(),],
                201
            );
        }
    }

    public function product_answer(Request $request)
    {
        try {
            $data = $request->all();
            $question = ProductAnswer::create($data);
            if ($question) {
                return response()->json(['success' => 'Answer Submitted Successfully.' , 'data' => $data], 200);
            }
        } catch (\Throwable $th) {
            return response()->json(
                ['error' => $th->getMessage(),],
                201
            );
        } 
    }

    public function search(Request $request){
        $search = $request->search;
        $product_id = $request->product_id;
        // $data['search'] = ProductQuestion::where('product_id', $product_id)->whereHas('answers', function ($q) use ($search) {
        //     $q->where('answer', 'like', $search);
        //   });
        $data['search'] =  ProductQuestion::where('product_id', $product_id)->where('question', 'like', '%' . $search . '%')->with('answers', function ($q) use ($search) {
                $q->where('answer', 'like','%' . $search. '%');})->paginate(6);
        return response()->json(['data' => $data['search']], 200);
    }
}
