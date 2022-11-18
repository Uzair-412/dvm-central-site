<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function modules()
    {
        return $this->hasMany(CourseModule::class, 'course_id');
    }
    public function getSelectedColumnsFromModules()
    {
        // return $this->hasMany(CourseModule::class, 'course_id')->select('id','course_id','title','short_description','description','price','price_original','thumbnail','slug','status');
        // return $this->hasMany(CourseModule::class, 'course_id')->select('id','course_id','title','description','slug','status');
    }

    public function category()
    {
        return $this->belongsTo(CourseCategory::class, 'course_category_id');
    }

    public function getCourseType()
    {
        return $this->belongsTo(CourseType::class, 'course_type_id');
    }

    public function instructor()
    {
        return $this->belongsTo(Customer::class, 'user_id');
    }
    public function getSelectedColumnsOfInstructor()
    {
        return $this->belongsTo(Customer::class, 'user_id')->select('id','first_name','last_name','email','type');
    }

    public function enrollments()
    {
        return $this->hasMany(CourseEnrollment::class, 'course_id');
    }
    
    public static function video_counts($course_id)
    {
        $course = Course::find($course_id);
        $videos_count = 0;
        foreach($course->modules as $module)
        {
            $videos_count += $module->videos->count();
        }
        return $videos_count;
    }

    public static function discount($id)
    {
        $course = self::find($id);
        $discount = 0;
        if($course->price_original > 0)
        {
            $discount = ($course->price / $course->price_original) * 100;
            $discount = 100 - $discount;
        }
        return $discount;
    }

    public static function enrolled($course_id)
    {
        $enrolled = 0;
        if(auth()->user())
        {
            $enrollment = CourseEnrollment::where(['course_id'=>$course_id, 'user_id' => auth()->user()->id])->first();
            if(@$enrollment)
            {
                $enrolled = 1;
            }
        }
        return $enrolled;
    }
}