<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobWishlist extends Model
{
    use HasFactory;

    public function wishlist($job_id){
        if(auth()->user()){
            $wishlist = JobWishlist::where('user_id',auth()->user()->id)->where('job_id' ,$job_id)->first();
            return $wishlist;
        }
        return false;
    }

    public function vendor_job()
    {
        return $this->belongsTo(VendorJob::class,'job_id');
    }

    public static function getWishlistJobs($filter=[])
    {
        $jobs = JobWishlist::with(['vendor_job' => function($q) {
            $q->with(['salary_type_', 'minimum_education_level', 'country', 'state']);
            $q->with(['job_categories' => function($j_Cat_q) {
                $j_Cat_q->with('category');
            }]);
            $q->with(['job_types' => function($j_type_q) {
                $j_type_q->with('job_type');
            }]);
        }]);
        $jobs->where($filter);
        return $jobs->paginate('5');
    }
}
