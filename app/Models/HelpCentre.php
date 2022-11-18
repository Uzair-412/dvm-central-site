<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HelpCentre extends Model
{
    use HasFactory;

    protected $primaryKey = 'helpc_id';

    public $timestamps = false;
}
