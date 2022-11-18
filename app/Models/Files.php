<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Files extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'files';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 'title','video_type', 'name', 'type', 'video_image','video_thumbnail', 'fileable_id', 'fileable_type' ];

    /**
     * Get the owning commentable model.
     */

    public function product()
    {
        return $this->morphTo('App\Models\Product', 'fileable');
    }
}
