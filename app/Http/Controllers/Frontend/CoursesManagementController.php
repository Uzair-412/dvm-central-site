<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CourseCategory;
use App\Models\Course;
use App\Models\CourseModule;
use App\Models\CourseModuleQuizAnswer;
use App\Models\CourseModuleQuize;
use App\Models\CourseModuleQuizOption;
use App\Models\CourseModuleVideo;
use App\Models\CourseType;
use Auth;

class CoursesManagementController extends Controller
{
    public function course_categories()
    {
        $data['breadcrumb'] = true;
        $data['breadcrumbs'][] = 'Course Category';
        $data['course_categories'] = CourseCategory::whereHas('getCourses')->get();
        return view('frontend.courses.categories', compact('data'));
    }

    public function courses_list($slug)
    {   
        $data['breadcrumb'] = true;
        $data['category'] = CourseCategory::whereHas('getCourses', function($q) {
        })->where('slug', $slug)->first();
        if(!isset($data['category'])){
            abort(404);
        }
        $data['breadcrumbs'][] = '<a href="/courses/categories">Course Category</a>';
        $data['breadcrumbs'][] = $data['category']->name;
        $data['slug'] = $slug;
        return view('frontend.courses.courses-list', compact('data'));
    }
    public function course_details($cat_slug, $course_slug) {

        $data['category'] = CourseCategory::where('slug', $cat_slug)->first();
        /* Fetching Modules List on Course Id */
        $data['course'] = Course::where('slug', $course_slug)->first();

        $data['breadcrumb'] = true;
        $data['breadcrumbs'][] = '<a href="/courses/categories">Course Category</a>';
        if(!isset($data['category']) || !isset($data['course'])){
            abort(404);
        }
        $data['breadcrumbs'][] = '<a href="/courses/categories/'.$data['category']->slug.'">'.$data['category']->name.'</a>';
        $data['breadcrumbs'][] = $data['course']->title;
        return view('frontend.courses.course-detail', compact('data'));
    }

    public function module_videos($cat_slug, $course_slug, $module_slug){

        $data['category'] = CourseCategory::where('slug', $cat_slug)->first();
        $data['course'] = Course::where('slug', $course_slug)->first();
        /*Fetching Instructor Name */
        $data['module'] = CourseModule::where('slug', $module_slug)->where('status', '=', 'Y')->first();
        $data['breadcrumb'] = true;
        $data['breadcrumbs'][] = '<a href="/courses/categories">Course Category</a>';
        if(!isset($data['category']) || !isset($data['course'])){
            abort(404);
        }
        $data['breadcrumbs'][] = '<a href="/courses/categories/'.$data['category']->slug.'">'.$data['category']->name.'</a>';
        $data['breadcrumbs'][] = '<a href="/courses/categories/'.$data['category']->slug.'/'.$data['course']->slug.'">'.$data['course']->title.'</a>';
        $data['breadcrumbs'][] = $data['module']->title;
        $data['savedAnswersCount'] = CourseModule::userSavedAsnwersCount($data['module']->id);
        return view('frontend.courses.module-videos', compact('data'));
    }

    public function module_video($cat_slug, $course_slug, $module_slug, $video_slug){
        $data['breadcrumb'] = true;
        $data['category'] = CourseCategory::where('slug', $cat_slug)->first();
        /*Fetching Instructor Name */
        $data['course'] = Course::where('slug', $course_slug)->first();
        
        /* Modules Listing */
        $data['modules_list'] = CourseModule::where('course_id', $data['course']->id)->where('status', '=', 'Y')->get();

        /* Fetching Module Videos on Module Id */
        $data['module'] = CourseModule::where('slug', $module_slug)->where('status', '=', 'Y')->first();
        $data['video'] = CourseModuleVideo::where('slug', $video_slug)->where('status', '=', 'Y')->first();
        $data['breadcrumb'] = true;
        $data['breadcrumbs'][] = '<a href="/courses/categories">Course Category</a>';
        $data['breadcrumbs'][] = '<a href="/courses/categories/'.$data['video']->module->course->category->slug.'">'.$data['video']->module->course->category->name.'</a>';
        $data['breadcrumbs'][] = '<a href="/courses/categories/'.$data['video']->module->course->category->slug.'/'.$data['video']->module->course->slug.'">'.$data['video']->module->course->title.'</a>';
        $data['breadcrumbs'][] = '<a href="/courses/categories/'.$data['video']->module->course->category->slug.'/'.$data['video']->module->course->slug.'/'.$data['video']->module->slug.'">'.$data['video']->module->title.'</a>';
        $data['breadcrumbs'][] = $data['video']->title;
        if(!isset($data['category']) || !isset($data['course'])){
            abort(404);
        }
        return view('frontend.courses.module-video', compact('data'));
    }

    public function module_quiz($cat_slug, $course_slug, $module_slug){
        $data['breadcrumb'] = true;
        $data['breadcrumbs'][] = 'Module Quiz';
        $data['course'] = Course::where('slug', $course_slug)->first();
        $data['module'] = CourseModule::where('slug', $module_slug)->first();

        $savedQuizzes = CourseModuleQuizAnswer::where([['user_id', Auth::user()->id],['module_id', $data['module']->id]])->pluck('quiz_id');
        $data['quiz_question'] = CourseModuleQuize::where('module_id', $data['module']->id)->whereNotIn('id', $savedQuizzes)->first();
        
        $data['savedAnswersCount'] = CourseModule::userSavedAsnwersCount($data['module']->id);
        return view('frontend.courses.quiz', compact('data'));
    }

    public function saveQuiz(Request $request)
    {
        $option = CourseModuleQuizOption::find($request->selected_option);
        $is_true = 0;
        if($option->is_true==1)
        {
            $is_true = 1;
        }
        CourseModuleQuizAnswer::create([
            'user_id' => Auth::user()->id,
            'module_id' => $request->module_id,
            'quiz_id' => $request->quiz_id,
            'option_id' => $request->selected_option,
            'is_true' => $is_true
        ]);
        $savedCounts = CourseModuleQuizAnswer::where([['user_id', Auth::user()->id],['module_id', $request->module_id]])->count();
        $module = CourseModule::find($request->module_id);
        if($savedCounts == $module->quizzes->count())
        {
            return redirect()->to('courses/categories/'.$module->course->category->slug.'/'.$module->course->slug.'/'.$module->slug)->with('flash_success', 'Quiz submitted successfully');
        }
        else
        {
            return redirect()->back();
        }
    }
}
