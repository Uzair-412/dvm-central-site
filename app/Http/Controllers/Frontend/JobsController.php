<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\CandidateAppliedJob;
use App\Models\CandidateJobQuestionAnswer;
use App\Models\EducationLevel;
use App\Models\VendorJob;
use App\Models\VendorJobApplicationQuestion;
use App\Models\VendorJobCategory;
use Auth;
use Illuminate\Http\Request;

class JobsController extends Controller
{
    public function listing()
    {
        $data['breadcrumb'] = true;
        $data['breadcrumbs'][] = 'Jobs Listing';
        return view('frontend.jobs.jobs_listing', compact('data'));
    }

    public function detail($slug)
    {
        $data['breadcrumb'] = true;
        $data['breadcrumbs'][] = 'Job Details';
        $data['job_detail'] = VendorJob::where('slug', $slug)->first();
        if ($data['job_detail']) {
            $data['job_category'] = VendorJobCategory::where('job_id', $data['job_detail']->id)->first();
            $data['related_jobs']  = VendorJob::where([
                ['id', '!=', $data['job_detail']->id],
                ['title', 'like', '%' . $data['job_detail']->title . '%']
            ])->get();
        }
        $data['education_levels'] = EducationLevel::all();
        // $data['job_category_id'] = $data['job_category']->category->id;
        // $data['related_jobs_id'] = VendorJobCategory::where('category_id',$data['job_category_id'])->get();

        return view('frontend.jobs.detail', $data);
    }

    public function apply(Request $request)
    {

        $date = date('d-m-y h:i:s');
        $filename = '';
        if ($request->file('resume_file')) {
            $request->validate([
                'resume_file' => 'required|mimes:pdf,docx,doc|max:4096'
            ]);
            $file = $request->file('resume_file');
            $filename = date('Ymdis') . '.' . $file->getClientOriginalExtension();
            $file_path = 'up_data/jobs/user/' . Auth::user()->id . '/';
            $file_path = $this->createDirectory($file_path);
            $file->move(public_path($file_path), $filename);
        }
        CandidateAppliedJob::create([
            'years_of_experience' => $request->years_of_experience,
            'resume_file' => @$filename,
            'vendor_job_id' => $request->vendor_job_id,
            'customer_id' => auth()->user()->id,
            'status' => 0,
            'applied_time' => $date,
            'education_level_id' => $request->education_level,
        ]);

        $quetion_id = $request['quetion_id'];
        $answer = $request['answer'];

        foreach ($request->quetion_id as $key => $quetion) {
            $quetion = new CandidateJobQuestionAnswer();
            $quetion->quetion_id =  $quetion_id[$key];
            $quetion->answer =  $answer[$key];
            $quetion->customer_id = auth()->user()->id;
            $quetion->save();
        }

        return redirect()->back()->with('flash_success', 'Job apllied successfully.');
    }
}
