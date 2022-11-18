<?php

namespace App\Models;

use App\Models\Auth\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatMessage extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'chat_messages';


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
    protected $fillable = [ 'chat_id','user_id','resp_user_id','deleted_from_receiver','deleted_from_sender','is_seen','message', 'message_type'];

    public function vendor() {
        return $this->belongsTo(Vendor::class, 'resp_user_id','user');
    }

    public function user() {
        return $this->belongsTo(User::class, 'resp_user_id');
    }
    public function customer() {
        return $this->belongsTo(Customer::class, 'user_id');
    }   
}
