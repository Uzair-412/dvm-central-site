<?php

namespace App\Http\Controllers\Backend\Manage_Courses;

use App\Http\Controllers\Controller;
use App\Models\CourseType;
use Illuminate\Http\Request;

class CoursesTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['p_heading']      = 'Manage Course Types';
        $data['p_description']  = 'Here is the list of course types';

        return view('backend.course_management.type.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['p_heading']      = 'Create Course Type';
        $data['p_description']  = 'Create a new course type by filling the form below';

        return view('backend.course_management.type.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->only('name', 'status');
        CourseType::create($data);
        return redirect()->route('admin.manage-courses.types.index')->with('flash_success', 'Course type added successfully.');
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
        $data['course_type']       = CourseType::find($id);
        $data['p_heading']      = 'Update course type';
        return view('backend.course_management.type.create', $data);
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
        $course_type = CourseType::find($id);
        $data = $request->only('name', 'status');
        $course_type->update($data);
        return redirect()->route('admin.manage-courses.types.index')->with('flash_success', 'Course type updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        CourseType::find($id)->delete();
        return redirect()->route('admin.manage-courses.types.index')->with('flash_danger', 'Course type deleted successfully.');
    }
}
