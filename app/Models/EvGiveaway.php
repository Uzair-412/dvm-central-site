<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EvGiveaway extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'ev_giveaways';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    protected $guarded = [];
}
