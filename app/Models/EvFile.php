<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EvFile extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'ev_files';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    protected $guarded = [];
}
