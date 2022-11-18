<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FormSubmission extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'form_submissions';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 'type', 'email', 'first_name', 'last_name', 'company', 'phone', 'address', 'city', 'zip', 'comments', 'custom_fields', 'viewed' ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [ 'created_at', 'updated_at' ];

    /**
     * The attribute types will be define here, it's required to return data to API in correct types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'int',
    ];
}
