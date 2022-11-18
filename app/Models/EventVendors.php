<?php

namespace App\Models;

use App\Models\Events;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class EventVendors extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'event_vendors';

    protected $guarded = []; 

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    public function socials()
    {
        return $this->belongsToMany('App\Models\SocialNetwork', 'ev_social', 'ev_id', 'sm_id')->withPivot('link');
    }

    public function files()
    {
        return $this->hasMany('App\Models\EvFile', 'ev_id');
    }

    public static function validate($event_id, $vendor_id, $access_code)
    {
        $vendor_event = self::where(['event_id' => $event_id, 'vendor_id' => $vendor_id, 'access_code' => $access_code])->first();
        if($vendor_event)
        {
            self::setVendorSession($vendor_event);
            return $vendor_event;
        }
        else return false;
    }

    public static function validateHash($hash)
    {
        $vendor_event = self::where(['access_hash' => $hash])->first();
        if($vendor_event)
        {
            $link = self::getLink($vendor_event, null, 'edit');
            self::setVendorSession($vendor_event, $link);
            return $link;
        }
        return false;
    }

    public static function setVendorSession($vendor_event, $link = null)
    {
        if(!$link)
        {
            $link = self::getLink($vendor_event, null, 'edit');
        }

        $ses_exhibitor = ['vendor_event' => $vendor_event, 'link' => $link];
        session()->put('ses_exhibitor', $ses_exhibitor);
    }

    public static function getLink($event_vendor, $event = null, $mode = 'list')
    {
        if(!$event)
        {
            $event = Events::find($event_vendor->event_id);
        }

        $link = '/events/'.$event->slug.'/exhibitors/'.$event_vendor->id.'-'.Str::slug($event_vendor->display_name);
        if($mode == 'edit')
            $link .= '/edit';

        return $link;    
    }

    public static function getExhibitorSocialsById($id)
    {
        $ev = self::find($id);
        return $ev->socials;
    }

    public static function getExhibitorIntroById($id)
    {
        $ev = self::find($id);
        return $ev->company_intro;
    }

    
    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }

    public static function getUserId($id)
    {
        
    }
}