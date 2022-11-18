<?php

namespace App\Models;

use App\Mail\Backend\Customer\SendWelcome;
use App\Models\Auth\User;
use App\Notifications\Frontend\Auth\UserNeedsConfirmation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Order extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'orders';

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

    public static $statuses = [
        1 => 'Pending for Processing',
        2 => 'Processing',
        3 => 'Pending Payment',
        4 => 'Suspected Fraud',
        5 => 'Payment Review',
        6 => 'On Hold',
        7 => 'Complete',
        8 => 'Closed',
        9 => 'Canceled'
    ];

    public static $statuses_css = [
        1 => 'info',
        2 => 'success',
        3 => 'info',
        4 => 'danger',
        5 => 'alert',
        6 => 'alert',
        7 => 'success',
        8 => 'secondary',
        9 => 'danger'
    ];

    public static $statuses_fa = [
        'info' => 'info-circle',
        'success' => 'check-circle',
        'info' => 'info-circle',
        'danger' => 'exclamation-circle',
        'alert' => 'exclamation-circle',
        'alert' => 'exclamation-circle',
        'success' => 'check-circle',
        'secondary' => 'info-circle',
        'danger' => 'exclamation-circle'
    ];

    protected $hidden = [ 'created_at', 'updated_at' ];

    public function items()
    {
        return $this->hasMany('App\Models\OrderItems');
    }

    public function vendor_items()
    {
        return $this->hasMany('App\Models\OrderItems', 'vendor_order_id');
    }

    public static function getOrders(array $filter = [])
    {
        $query = Order::where('id', '!=', 0);

        if(isset($filter['customer_id']))
        {
            $query->where(['customer_id' => $filter['customer_id']]);
        }

        if(isset($filter['order_status']))
        {
            $query->where(['order_status' => $filter['order_status']]);
        }

        if(isset($filter['email']))
        {
            $query->where('email', 'like', '%'.$filter['email'].'%');
        }

        if(isset($filter['transaction_id']))
        {
            $query->where('transaction_id', $filter['transaction_id']);
        }

        if(isset($filter['ups_tracking_id']))
        {
            $query->where('ups_tracking_id', $filter['ups_tracking_id']);
        }

        if(isset($filter['name']))
        {
            $query->where(function($query) use ($filter) {
                $query->orWhere('first_name', 'like', '%'. $filter['name'] .'%');
                $query->orWhere('last_name', 'like', '%'. $filter['name'] .'%');
            });
        }

        if(isset($filter['address']))
        {
            $query->where(function($query) use ($filter) {
                $query->orWhere('address1', 'like', '%'. $filter['address'] .'%');
                $query->orWhere('address2', 'like', '%'. $filter['address'] .'%');
                $query->orWhere('city', 'like', '%'. $filter['address'] .'%');
                $query->orWhere('zip_code', 'like', '%'. $filter['address'] .'%');
            });
        }

        if(!isset($filter['limit']))
        {
            $filter['limit'] = 25;
        }

        if(isset($filter['order_by']))
        {
            $order = isset($filter['order']) ? $filter['order'] : 'asc';
            $query->orderBy($filter['order_by'], $order);
        }
        else
        {
            $query->orderBy('id', 'desc');
        }

        //$result_all = $query->get();
        $result = $query->paginate($filter['limit']);
        //$result->products_all = $result_all;

        return $result;
    }

    public static function trackOrder($term)
    {
        $order = Order::where('id', $term)->orWhere('ups_tracking_id', $term)->first();

        if($order)
            $order->notifications = Notification::where('order_id', $order->id)->where('type', 'order')->get();

        return $order;
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'id');
    }

    public function vendororders()
    {
        return $this->hasMany(Order::class, 'parent_id', 'id');
    }

    public function vendor()
    {
        return $this->belongsTo(Vendor::class, 'vendor_id', 'id');
    }

    // public function vendor_items($order_id)
    // {
    //     $orders = OrderItems::where('vendor_order_id', $order_id)->get();
    //     return $orders;
    // }
}
