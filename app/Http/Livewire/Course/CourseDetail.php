<?php

namespace App\Http\Livewire\Course;

use App\Models\CourseModule;
use App\Models\Customer;
use Livewire\Component;

class CourseDetail extends Component
{
    public $data, $course, $instructor, $modules_list;
    
    public function mount()
    {
        $this->course = $this->data['course'];
        $this->modules_list = CourseModule::whereHas('videos')->where('course_id', $this->course->id)->where('status', '=', 'Y')->get();
        /*Fetching Instructor Name */
        $this->instructor = Customer::where('id', $this->course->user_id)->first();
    }

    public function render()
    {
        return view('livewire.course.course-detail');
    }

    public function buyNow($course_id)
    {
        $this->emit('courseData', $course_id);
    }
}
