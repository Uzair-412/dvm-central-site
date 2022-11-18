<?php

namespace App\Http\Controllers\Backend\Manage_Courses;

use App\Domains\Auth\Models\User;
use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CourseCategory;
use App\Models\CourseType;
use Illuminate\Http\Request;

class CoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['p_heading']      = 'Manage Courses';
        $data['p_description']  = 'Here is the list of courses';

        return view('backend.course_management.courses.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['p_heading']      = 'Create Course';
        $data['p_description']  = 'Create a new course by filling the form below';
        $data['users'] = User::pluck('name','id');
        $data['types'] = CourseType::pluck('name','id');
        $data['categories'] = CourseCategory::pluck('name','id');
        return view('backend.course_management.courses.create', $data);
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
            'title' => 'required|unique:courses'
        ]);

        $data = $request->except('thumbnail');
        $data['is_24_7_support_service'] = (bool)@$data['is_24_7_support_service'];
        $data['is_videos'] = (bool)@$data['is_videos'];
        $data['general_guidance'] = (bool)@$data['general_guidance'];
        $data['is_practice_questions'] = (bool)@$data['is_practice_questions'];
        $data['slug'] = $this->slugify($data['title']);
        if($request->file('thumbnail')){
            $file = $request->file('thumbnail');
            $filename = date('Ymdis').'.'.$file->getClientOriginalExtension();
            $file->move(public_path('up_data/courses/thumbnails/'),$filename);
            $data['thumbnail'] = $filename;
        }else{
            $data['thumbnail'] = "na.webp";
        }

        Course::create($data);
        return redirect()->route('admin.manage-courses.courses.index')->with('flash_success', 'Course added successfully.');
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
        $data['p_heading']      = 'Update Course';
        $data['p_description']  = 'Update a course by filling the form below';
        $data['course'] = Course::find($id);
        $data['users'] = User::pluck('name','id');
        $data['types'] = CourseType::pluck('name','id');
        $data['categories'] = CourseCategory::pluck('name','id');
        return view('backend.course_management.courses.create', $data);
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
        $data = $request->except('thumbnail');
        $course = Course::find($id);

        $data['is_24_7_support_service'] = (bool)@$data['is_24_7_support_service'];
        $data['is_videos'] = (bool)@$data['is_videos'];
        $data['general_guidance'] = (bool)@$data['general_guidance'];
        $data['is_practice_questions'] = (bool)@$data['is_practice_questions'];
        $data['slug'] = $this->slugify($data['title']);
        if($request->file('thumbnail')){
            if(@$course->thumbnail)
            {
                unlink('up_data/courses/thumbnails/'.$course->thumbnail);
            }
            $file = $request->file('thumbnail');
            $filename = date('Ymdis').'.'.$file->getClientOriginalExtension();
            $file->move(public_path('up_data/courses/thumbnails/'),$filename);
            $data['thumbnail'] = $filename;
        }
        $course->update($data);
        return redirect()->route('admin.manage-courses.courses.index')->with('flash_success', 'Course updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Course::find($id)->delete();
        return redirect()->route('admin.manage-courses.courses.index')->with('flash_danger', 'Course removed successfully.');
    }
}
