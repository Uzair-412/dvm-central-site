<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BusinessType extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'business_type';

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

    public static function getLeftMenuBusinessTypes(){
        return self::where(['status' => 'Y', 'show_in_main_menu' => 'Y'])->orderBy('display_position', 'ASC')->orderBy('name', 'ASC')->get();
    }

    public function slugs()
    {
        return $this->morphMany('App\Models\Slug', 'sluggable');
    }

    public static function getBusinessType($id)
    {
        return self::findOrFail($id);
    }
}
