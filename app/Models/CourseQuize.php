<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseQuize extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function module()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }

    public function options()
    {
        return $this->hasMany(CourseModuleQuizOption::class, 'quiz_id');
    }
}