<?php

namespace App\Http\Controllers\apis;

use App\Http\Controllers\Controller;
use App\Models\VendorJob;
use App\Models\CandidateAppliedJob;
use App\Models\CandidateJobQuestionAnswer;
use App\Models\Customer;
use App\Models\EducationLevel;
use App\Models\VendorJobApplicationQuestion;
use App\Models\VendorJobCategory;
use Auth;
use Illuminate\Http\Request;

class JobsController extends Controller
{
    public function listing()
    {
        $data['breadcrumbs'] = [];
        $parentSlug = "jobs";
        /* Fetching all Vendor Jobs with country,state,salary type, job working time, minimum education level */
        $data['job_detail'] = VendorJob::with(['vendor:id,name'])->with(['country:id,name'])->with(['state:id,name'])->with(['salary_type_:id,name'])->with('job_working_time')->with(['minimum_education_level:id,name'])->paginate(12);
        foreach($data['job_detail'] as $job_detail){
            $job_data =  VendorJob::where('id',$job_detail->id)->first();
            foreach($job_data->job_types as $jt){
                $job_detail->job_type =$jt->job_type;
            }
            foreach($job_data->job_categories as $jc){
                $job_detail->category =$jc->category;
            }
        }
        /* Push main job page slug int breadcrumbs array */
        array_push($data['breadcrumbs'], (array)['name' => $parentSlug,'link' => $parentSlug]);
        return response()->json($data, 200);
    }
    
    public function filterType()
    {
        die("Will work after detail API");
    }

    public function jobDetail($slug)
    {
        $data['breadcrumbs']    = [];
        // $data['job_detail'] = VendorJob::where('slug', $slug)->first();
        $data['job_detail'] = VendorJob::with(['vendor:id,name,phone,user'])->with(['country:id,name'])->with(['state:id,name'])->with(['salary_type_:id,name'])->with('job_working_time')->with(['minimum_education_level:id,name'])->where('slug', $slug)->first();
        $data['job_detail']->application_start_time = date('M-d-Y',$data['job_detail']->application_start_time);
        $data['job_detail']->application_end_time = date('M-d-Y',$data['job_detail']->application_end_time);
        $data['job_detail']->vendor->email =Customer::getCustomerEmail($data['job_detail']->vendor->user);
        $jobTitle = $data['job_detail']->title;
        $jobSlug = $data['job_detail']->slug;
        // $data['education_levels'] = EducationLevel::all();
        $data['page_type'] = "job_detail";

        $parentSlug    = "jobs";
        array_push($data['breadcrumbs'], (array)['name' => $jobTitle]);
        array_push($data['breadcrumbs'], (array)['name' => "Jobs",'link' => $parentSlug]);

        return response()->json($data, 200);
    }

    // public function apply(Request $request)
    // {

    //     $date = date('d-m-y h:i:s');
    //     $filename = '';
    //     if ($request->file('resume_file')) {
    //         $request->validate([
    //             'resume_file' => 'required|mimes:pdf,docx,doc|max:4096'
    //         ]);
    //         $file = $request->file('resume_file');
    //         $filename = date('Ymdis') . '.' . $file->getClientOriginalExtension();
    //         $file_path = 'up_data/jobs/user/' . Auth::user()->id . '/';
    //         $file_path = $this->createDirectory($file_path);
    //         $file->move(public_path($file_path), $filename);
    //     }
    //     CandidateAppliedJob::create([
    //         'years_of_experience' => $request->years_of_experience,
    //         'resume_file' => @$filename,
    //         'vendor_job_id' => $request->vendor_job_id,
    //         'customer_id' => auth()->user()->id,
    //         'status' => 0,
    //         'applied_time' => $date,
    //         'education_level_id' => $request->education_level,
    //     ]);

    //     $quetion_id = $request['quetion_id'];
    //     $answer = $request['answer'];

    //     foreach ($request->quetion_id as $key => $quetion) {
    //         $quetion = new CandidateJobQuestionAnswer();
    //         $quetion->quetion_id =  $quetion_id[$key];
    //         $quetion->answer =  $answer[$key];
    //         $quetion->customer_id = auth()->user()->id;
    //         $quetion->save();
    //     }

    //     return redirect()->back()->with('flash_success', 'Job apllied successfully.');
    // }
}