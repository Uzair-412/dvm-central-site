<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\CategoryRequest;
use App\Models\Review;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['p_heading']      = 'Manage Product Reviews';
        $data['p_description']  = 'Here is the list of product reviews';

        $data['reviews']     = Review::paginate(10);

        return view('backend.reviews.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    /*public function create()
    {
        $data['p_heading']      = 'Create Customer Group';
        $data['p_description']  = 'Create a new customer group by filling the form below';

        return view('backend.groups.create', compact('data'));
    }*/

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    /*public function store(Request $request)
    {
        $data = $request->all();

        $group = Groups::create($data);

        return redirect()->route('admin.groups.index')->with('flash_success','Customer group added successfully.');
    }*/

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    /*public function show(Category $category)
    {
        //
    }*/

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Review $review)
    {
        $data['review']       = $review;
        $data['p_heading']      = 'Update Product Review';
        $data['p_description']  = 'Modify product review by filling the form below';

        return view('backend.reviews.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Review $review)
    {
        $data = $request->all();
        $review->update($data);

        return redirect()->route('admin.reviews.index')->with('flash_success','Product review updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function destroy(Review $review)
    {
        $review->delete();

        return back()->with('flash_success','Product review deleted successfully.');
    }
}
