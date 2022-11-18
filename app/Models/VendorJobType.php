<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VendorJobType extends Model
{
    use HasFactory;

    protected $guarded = [];

    public $timestamps = false;

    public function job_type()
    {
        return $this->belongsTo(JobType::class, 'job_type_id');
    }
}
