<?php

namespace App\Http\Controllers\ApisV2;

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
        $data['breadcrumbs']= [];
        
        /* Getting all courses categories that has courses in it */
        $data['course_categories'] = CourseCategory::whereHas('getSelectedCoursesColumns')->get(array('id','name','short_description','slug'));
        
        /* Adding courses and enrollments counts in course_categories array */
        foreach($data['course_categories'] as $category)
        {
            $count[]= $category->getSelectedCoursesColumns->count();
            $enrollments[]= $category->enrolments($category->id);
            for ($i = 0 ; $i < count($data['course_categories']); $i++)
            {
                $category->course_count = $count[count($count)-1];
                $category->enrollments = $enrollments[count($enrollments)-1];
            }
        }
        array_push($data['breadcrumbs'], (array)['name' => 'Courses Category']);

        $data['page_type'] = "course_categories";

        return response()->json($data, 200);
    }

    public function coursesList($slug)
    {   
            $data['category'] = CourseCategory::where('slug',$slug)->first(array('id','name','slug'));
            $data['breadcrumbs']= [];
            
            /* Fetching course data with type */
            $data['course_list'] = Course::with('getCourseType')->where('course_category_id',$data['category']->id)->orderBy('created_at', 'DESC')->get(array('id','course_category_id','course_type_id','slug','user_id','title','thumbnail'));
            
            array_push($data['breadcrumbs'], (array)['name' => 'Courses Category','link' => 'courses/categories']);
            array_push($data['breadcrumbs'], (array)['name' => 'VETERINARY']);

            $data['page_type'] = "course_list";
    
            return response()->json($data, 200);
    }

    public function filterTypes($type_id = null, $cat_id)
    {  
        if (isset($type_id) && $type_id !== 'null') 
        {
            $data['course_list'] = Course::with('getCourseType')->where([['course_category_id', $cat_id],['course_type_id', $type_id]])->orderBy('created_at', 'DESC')->get(array('id','course_category_id','course_type_id','user_id','title','thumbnail'));
        } 
        else 
        {
            $data['course_list'] = Course::with('getCourseType')->where('course_category_id',$cat_id)->orderBy('created_at', 'DESC')->get(array('id','course_category_id','course_type_id','user_id','title','thumbnail'));
        }
        return response()->json($data, 200);
    }

    public function sortBy($sortType, $cat_id)
    {
        if ($sortType == 'name') {
            $data['course_list']= Course::with('getCourseType')->where('course_category_id', $cat_id)->orderBy('title', 'ASC')->get(array('id','course_category_id','course_type_id','user_id','title','thumbnail'));
        } elseif ($sortType == 'price_desc') {
            $data['course_list']= Course::with('getCourseType')->where('course_category_id', $cat_id)->orderBy('price', 'DESC')->get(array('id','course_category_id','course_type_id','user_id','title','thumbnail'));
        } elseif ($sortType == 'price_asc') {
            $data['course_list']= Course::with('getCourseType')->where('course_category_id', $cat_id)->orderBy('price', 'ASC')->get(array('id','course_category_id','course_type_id','user_id','title','thumbnail'));
        }
        return response()->json($data, 200);
    }

    public function courseDetails($cat_slug, $course_slug) 
    {   
        /*Fetching Course Category using category_slug */
        $data['category'] = CourseCategory::where('slug', $cat_slug)->get(array('name','slug'))->first();
        
        /* Fetching Modules List using Course Slug */
        $data['course'] = Course::where('slug', $course_slug)->first(array('id','course_category_id','slug','course_type_id','user_id','title','thumbnail','short_description','general_guidance','is_24_7_support_service','is_practice_questions'));
        // $data['course'] = Course::where('slug', $course_slug)->first();

        /*Fetching Course Module using module_slug */
        $data['modules_list'] = CourseModule::with('videos')->where('course_id', $data['course']->id)->where('status', '=', 'Y')->get();
        if(!isset($data['category']) || !isset($data['course'])){
            return response()->json('Course Category Not Found', 201);
        }

        $data['breadcrumbs']    = [];
        $parentSlug    = "courses/categories/";
        array_push($data['breadcrumbs'], (array)['name' => $cat_slug,'link' => $course_slug]);
        array_push($data['breadcrumbs'], (array)['name' => $parentSlug,'link' => $parentSlug]);

        $data['page_type'] = "course_details";


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

        /* Fetching Course Modules Videos List */
        $data['video'] = CourseModuleVideo::where('course_module_id', $data['module']->id)->where('status', '=', 'Y')->get();

        
        if(!isset($data['category']) || !isset($data['course'])){
            abort(404);
        }
        $data['breadcrumbs']    = [];
        $parentSlug    = "courses/categories";
        array_push($data['breadcrumbs'], (array)['name' => $parentSlug,'link' => $parentSlug]);
        array_push($data['breadcrumbs'], (array)['name' => $data['category']->name,'link' => $data['category']->slug]);
        array_push($data['breadcrumbs'], (array)['name' => $data['course']->title,'link' => $data['course']->slug]);
        array_push($data['breadcrumbs'], (array)['name' => $data['module']->title,'link' => $data['module']->slug]);

        $data['page_type'] = "module_videos";
        
        return response()->json($data, 200);
    }

    public function video($cat_slug, $course_slug, $module_slug, $video_slug)
    {
        /*Fetching Course Category using category_slug */
        $data['category'] = CourseCategory::where('slug', $cat_slug)->get(array('id','name','slug'))->first();
        /* Adding courses and enrollments counts in course_categories array */
        $data['enrollments'] = $data['category'] -> enrolments($data['category']->id);
        /*Fetching Course using Course_slug */
        $data['course'] = Course::where('slug', $course_slug)->get(array('id','title','slug'))->first();

        /*Fetching Course Module using module_slug */
        $data['module'] = CourseModule::where('slug', $module_slug)->where('status', '=', 'Y')->get(array('id','title','slug'))->first();

        /* Modules Videos Listing */
        $data['allVideosList'] = CourseModuleVideo::where('course_module_id', $data['module']->id)->where('status', '=', 'Y')->get();

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

        $data['page_type'] = "single_video";

        return response()->json($data, 200);
    }

    public function moduleQuiz($course_slug, $module_slug)
    {
        $module_slug = "general-pharmacology";
        
        /*Fetching Course Module using module_slug */
        $data['module'] = CourseModule::where('slug', $module_slug)->first(array('id','slug'));
        $data['quiz_question'] = CourseModuleQuize::where('module_id', $data['module']->id)->get();
        
        return response()->json($data, 200);
    }

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

    public function courseEnrollment($course_slug) 
    {
        $finalEnrollSlug = str_replace("--enrollcourse", "", $course_slug);
        $finalEnrollSlug = 'bachelor-of-veterinary-science-bvsc-animal-genetics-breeding';

        $data['course'] = Course::where('slug', $course_slug)->first(array('id','course_category_id','slug','course_type_id','user_id','title','thumbnail','short_description','general_guidance','is_24_7_support_service','is_practice_questions'));
       
        $data['category'] = $data['course']->category;
        unset($data['course']->category);
        $data['course_enrollment_detail'] = Course::with('modules')->with('getSelectedColumnsOfinstructor')->where('slug',$finalEnrollSlug)->orderBy('created_at', 'DESC')->get();
        
        return response()->json($data, 200);
    }
}