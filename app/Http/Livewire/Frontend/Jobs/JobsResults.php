<?php

namespace App\Http\Livewire\Frontend\Jobs;

use App\Models\JobWishlist;
use App\Models\VendorJob;
use Livewire\Component;

class JobsResults extends Component
{
    public $filter= [], $jobs;

    protected $listeners = ['filterJobs' => 'filterJobs'];

    public function mount()
    {
        $this->filterJobs();
    }

    public function render()
    {
        return view('livewire.frontend.jobs.jobs-results');
    }

    public function filterJobs($filter=[])
    {
        if(!empty($filter))
        {
            $this->filter = $filter;
        }
        $this->jobs = VendorJob::filter($this->filter);
    }

    public function updateMultiFilterCategories($key, $value)
    {
        $this->filter['multi_categories'][$key] = $value;
        $this->filterJobs();
    }

    public function add_to_wishlist($job_id)
    {
        if(auth()->user()) {
         // getting wishlist record against active user
            $wishlist_record = JobWishlist::where('user_id', auth()->user()->id)
                ->where('job_id', $job_id)
                ->first();
            // dd($wishlist_record);
            if (!$wishlist_record) {
                $wishlist = new JobWishlist();
                $wishlist->job_id = $job_id;
                $wishlist->user_id = auth()->user()->id;
                $wishlist->save();
            } else {
                $wishlist = JobWishlist::find($wishlist_record->id);
                $wishlist->delete();
            }
            $this->filterJobs();
        } else{
            return redirect()->back()->with('flash_success', 'Please Login first.');;
        }
    }
}
