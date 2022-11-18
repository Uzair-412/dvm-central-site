<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EvProduct extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'ev_products';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    protected $guarded = [];
}
