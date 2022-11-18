<?php

namespace App\Models;

use App\Mail\Backend\Customer\SendWelcome;
use App\Models\Auth\User;
use App\Notifications\Frontend\Auth\UserNeedsConfirmation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Redirect extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'redirects';

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

    public static $type = [
        'please select type' => 'Please Select Type',
        'product' => 'Product',
        'category' => 'Category',
    ];

    public static $mode = [
        'please select mode' => 'Please Select Mode',
        'internal' => 'Internal',
        'external' => 'External',
    ];

    public static function getRedirects(array $filter = [])
    {
        $query = Redirect::where('id', '!=', '');

        if(isset($filter['request_url']))
        {
            $query->where('request_url', 'like', '%'.$filter['request_url'].'%');
        }

        if(isset($filter['target_url']))
        {
            $query->where('target_url', 'like', '%'.$filter['target_url'].'%');
        }

        if(isset($filter['type']))
        {
            $query->where(['type' => $filter['type']]);
        }

        if(isset($filter['mode']))
        {
            $query->where(['mode' => $filter['mode']]);
        }

        if(!isset($filter['limit']))
        {
            $filter['limit'] = 10;
        }

        if(isset($filter['order_by']))
        {
            if($filter['order_by'] == 'rand')
            {
                $query->inRandomOrder();
            }
            else
            {
                $order = isset($filter['order']) ? $filter['order'] : 'asc';
                $query->orderBy($filter['order_by'], $order);
            }
        }
        else
        {
            $query->orderBy('id', 'asc');
            $query->orderBy('id', 'desc');
        }

        $result = $query->paginate($filter['limit']);

        return $result;
    }
}
