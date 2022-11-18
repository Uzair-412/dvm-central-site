<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Block extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function blockCategories()
    {
        return $this->hasMany(BlockCategories::class, 'block_id')->inRandomOrder();
    }
}
