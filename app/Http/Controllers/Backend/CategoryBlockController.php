<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Block;
use App\Models\BlockCategories;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryBlockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['p_heading']      = 'Manage Blocks';
        $data['p_description']  = 'Here is the list of blocks';
        return view('backend.category-blocks.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['p_heading']      = 'Create Block';
        $data['p_description']  = 'Create a new block by filling the form below';

        return view('backend.category-blocks.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Block::create($request->all());
        return redirect()->route('admin.category-blocks.index')->with('flash_success','Block added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['p_heading']      = 'Add Category';
        $data['p_description']  = 'Here is the list of blocks';
        $data['block_id'] = $id;
        $data['block'] = Block::find($id);
        $data['categories']     = Category::getCategoriesSelect(true);
        $data['selected_categories'] = BlockCategories::where('block_id', $id)->pluck('category_id');
        return view('backend.category-blocks.add_categories', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['category_block'] = Block::find($id);
        $data['p_heading']      = 'Update Block';
        $data['p_description']  = 'Modify block by filling the form below';

        return view('backend.category-blocks.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $category_block = Block::find($id);
        $category_block->update($request->all());
        return redirect()->route('admin.category-blocks.index')->with('flash_success','Block updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        BlockCategories::where(['block_id'=> $id])->delete();
        Block::find($id)->delete();
        return redirect()->route('admin.category-blocks.index')->with('flash_danger','Category block removed successfully.');
    }

    public function store_categories(Request $request)
    {
        BlockCategories::where(['block_id'=> $request->input('block_id')])->delete();
        foreach($request->input('category_ids') as $category_id)
        {
            $check = BlockCategories::where(['block_id'=> $request->input('block_id'), 'category_id' => $category_id])->first();
            if(empty($check))
            {
                $block_categories = new BlockCategories();
                $block_categories->block_id = $request->input('block_id');
                $block_categories->category_id = $category_id;
                $block_categories->save();
            }
        }
        return redirect()->route('admin.category-blocks.index')->with('flash_success','Category block added successfully.');
    }
}
