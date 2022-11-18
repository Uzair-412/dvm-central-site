<?php

namespace App\Http\Livewire\Frontend\Jobs;

use App\Models\Country;
use App\Models\EducationLevel;
use App\Models\JobCategory;
use App\Models\JobWorkingTime;
use App\Models\SalaryType;
use App\Models\State;
use App\Models\Vendor;
use App\Models\VendorJob;
use App\Models\VendorJobType;
use Livewire\Component;
class JobList extends Component
{   
     public $data, $categories, $job_types, $working_times, $salary_types, $educations, $companies, $countries, $states;
    public $filter= [], $company, $state = array(), $category = array();
    public $maxPrice, $minPrice;

    protected $listeners = ['updatedMinPrice' => 'updatedMinPrice', 'updatedMaxPrice' => 'updatedMaxPrice'];

    public function mount()
    {
        $this->categories  = JobCategory::join('vendor_job_categories', 'vendor_job_categories.category_id', '=', 'job_categories.id')
            ->select('job_categories.*')
            ->groupBy('job_categories.id')
            ->get();
        $this->working_times  = JobWorkingTime::join('vendor_jobs', 'vendor_jobs.working_time_id', '=', 'job_working_times.id')
            ->select('job_working_times.*')
            ->groupBy('job_working_times.id')
            ->get();
        $this->salary_types  = SalaryType::join('vendor_jobs', 'vendor_jobs.salary_type', '=', 'salary_types.id')
            ->select('salary_types.*')
            ->groupBy('salary_types.id')
            ->get();
        $this->educations  = EducationLevel::join('vendor_jobs', 'vendor_jobs.minimum_education_level_id', '=', 'education_levels.id')
            ->select('education_levels.*')
            ->groupBy('education_levels.id')
            ->get();
        $this->companies  = Vendor::join('vendor_jobs', 'vendor_jobs.vendor_id', '=', 'vendors.id')
            ->select('vendors.*')
            ->groupBy('vendors.id')
            ->get();
        $this->countries  = Country::join('vendor_jobs', 'vendor_jobs.country_id', '=', 'countries.id')
            ->select('countries.*')
            ->groupBy('countries.id')
            ->get();
        $this->states  = State::join('vendor_jobs', 'vendor_jobs.state_id', '=', 'states.id')
            ->select('states.*')
            ->groupBy('states.id')
            ->get();

        $this->maxPrice = VendorJob::max('salary');
    }
    
    public function render()
    {
        $this->job_types  = VendorJobType::join('job_types', 'job_types.id', '=', 'vendor_job_types.job_type_id')
            ->select('job_types.*')
            ->groupBy('job_types.id')
            ->get();
        return view('livewire.frontend.jobs.job-list');
    }

    public function updatedFilter($value)
    {
        $this->emit('filterJobs', $this->filter);
    }

    public function updatedMinPrice($value)
    {
        $this->filter['salary_range'][0] = $value;
        $this->emit('filterJobs', $this->filter);
    }

    public function updatedMaxPrice($value)
    {
        $this->filter['salary_range'][1] = $value;
        $this->emit('filterJobs', $this->filter);
    }

    public function updatedCompany($value) {
        if($value)
        {
            $this->filter['vendor_id'] = $value;
        }
        else
        {
            unset($this->filter['vendor_id']);
        }
        $this->emit('filterJobs', $this->filter);
    }

    public function updatedState($value)
    {
    }

    public function updatedCategory($value)
    {
        $this->emit('filterJobs', $this->filter);
    }

    public function stateFilter($value)
    {
        if(@$this->filter['state'][$value])
        {
            unset($this->filter['state'][$value]);
        }
        else
        {
            $this->filter['state'][$value] = $value;
        }
    }

    public function filterHandler($key, $value)
    {
        $this->filter[$key] = $value;
    }
}
