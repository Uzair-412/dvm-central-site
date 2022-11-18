<?php

namespace App\Http\Livewire\Course;

use App\Models\CourseModuleVideo;
use App\Models\Customer;
use Livewire\Component;

class ModuleVideo extends Component
{   
    public $data, $instructor, $modules ,$video, $course, $modules_list;

    public function mount()
    {
        $this->course = $this->data['course'];
        $this->module = $this->data['module'];
        $this->video  = $this->data['video'];
        $this->modules_list = $this->data['modules_list'];
        $this->instructor= Customer::where('id', $this->course->user_id)->first();
        $this->videos = CourseModuleVideo::where('course_module_id', $this->module->id)->where('status', '=', 'Y')->get();
    }

    public function render()
    {
        return view('livewire.course.module-video');
    }

    public function buyNow($course_id)
    {
        $this->emit('courseData', $course_id);
    }
}
