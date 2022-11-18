<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Show extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'shows';

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
    protected $fillable = [ 'association_id', 'name', 'link', 'booth', 'location', 'dates', 'start_date', 'end_date', 'details_link', 'details', 'image', 'image_thumbnail', 'position', 'status' ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */

    public static function tradeShowsBar()
    {
        $monthsArray = [
            '01' => 'January',
            '02' => 'February',
            '03' => 'March',
            '04' => 'April',
            '05' => 'May',
            '06' => 'June',
            '07' => 'July',
            '08' => 'August',
            '09' => 'September',
            '10' => 'October',
            '11' => 'November',
            '12' => 'December'
        ];

        $years = self::selectRaw(\DB::raw('MAX(YEAR(start_date)) AS mx_year, min(YEAR(start_date)) AS mn_year'))->where('status', 'Y')->first();

        $start_year = $years['mx_year'];
        $end_year = $years['mn_year'];

        $html = '';
        for($i = $start_year ; $i >= $end_year ; $i--)
        {
            $html .= '<div class="mb-3"><h5 class="w-100 filter-heading">' . $i . '</h5>';
            $html .= '<div class="filter-section">';
            foreach($monthsArray as $month => $name)
            {
                $css = '';
                if($month != 12)
                    $css = 'border-bottom';

                $count = self::select(\DB::raw('COUNT(id) AS tot'))->whereYear('start_date', $i)->whereMonth('start_date', $month)->first();

                if($count->tot > 0)
                {
                    $sl = '';
                    if(request()->get('year') == $i && request()->get('month') == $month)
                        $sl = 'font-weight-bold';

                    $html .= '<div class="'. $css .' pb-2 pt-2">
                                            &raquo; <a class="'. $sl .'" href="/trade-shows/?year='.$i.'&month='.$month.'">'. ucfirst(strtolower($name)) .' ('. $count->tot .')</a>
                                        </div>';
                }
            }
            $html .= '</div></div>';
        }

        return $html;
    }
}
