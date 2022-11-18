<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PushNotification extends Model
{
    use HasFactory;

    public static $devices = [
        "Web" => "Web",
        "Android" => "Android",
        "Apple" => "Apple"
    ];
}
