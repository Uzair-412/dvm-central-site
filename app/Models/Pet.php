<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    // use HasFactory;

    protected $table = 'pets';

    protected $primaryKey = 'id';

    protected $hidden = ['updated_at'];

    public function images()
    {
        return $this->hasMany('App\Models\PetsImage');
    }
}
