<?php

namespace App\Models;

use App\Mail\Backend\Customer\SendWelcome;
use App\Models\Auth\User;
use App\Notifications\Frontend\Auth\UserNeedsConfirmation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Invoice extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'invoices';

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

    public static $ref_types = [
        'general'   => 'General',
        'order'     => 'Order'
    ];

    public static $late_fee_types = [
        'none'   => 'Do Not Charge Late Fee',
        'flat'   => 'Flat Amount',
        'percentage'   => 'Percentage'
    ];

    public static function getInvoices(array $filter = [])
    {
        $query = Invoice::where('id', '!=', '');

        if(isset($filter['customer_id']))
        {
            $query->where(['customer_id' => $filter['customer_id']]);
        }

        if(isset($filter['status']))
        {
            $query->where(['status' => $filter['status']]);
        }

        if(isset($filter['title']))
        {
            $query->where('title', 'like', '%'.$filter['title'].'%');
        }

        if(isset($filter['']))
        {
            $query->where('invoice_number', 'like', '%'.$filter['invoice_number'].'%');
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
}
