<?php

namespace App\Http\Controllers\Backend\Manage_Courses;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CourseCategory;

class CoursesCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['p_heading'] = 'Manage Course Categories';
        $data['p_description'] = 'Here is the list of Course Categories';

        $data['posts'] = CourseCategory::paginate(10);

        return view(
            'backend.course_management.category.index',
            compact('data')
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['p_heading'] = 'Create Course Category';
        $data['p_description'] =
            'Create a Course Category pet by filling the form below';
        return view(
            'backend.course_management.category.create',
            compact('data')
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        CourseCategory::create($data);
        return redirect()
            ->route('admin.manage-courses.category.index')
            ->with('flash_success', 'Course Category added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = CourseCategory::find($id);

        $data['post'] = $post;
        $data['p_heading'] = 'Update Course Category';
        $data['p_description'] =
            'Modify Course Category by filling the form below';

        return view('backend.course_management.category.edit', compact('data'));
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
        $course_category = CourseCategory::find($id);
        $data = $request->only('name', 'short_description', 'slug');
        $course_category->update($data);

        return redirect()
            ->route('admin.manage-courses.category.index')
            ->with('flash_success', 'Course Category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = CourseCategory::find($id);
        $post->delete();
        return back()->with(
            'flash_success',
            'Course Category deleted successfully.'
        );
    }
}
