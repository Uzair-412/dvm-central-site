<?php

namespace App\Http\Controllers\apis\Customer;

use App\Http\Controllers\Controller;
use App\Http\Livewire\Frontend\Dashboard\WishList;
use App\Models\Customer;
use App\Models\JobWishlist;
use App\Models\Wishlist as ModelsWishlist;
use App\Repositories\Frontend\Auth\UserRepository;
use Hash;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * @var UserRepository
     */
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function getProfile($customer_id)
    {
        $user = Customer::where('id',$customer_id)->first();
        $user['followings'] = $user->following();
        $user['product_wishlist'] = ModelsWishlist::where('customer_id',$customer_id)->count();
        $user['job_wishlist'] = JobWishlist::where('user_id',$customer_id)->count();
        return response()->json($user, 200);
    }

    public function update(Request $request)
    {
        $output = $this->userRepository->update(
            $request->customer_id,
            $request->only('name', 'email', 'avatar_type'),
            null
        );

        $user = Customer::find($request->customer_id);
        
        if (isset($_FILES['avatar_location'])) {
            $ext = explode('.', $_FILES['avatar_location']['name']);
            $ext = end($ext);

            $imagePath = $user->avatar_type. '/' . str_replace(' ', '_', $request->name) .'-'.time(). '-' . $request->customer_id . '.' . $ext;
            $path = dirname(getcwd()) . '/storage/app/public/' . $imagePath; // uploaded image path
            

            if($user->avatar_location)
            {
                $currentImage = dirname(getcwd()) . '/storage/app/public/' . $user->avatar_location; // if current image exist then remove file
                if (is_file($currentImage)) {
                    unlink($currentImage);
                }
            }

            $imageDir = dirname(getcwd()) . '/storage/app/public/'.$user->avatar_type;
            if(!is_dir($imageDir))
            {
                mkdir($imageDir);
            }
            move_uploaded_file($_FILES['avatar_location']['tmp_name'], $path); // image uploading
            $user->avatar_location = $imagePath;
        }
        $user->save();
        if (is_array($output) && $output['email_changed']) {
            return response()->json(['message' => __('You must confirm your new e-mail address before you can go any further.')],200);
        }

        return response()->json(['message' => __('Profile successfully updated.')], 200);
    }

    public function update_password(Request $request)
    {
        $user = Customer::find($request->input('customer_id'));
        if(Hash::check($request->input('current_password'),$user->password) && $request->input('current_password')!=$request->input('password'))
        {
            if($request->input('password') == $request->input('password_confirmation'))
            {
                $user->password = Hash::make($request->input('password'));
                $user->save();
                return response()->json(['message' => __('Password changed successfully')], 200);
            }
            else
            {
                return response()->json(['error' => __('New password and confirm new password must be matched!')], 200);
            }
        }
        else
        {
            if($request->input('current_password')==$request->input('password'))
            {
                return response()->json(['error' => __('Your password will be different then current password!')], 200);
            }
            return response()->json(['error' => __('Your current password is invalid!')], 200);
        }
    }
}
