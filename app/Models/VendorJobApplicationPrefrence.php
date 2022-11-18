<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VendorJobApplicationPrefrence extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function communication_settings()
    {
        return $this->hasMany(VendorJobCommunicationSetting::class, 'application_preference_id');
    }
}
