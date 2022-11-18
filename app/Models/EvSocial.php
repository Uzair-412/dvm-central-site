<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EvSocial extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'ev_social';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    protected $guarded = [];
}
