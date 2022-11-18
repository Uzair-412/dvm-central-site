<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'fields';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    //protected $guarded = [];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */


    public function field_sets()
    {
        return $this->belongsTo(FieldSet::class, 'field_set_id', 'id');
    }
}
