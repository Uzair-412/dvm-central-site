<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Auth\User;
use Illuminate\Support\Facades\Hash;

class Attendee extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'attendees';

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
    protected $fillable = [ 'user','job_title', 'image' ,'institute', 'profile', 'profession', 'classification', 'specialty', 'employer_type', 'practice_role', 'vets_in_practice', 'techs_in_practice',
                            'practice_revenue', 'practices_in_group', 'credentials', 'website', 'phone', 'mobile', 'address', 'city', 'state', 'zip', 'country', 'sm_facebook', 'sm_linkedin', 'sm_twitter', 'sm_instagram',
                            'sm_pinterest', 'sm_youtube', 'sm_vimeo', 'status'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [ 'created_at', 'updated_at' ];

    /**
     * The attribute types will be define here, it's required to return data to API in correct types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'int',
    ];

    public static function validate($user_id, $access_code)
    {
        $attendee_user = self::where(['user' => $user_id])->first();
        if($attendee_user){
            $user = User::where('id', $user_id)->first();
            if(Hash::check($access_code, $user->password))
            {
                self::setAttendeeSession($attendee_user);
                return $attendee_user;
            }
            else return false;
        }
        else return false;
    }

    public static function setAttendeeSession($attendee_user)
    {
        $ses_attendee = ['attendee_user' => $attendee_user];
        session()->put('ses_attendee', $ses_attendee);
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'user', 'id');
    }
}
