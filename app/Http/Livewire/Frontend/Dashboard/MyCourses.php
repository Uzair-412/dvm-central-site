<?php

namespace App\Http\Livewire\Frontend\Dashboard;

use App\Models\CourseEnrollment;
use Auth;
use Livewire\Component;

class MyCourses extends Component
{
    public $courses;

    public function mount()
    {
        $this->courses = CourseEnrollment::where('user_id', Auth::user()->id)->get();
    }

    public function render()
    {
        return view('livewire.frontend.dashboard.my-courses');
    }
}
