<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpeakerWebinar extends Model
{
    use HasFactory;

     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'speaker_webinar';

    

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
    protected $fillable = [ 'speaker_id', 'webinar_id'];

    public function webinar()
    {
        return $this->belongsToMany(Webinar::class);
    }

    public function speaker()
    {
        return $this->hasMany(Speaker::class, 'speaker_webinar');
    }
}
