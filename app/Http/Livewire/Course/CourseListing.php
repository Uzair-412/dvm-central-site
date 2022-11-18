<?php

namespace App\Http\Livewire\Course;

use Livewire\Component;
use App\Models\Course;
use App\Models\CourseCategory;
use App\Models\CourseType;

class CourseListing extends Component
{
    public $data, $category, $course_list, $course_types;
    protected $listeners = [
        'filter_types' => 'filter_types',
        'sortBy' => 'sortBy',
    ];

    public function sortBy($sortType)
    {
        if ($sortType == 'name') {
            $this->course_list = Course::whereHas('modules')->where('course_category_id', $this->category->id)->orderBy('title', 'ASC')->get();
        } elseif ($sortType == 'price_desc') {
            $this->course_list = Course::whereHas('modules')->where('course_category_id', $this->category->id)->orderBy('price', 'DESC')->get();
        } elseif ($sortType == 'price_asc') {
            $this->course_list = Course::whereHas('modules')->where('course_category_id', $this->category->id)->orderBy('price', 'ASC')->get();
        }
    }
    public function filter_types($type_id = null)
    {
        if ($type_id == !null) {
            $this->course_list = Course::whereHas('modules')->where([['course_category_id', $this->category->id],['course_type_id', $type_id]])
                ->orderBy('created_at', 'DESC')->get();
        } else {
            $this->course_list = Course::whereHas('modules')->where('course_category_id',$this->category->id)
                ->orderBy('created_at', 'DESC')->get();
        }
    }

    public function mount()
    {
        $this->category = CourseCategory::where('slug',$this->data['slug'])->first();
        $this->course_list = Course::whereHas('modules')->where('course_category_id',$this->category->id)->orderBy('created_at', 'DESC')->get();
    }

    public function render()
    {
        $this->course_types = CourseType::all();
        return view('livewire.course.course-listing');
    }

    public function buyNow($course_id)
    {
        $this->emit('courseData', $course_id);
    }
}
