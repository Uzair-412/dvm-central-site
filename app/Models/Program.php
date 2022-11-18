<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'programs';

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

    public function institute()
    {
        return $this->belongsTo('App\Models\Programs\Institute')->with(['country', 'state']);
    }

    public function type()
    {
        return $this->belongsTo('App\Models\Programs\Types');
    }

    public function director()
    {
        return $this->belongsTo('App\Models\Programs\Director');
    }

    public function accreditation_status()
    {
        return $this->belongsTo('App\Models\Programs\AccreditationStatus');
    }

    public static function getProgramsFilter(array $filter=[])
    {
        $query = Program::with(['institute','director','accreditation_status','type'])->where('status', 'Y');
        if(count($filter) > 0)
        {
            if(isset($filter['types']))
            {
                $query->where(function ($q) use ($filter) {
                    foreach($filter['types'] as $type)
                    {
                        if($type!=false)
                        {
                            $q->orWhere('type_id', $type);
                        }
                    }
                });
            }

            if (isset($filter['states']) || isset($filter['countries']) || isset($filter['cities']) )
            {
                $query->whereHas('institute', function($q) use($filter) {
                    if (isset($filter['states']))
                    {
                        $q->where(function ($subQ) use ($filter) {
                            foreach ($filter['states'] as $state) {
                                if($state!=false)
                                {
                                    $subQ->orWhere('state_id', (int)$state);
                                }
                            }
                        });
                    }

                    if (isset($filter['countries']))
                    {
                        $q->where( function ($subQ) use ($filter) {
                            foreach ($filter['countries'] as $country) {
                                $subQ->orWhere('country_id', (int)$country);
                            }
                        });
                    }

                    if (isset($filter['cities'])) {
                        $q->where(function ($subQ) use ($filter) {
                            foreach ($filter['cities'] as $city) {
                                if($city!=false)
                                {
                                    $subQ->orWhere('city', $city);
                                }
                            }
                        });
                    }
                });
            }
        }
        return $query->orderBy('id', 'DESC')->paginate(12);
    }
}
