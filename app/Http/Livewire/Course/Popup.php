<?php
namespace App\Http\Livewire\Course;

use App\Models\Course;
use Livewire\Component;

class Popup extends Component
{
    public $course, $showModel=false;

    protected $listeners = ['closeModel' => 'closeModel', 'courseData' => 'courseData', 'closeModel'=>'closeModel'];
    
    public function render()
    {
        return view('livewire.course.popup');
    }

    public function courseData($id)
    {
        $this->showModel = true;
        $this->course = Course::find($id);
    }

    public function closeModel()
    {
        $this->showModel = false;
    }
}
