<?php

namespace App\Http\Controllers\Backend\Manage_Courses;

use App\Http\Controllers\Controller;
use App\Models\CourseModuleQuize;
use App\Models\CourseModuleQuizOption;
use Illuminate\Http\Request;

class CourseModuleQuizOptionsController extends Controller
{
    public function index($course_slug, $module_slug, $quiz_id)
    {
        $data['p_heading']      = 'Add Options';
        $data['p_description']  = 'Here is the list of quiz options';
        $data['quiz'] = CourseModuleQuize::find($quiz_id);
        return view('backend.course_management.modules.quizes.add_options', $data);
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'quiz_option' => 'required'
        ]);

        CourseModuleQuizOption::create([
            'quiz_id' => $request->quiz_id,
            'quiz_option' => $request->quiz_option,
            'is_true' => (bool)$request->is_true,
            'created_at' => date('Y-m-d H:i:s')
        ]);

        return redirect()->back()->with('flash_success', 'Quiz option added successfully.');
    }

    public function edit($course_slug, $module_slug, $quiz_id, $option_id)
    {
        $data['p_heading']      = 'Update Quiz';
        $data['p_description']  = 'Here is the list of quiz options';
        $data['quiz'] = CourseModuleQuize::find($quiz_id);
        $data['option'] = CourseModuleQuizOption::find($option_id);
        return view('backend.course_management.modules.quizes.add_options', $data);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'quiz_option' => 'required'
        ]);
        $option = CourseModuleQuizOption::find($id);
        $option->update([
            'quiz_option' => $request->quiz_option,
            'is_true' => (bool)$request->is_true
        ]);

        return redirect()->to('admin/manage-courses/course/' . $option->quiz->module->course->slug . '/module/' . $option->quiz->module->slug . '/quiz/' . $option->quiz->id . '/options')->with('flash_success', 'Quiz option updated successfully.');
    }

    public function destroy($id)
    {
        $quiz = CourseModuleQuizOption::find($id);
        $quiz->delete();
        return redirect()->back()->with('flash_danger', 'Quiz option deleted successfully.');
    }
}
