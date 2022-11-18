<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class MicroSites extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'micro_sites';

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

    public static function getName($id)
    {
        $site = self::find($id);
        return $site->name . ' ('. $site->domain .')';
    }

    public static function getProductsCount($id)
    {
        return MicroSitesProducts::where('site_id', $id)->count();
    }

    public function products($id)
    {
        return $this->belongsToMany(Product::class, 'micro_sites_products', 'product_id', 'site_id')->withPivot(['id','product_id','pos']);
    }

    public static function getProducts($id, $filter = [])
    {
        $where['micro_sites_products.site_id'] = $id;

        if(isset($filter['featured']) && $filter['featured'] == 'Y')
            $where['micro_sites_products.featured'] = 'Y';

        return DB::table('products')
            ->join('micro_sites_products', 'products.id', '=', 'micro_sites_products.product_id')
            ->where($where)
            ->select('products.*', 'micro_sites_products.id as ms_id', 'micro_sites_products.pos', 'micro_sites_products.featured')
            ->orderBy('micro_sites_products.pos', 'asc')
            ->get();
        //return MicroSitesProducts::where('site_id', $id)->orderBy('pos')->get();
    }

}