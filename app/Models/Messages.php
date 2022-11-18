<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Messages extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'messages';

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
    protected $guarded = [];

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

    public static $subjects1 = [
        1 => 'Take 10% Off + Free Ground Shipping on Your Pending Order at GerVetUSA',
        2 => 'Get Your 10% Discount Coupon and Avail Free Ground Shipping on Your Pending Order at GerVetUSA',
        3 => 'Last Chance to Take Advantage of 10% Discount + Free Ground Shipping on Your Pending Order at GerVetUSA',
    ];

    public static $subjects2 = [
        1 => 'Take 10% Off on Your Pending Order at GerVetUSA',
        2 => 'Get Your 10% Discount Coupon on Your Pending Order at GerVetUSA',
        3 => 'Last Chance to Take Advantage of 10% Discount on Your Pending Order at GerVetUSA',
    ];

}