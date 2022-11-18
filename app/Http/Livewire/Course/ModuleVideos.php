<?php

namespace App\Http\Livewire\Course;

use App\Models\CourseModuleQuizAnswer;
use App\Models\CourseModuleVideo;
use App\Models\Customer;
use Auth;
use Livewire\Component;

class ModuleVideos extends Component
{
    public $data, $instructor, $module ,$videos, $course, $video, $correctAnswers;

    public function mount()
    {   
        $this->module = $this->data['module'];
        $this->course = $this->data['course'];
        $this->instructor = Customer::where('id', $this->data['course']->user_id)->first();
        
        $this->videos = CourseModuleVideo::where('course_module_id', $this->module->id)->where('status', '=', 'Y')->get();
        if(Auth::user()){
            $this->correctAnswers = CourseModuleQuizAnswer::where(['module_id'=>$this->module->id, 'user_id' => Auth::user()->id, 'is_true' => 1])->count();
        }
    }

    public function render()
    {
        return view('livewire.course.module-videos');
    }

    public function buyNow($course_id)
    {
        $this->emit('courseData', $course_id);
    }

}
