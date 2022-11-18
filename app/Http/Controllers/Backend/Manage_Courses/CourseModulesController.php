<?php

namespace App\Http\Controllers\Backend\Manage_Courses;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CourseModule;
use App\Models\CourseModuleVideo;
use Illuminate\Http\Request;

class CourseModulesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($slug)
    {
        $data['p_heading']      = 'Manage Module';
        $data['p_description']  = 'Here is the list of modules';
        $data['slug'] = $slug;
        $data['course'] = Course::where(['slug'=>$slug])->first();
        return view('backend.course_management.modules.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($slug)
    {
        $data['p_heading']      = 'Create Module';
        $data['p_description']  = 'Create a new module by filling the form below';
        $data['course'] = Course::where('slug', $slug)->first();
        return view('backend.course_management.modules.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required|unique:course_modules'
        ]);

        $data = $request->all();
        unset($data['add_video']);

        $data['is_free'] = (bool)@$data['is_free'];
        $data['slug'] = $this->slugify($data['title']);
        $course = Course::find($data['course_id']);
        CourseModule::create($data);
        CourseModule::setPaidProcess($data['course_id']);
        if(@$request->add_video)
        {
            return redirect('/admin/manage-courses/course/module/'.$data['slug'].'/video/create')->with('flash_success', 'Module added successfully.');
        }
        return redirect('admin/manage-courses/courses/'.$course->slug.'/modules')->with('flash_success', 'Module added successfully.');
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
    public function edit($slug,$id)
    {
        $data['p_heading']      = 'Update Module';
        $data['p_description']  = 'Update a new module by filling the form below';
        $data['course'] = Course::where('slug', $slug)->first();
        $data['module'] = CourseModule::find($id);
        return view('backend.course_management.modules.create', $data);
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
        $data = $request->all();
        $data['is_free'] = (bool)@$data['is_free'];
        $data['slug'] = $this->slugify($data['title']);
        $course = Course::find($data['course_id']);
        CourseModule::find($id)->update($data);
        CourseModule::setPaidProcess($data['course_id']);
        return redirect('admin/manage-courses/courses/'.$course->slug.'/modules')->with('flash_success', 'Module updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $module = CourseModule::find($id);
        $module->delete();
        CourseModuleVideo::where('course_module_id', $id)->delete();
        return redirect()->back()->with('flash_danger', 'Module deleted successfully.');
    }
}
