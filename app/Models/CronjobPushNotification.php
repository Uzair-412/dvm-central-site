<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CronjobPushNotification extends Model
{
    use HasFactory;

    public function getUserIdsAttribute($value)
    {
        return explode(',', $value);
    }

    public function users()
    {
        return User::whereIn('id', $this->user_ids);
    }
}
