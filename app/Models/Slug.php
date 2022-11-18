<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slug extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'slugs';

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
    protected $fillable = [ 'slug', 'sluggable_id', 'sluggable_type' ];

    /**
     * Get the owning commentable model.
     */
    /*public function sluggable()
    {
        return $this->morphTo();
    }*/

    public function category()
    {
        return $this->morphTo('App\Models\Category', 'sluggable');
    }

    // public function vendor()
    // {
    //     return $this->morphTo('App\Models\Vendor', 'sluggable');
    // }

    public function checkIfExists($slug, $sluggable_id = null, $sluggable_type = null)
    {
        if(is_null($sluggable_id))
        {
            $check = self::where('slug' , '=', $slug)->first();
            if($check == null)
                return false;
            else
                return true;
        }
        else
        {
            $check = self::where([['slug' , '=', $slug], ['sluggable_id', '!=', $sluggable_id], ['sluggable_type', '!=', addslashes($sluggable_type)]])
                ->first();
            if($check == null)
                return false;
            else
                return true;
        }

    }

    //
    // hello-this-test
    //
    //
    public function fullSlug($slug, $type, $parent_id, $business_type = null)
    {
        $full_slug = $slug;
        if($type == 'category')
        {
            if($parent_id != 0)
            {
                $category = Category::find($parent_id);
                $full_slug = $category->slug .'/'. $full_slug;
            }
            else if($business_type)
            {
                $bt = BusinessType::find($business_type);
                $full_slug = $bt->slug.'/'.$full_slug;
            }
        }
        elseif($type == 'vendor')
        {
            if($parent_id != 0)
            {
                $flag = true;
                while($flag)
                {
                    $businessType = BusinessType::find($parent_id);
                    $full_slug = $businessType->slug .'/'. $full_slug;
                    $parent_id = $businessType->parent_id;
                    if($parent_id == 0) $flag = false;
                }
            }
        }

        return $full_slug;
    }
}
