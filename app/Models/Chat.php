<?php

namespace App\Models;

use App\Models\Attendee;
use App\Models\Auth\User;
use App\Models\ChatMessage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Chat extends Model
{
    use HasFactory;

        /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'chats';


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
    protected $fillable = [ 'channel','user_ids', 'last_message', 'sender_id', 'status'];

    public static function getHash(Array $users = [])
    {
        if(count($users) > 1)
        {
            sort($users);
            $users = implode(',', $users);
            return md5($users);
        }

        return null;
    }

    public static function getIdByHash($channel)
    {
        $chat = self::where('channel', $channel)->first();
        return $chat->id;
    }

    public static function getMessages($channel)
    {
        $chat = self::select('id')->where('channel', $channel)->first();        

        if($chat)
        {
            $messages = ChatMessage::where('chat_id', $chat->id)->get();
            return $messages;
        }
        
        return null;
    }

    public static function getChats($user_id)
    {
        return self::whereRaw("FIND_IN_SET(". $user_id .", user_ids)")->orderBy('updated_at', 'desc')->get();
    }

    public static function getChatSender($user_ids)
    {
        $logged_in_user = session()->get('ses_user_id');
        
        if(!is_array($user_ids))
            $user_ids = explode(',', $user_ids);

        $sender = array_values(array_diff($user_ids, [$logged_in_user]));//(Int)str_replace(',', '', str_replace($logged_in_user, '', $user_ids));
        if(is_array($sender) && count($sender) > 0)
        {
            $sender = $sender[0];
            $sender = User::find($sender);
            if($sender)
            {
                $avatar = '/static/img/users/avatar.png';

                if($sender->type == 'vendor')
                {
                    $logo = Vendor::select('logo')->where('user', $sender->id)->first();
                    $avatar = '/up_data/vendors/logo/'.$logo->logo;
                }
                else 
                {
                    $attendee = Attendee::where('user', $sender->id)->first();
                    if($attendee)
                    {
                        $avatar = '/up_data/attendees/images/'.$attendee->image;
                    }
                }
                
                $sender->avatar = $avatar;
                
                return $sender;
            }
        }   
    }

    public function chatmessages()
    {
        return $this->hasOne(ChatMessage::class, 'chat_id')->orderBy('id', 'DESC');
    }
    
}
