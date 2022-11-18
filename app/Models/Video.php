<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'videos';

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

    public static function boot()
    {
        parent::boot();

        self::created(function($model){
            self::getImageLinks($model);
        });

        self::updated(function($model){
            self::getImageLinks($model);
        });
    }

    public static function getImageLinks($model)
    {
        $video_id = $model->video_id;
        if(strtolower($model->source) == 'youtube')
        {
            $data['thumbnail_url'] = 'https://img.youtube.com/vi/'.$video_id.'/default.jpg';
            $data['large_url'] = 'https://img.youtube.com/vi/'.$video_id.'/maxresdefault.jpg';
        }
        else
        {
            $cnt = json_decode(file_get_contents('http://vimeo.com/api/v2/video/'. $video_id .'.json'));
            $data['thumbnail_url'] = $cnt[0]->thumbnail_small;
            $data['large_url'] = $cnt[0]->thumbnail_large;
        }

        self::find($model->id)->update($data);
    }
}
