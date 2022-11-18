<?php

namespace App\Http\Controllers\apis;

use App\Http\Controllers\Controller;
// use Illuminate\Http\Request;
use App\Models\CourseCategory;
use App\Models\Course;
use App\Models\CourseModule;
use App\Models\CourseModuleVideo;
use App\Models\CourseModuleQuizAnswer;
use App\Models\CourseModuleQuize;
use App\Models\CourseModuleQuizOption;
use App\Models\CourseType;
use Auth;

class CoursesController extends Controller
{
    public function courseCategories()
    {
        $data['breadcrumb'] = true;
        $data['breadcrumbs'][] = 'Course Category';
        $data['course_categories'] = CourseCategory::whereHas('getCourses')->get();
        foreach($data['course_categories'] as $category)
        {
            $count[]= $category->getCourses->count();
            $enrollments[]= $category->enrolments($category->id);
            for ($i = 0 ; $i < count($data['course_categories']); $i++)
            {
                $category->course_count = $count[count($count)-1];
                $category->enrollments = $enrollments[count($enrollments)-1];
            }
        }
        return response()->json($data, 200);
    }

    public function coursesList($slug)
    {   
        $data['breadcrumb'] = true;
        $data['category'] = CourseCategory::where('slug',$slug)->first();
        $data['course_list'] = Course::whereHas('modules')->with('getCourseType')->where('course_category_id',$data['category']->id)->orderBy('created_at', 'DESC')->get();
        $data['breadcrumbs'][] = '<a href="/courses/categories">Course Category</a>';
        $data['breadcrumbs'][] = $data['category']->name;
        $data['slug'] = $slug;
        return response()->json($data, 200);
    }

    public function filterTypes($type_id = null, $cat_id)
    {  
        if ($type_id == !'null') {
            $data['course_list'] = Course::whereHas('modules')->where([['course_category_id', $cat_id],['course_type_id', $type_id]])
                ->orderBy('created_at', 'DESC')->get();
        } else {
            $data['course_list'] = Course::whereHas('modules')->where('course_category_id',$cat_id)
                ->orderBy('created_at', 'DESC')->get();
        }
        return response()->json($data, 200);
    }

    public function sortBy($sortType, $cat_id)
    {
        if ($sortType == 'name') {
            $data['course_list']= Course::whereHas('modules')->where('course_category_id', $cat_id)->orderBy('title', 'ASC')->get();
        } elseif ($sortType == 'price_desc') {
            $data['course_list']= Course::whereHas('modules')->where('course_category_id', $cat_id)->orderBy('price', 'DESC')->get();
        } elseif ($sortType == 'price_asc') {
            $data['course_list']= Course::whereHas('modules')->where('course_category_id', $cat_id)->orderBy('price', 'ASC')->get();
        }
        return response()->json($data, 200);
    }

    public function courseDetails($cat_slug, $course_slug) 
    {   
        /*Fetching Course Category using category_slug */
        $data['category'] = CourseCategory::where('slug', $cat_slug)->get(array('name','slug'))->first();
        
        /* Fetching Modules List using Course Slug */
        $data['course'] = Course::where('slug', $course_slug)->first();

        /*Fetching Course Module using module_slug */
        $data['modules_list'] = CourseModule::whereHas('videos')->where('course_id', $data['course']->id)->where('status', '=', 'Y')->get();
        
        if(!isset($data['category']) || !isset($data['course'])){
            return response()->json('Course Category Not Found', 201);
        }

        $data['breadcrumbs']    = [];
        $parentSlug    = "courses/categories/";
        array_push($data['breadcrumbs'], (array)['name' => $cat_slug,'link' => $course_slug]);
        array_push($data['breadcrumbs'], (array)['name' => $parentSlug,'link' => $parentSlug]);

        return response()->json($data, 200);
    }

    public function moduleVideos($cat_slug, $course_slug, $module_slug)
    {
         /*Fetching Course Category using category_slug */
        $data['category'] = CourseCategory::where('slug', $cat_slug)->get(array('name','slug'))->first();

        /*Fetching Course using Course_slug */
        $data['course'] = Course::where('slug', $course_slug)->get(array('title','slug'))->first();
        
        /*Fetching Course Module using module_slug */
        $data['module'] = CourseModule::where('slug', $module_slug)->where('status', '=', 'Y')->first();

        /* Fetching Course Module quiz answer */
        $data['savedAnswersCount'] = CourseModule::userSavedAsnwersCount($data['module']->id);
        
        if(!isset($data['category']) || !isset($data['course'])){
            abort(404);
        }
        $data['breadcrumbs']    = [];
        $parentSlug    = "courses/categories";
        array_push($data['breadcrumbs'], (array)['name' => $parentSlug,'link' => $parentSlug]);
        array_push($data['breadcrumbs'], (array)['name' => $data['category']->name,'link' => $data['category']->slug]);
        array_push($data['breadcrumbs'], (array)['name' => $data['course']->title,'link' => $data['course']->slug]);
        array_push($data['breadcrumbs'], (array)['name' => $data['module']->title,'link' => $data['module']->slug]);
        
        return response()->json($data, 200);
    }

    public function video($cat_slug, $course_slug, $module_slug, $video_slug)
    {
        /*Fetching Course Category using category_slug */
        $data['category'] = CourseCategory::where('slug', $cat_slug)->get(array('name','slug'))->first();

        /*Fetching Course using Course_slug */
        $data['course'] = Course::where('slug', $course_slug)->get(array('title','slug'))->first();

        /*Fetching Course Module using module_slug */
        $data['module'] = CourseModule::where('slug', $module_slug)->where('status', '=', 'Y')->get(array('title','slug'))->first();

        /* Modules Listing */
        $data['modules_list'] = CourseModule::where('course_id', $data['course']->id)->where('status', '=', 'Y')->get();

        /* Fetching Module Videos on Module Id */
        $data['video'] = CourseModuleVideo::where('slug', $video_slug)->where('status', '=', 'Y')->first();
        // $data['breadcrumb'] = true;

        $data['breadcrumbs']    = [];
        $parentSlug    = "courses/categories";
        array_push($data['breadcrumbs'], (array)['name' => $parentSlug,'link' => $parentSlug]);
        array_push($data['breadcrumbs'], (array)['name' => $data['category']->name,'link' => $data['category']->slug]);
        array_push($data['breadcrumbs'], (array)['name' => $data['course']->title,'link' => $data['course']->slug]);
        array_push($data['breadcrumbs'], (array)['name' => $data['module']->title,'link' => $data['module']->slug]);
        array_push($data['breadcrumbs'], (array)['name' => $data['video']->title,'link' => $data['video']->slug]);

        
        if(!isset($data['category']) || !isset($data['course']))
        {
            abort(404);
        }
        return response()->json($data, 200);
    }

    // public function moduleQuiz($course_slug, $module_slug)
    // {
    //     /*Fetching Course using Course_slug */
    //     $data['course'] = Course::where('slug', $course_slug)->first();

    //     /*Fetching Course Module using module_slug */
    //     $data['module'] = CourseModule::where('slug', $module_slug)->first();

    //     /*Fetching Course Module Quiz Answer */
    //     $savedQuizzes = CourseModuleQuizAnswer::where([['user_id', Auth::user()->id],['module_id', $data['module']->id]])->pluck('quiz_id');

    //     /*Fetching Course Module using module_slug */
    //     $data['quiz_question'] = CourseModuleQuize::where('module_id', $data['module']->id)->whereNotIn('id', $savedQuizzes)->first();
        
    //     $data['savedAnswersCount'] = CourseModule::userSavedAsnwersCount($data['module']->id);

    //     return response()->json($data, 200);
    // }

    // public function saveQuiz(Request $request)
    // {
    //     $option = CourseModuleQuizOption::find($request->selected_option);
    //     $is_true = 0;
    //     if($option->is_true==1)
    //     {
    //         $is_true = 1;
    //     }
    //     CourseModuleQuizAnswer::create([
    //         'user_id' => Auth::user()->id,
    //         'module_id' => $request->module_id,
    //         'quiz_id' => $request->quiz_id,
    //         'option_id' => $request->selected_option,
    //         'is_true' => $is_true
    //     ]);
    //     $savedCounts = CourseModuleQuizAnswer::where([['user_id', Auth::user()->id],['module_id', $request->module_id]])->count();
    //     $module = CourseModule::find($request->module_id);
    //     if($savedCounts == $module->quizzes->count())
    //     {
    //         return redirect()->to('courses/categories/'.$module->course->category->slug.'/'.$module->course->slug.'/'.$module->slug)->with('flash_success', 'Quiz submitted successfully');
    //     }
    //     else
    //     {
    //         return redirect()->back();
    //     }
    // }
}