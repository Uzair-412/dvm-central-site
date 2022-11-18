<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FieldSet extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'field_sets';

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


    public function business_types()
    {
        return $this->belongsTo(BusinessType::class, 'business_type', 'id');
    }
}
