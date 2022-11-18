<?php

namespace App\Models;

use App\Models\Auth\User;
use Auth;
use DB;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'vendors';

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
    protected $fillable = [ 'business_type','user','contact_name','email','address','city', 'state', 'zip_code', 'country_id', 'phone', 'name', 'slug', 'logo', 'header_image', 'tax_percentage', 'percentage_from_sales', 'publishable_key', 'secret_key', 'client_account_id', 'activated_account', 'blocked_account', 'virtual_booth_url', 'status' ];

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

    public function slugs()
    {
        return $this->morphMany('App\Models\Slug', 'sluggable');
    }

    public static function get_business_type($vendor_id) // Vendor ID is basically ID of users table, Users with type of Vendor will have link with Vendors and Business Types
    {
        $vendor = self::where('user', $vendor_id)->first();
        if($vendor)
            $business_type = $vendor->business_type;
        else
            $business_type = 0;

        return $business_type;
    }

    public static function get_store_name_slug($vendor_id) // Vendor ID is basically ID of users table, Users with type of Vendor will have link with Vendors and Business Types
    {
        $vendor = self::where('id', $vendor_id)->first();
        if($vendor)
        {
            $name = $vendor->name;
            $slug = $vendor->slug;
            $store = ['name' => $name, 'slug' => $slug];
        }
        else
            $store = null;

        return $store;
    }
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function get_vendor_orders()
    {
        return $this->hasMany(Order::class);
    }
    
    public static function get_vendor($id)
    {
        return self::find($id);
    }

    public function business_types()
    {
        return $this->belongsTo(BusinessType::class, 'business_type', 'id');
    }
    public function getVendorCountry()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

    public function vendor_user()
    {
        return $this->belongsTo(User::class, 'user');
    }
    
    public function get_company_name($vendor_id){
        $company = self::select('name')->where('id', $vendor_id)->first();
        return $company['name'];
    }
    public function getVendorJobs(){
        return $this->belongsTo(VendorJob::class, 'user');
    }

    public static function vendor_rating($vendor_id)
    {
        $rating = Review::whereHas('product', function ($query) use($vendor_id) {
            $query->where('vendor_id','=',$vendor_id);
        })->where([
            ['rating','!=',0],
            ['status','=','Y']
        ])->select(DB::raw('SUM(rating)/COUNT(*) as Rating'))->first();
        return $rating->Rating;
    }

    public function is_follow()
    {
        return $this->hasOne(Follow::class, 'vendor_id')->where('user_id', Auth::user()->id);
    }
}