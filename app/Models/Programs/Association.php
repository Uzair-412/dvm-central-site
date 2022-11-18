<?php

namespace App\Models\Programs;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Association extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'associations';

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

    public function country()
    {
        return $this->belongsTo('App\Models\Country');
    }

    public function state()
    {
        return $this->belongsTo('App\Models\State');
    }

    public static function getAssociationFilter(array $filter = [])
    {
        $query = Association::with(['country','state'])->where('status', 'Y');
        if (count($filter) > 0) {
            if (
                isset($filter['states']) ||
                isset($filter['countries']) ||
                isset($filter['cities'])
            ) {
                $query->where(function ($q) use ($filter) {
                    if (isset($filter['states'])) {
                        $q->where(function ($subQ) use ($filter) {
                            foreach ($filter['states'] as $state) {
                                if ($state != false) {
                                    $subQ->orWhere('state_id', (int) $state);
                                }
                            }
                        });
                    }

                    if (isset($filter['countries'])) {
                        $q->where(function ($subQ) use ($filter) {
                            foreach ($filter['countries'] as $country) {
                                if ($country != false) {
                                $subQ->orWhere('country_id', (int) $country);
                                }
                            }
                        });
                    }

                    if (isset($filter['cities'])) {
                        $q->where(function ($subQ) use ($filter) {
                            foreach ($filter['cities'] as $city) {
                                if ($city != false) {
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
