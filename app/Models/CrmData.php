<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CrmData extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'crm_data';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    protected $guarded = [];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    //protected $fillable = [];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */

    /**
     * The attribute types will be define here, it's required to return data to API in correct types.
     *
     * @var array
     */



    public static function getRecords(array $filter = [])
    {
        $query = self::where('data_type', '=', 'dentist');

        if(!isset($filter['limit']))
        {
            $filter['limit'] = 25;
        }

        $query->orderBy('id', 'asc');

        $result = $query->paginate($filter['limit']);

        return $result;
    }
}
