<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdditionalInfo extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'additional_info';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    protected $guarded = [];

    public $timestamps = false;
}
