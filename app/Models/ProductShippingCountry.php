<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductShippingCountry extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'product_shipping_country';

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
    public $timestamps = false;

    /**
     * The attribute types will be define here, it's required to return data to API in correct types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'int',
    ];

    public function country()
    {
        return $this->belongsTo(Country::class, 'shipping_country_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
