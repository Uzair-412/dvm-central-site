<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventsCategories extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'events_categories';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    //protected $guarded = [];

    public static function getExhibitorCategories($categories)
    {
        $data = null;

        if(trim($categories) != null)
        {
            $cats = explode(',', $categories);
            $data = self::whereIn('id', $cats)->get();
        }

        return $data;
    }

    public static function getExhibitorCategoriesById($id) // id refers to event_vendors table id
    {
        $exhibitor = EventVendors::select('categories')->where('id', $id)->first();
        return self::getExhibitorCategories($exhibitor->categories);
    }

}
