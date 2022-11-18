<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VendorJobCategory extends Model
{
    use HasFactory;

    protected $guarded = [];

    public $timestamps = false;

    public function category()
    {
        return $this->belongsTo(JobCategory::class, 'category_id');
    }

    public function vendor_job()
    {
        return $this->belongsTo(VendorJob::class, 'job_id')->where([['application_end_time', '>=', time()],['process', 4]]);
    }
}
