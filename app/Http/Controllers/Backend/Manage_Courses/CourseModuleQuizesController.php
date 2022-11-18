<?php

namespace App\Http\Controllers\Backend\Manage_Courses;

use App\Http\Controllers\Controller;
use App\Models\CourseModule;
use App\Models\CourseModuleQuize;
use Illuminate\Http\Request;

class CourseModuleQuizesController extends Controller
{
    public function index($course_slug, $module_slug)
    {
        $data['p_heading']      = 'Add Quiz';
        $data['p_description']  = 'Here is the list of quizes';
        $data['course_module'] = CourseModule::where(['slug'=>$module_slug])->first();
        $data['quizes'] = CourseModuleQuize::where('module_id', $data['course_module']->id)->get();
        return view('backend.course_management.modules.quizes.add', $data);
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'question' => 'required'
        ]);

        CourseModuleQuize::create([
            'module_id' => $request->module_id,
            'question' => $request->question,
            'created_at' => date('Y-m-d H:i:s')
        ]);

        return redirect()->back()->with('flash_success', 'Module quiz added successfully.');
    }

    public function edit($course_slug, $module_slug, $quiz_id)
    {
        $data['p_heading']      = 'Update Quiz';
        $data['p_description']  = 'Here is the list of quizes';
        $data['course_module'] = CourseModule::where(['slug'=>$module_slug])->first();
        $data['quizes'] = CourseModuleQuize::where('module_id', $data['course_module']->id)->get();
        $data['quiz'] = CourseModuleQuize::find($quiz_id);
        return view('backend.course_management.modules.quizes.add', $data);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'question' => 'required'
        ]);
        $quiz = CourseModuleQuize::find($id);
        $quiz->update([
            'question' => $request->question
        ]);

        return redirect()->to('admin/manage-courses/course/'.$quiz->module->course->slug.'/module/'.$quiz->module->slug.'/quizes')->with('flash_success', 'Module quiz updated successfully.');
    }

    public function destroy($id)
    {
        $quiz = CourseModuleQuize::find($id);
        $quiz->delete();
        return redirect()->back()->with('flash_danger', 'Module quiz deleted successfully.');
    }
}
