<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HelpCentreChat extends Model
{
    use HasFactory;

    protected $primaryKey = 'helpchat_id';

    public $timestamps = false;
}
