<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MobileUserSettings extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'mobile_user_settings';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    protected $fillable = [
        'customer_id',
        'push_notifications',
        'order_updates',
        'listing_updates',
        'newsletter',
        'personalized_content',
        'privacy_activities',
        'hide_my_likes',
        'invisible_to_contacts',
    ];

}
