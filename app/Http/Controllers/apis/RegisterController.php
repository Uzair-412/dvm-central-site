<?php

namespace App\Http\Controllers\apis;

use App\Domains\Auth\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Auth\Events\Registered;
use App\Domains\Auth\Services\UserService;
/**
 * Class RegisterController.
 */
class RegisterController
{
    /**
     * @var UserService
     */
    protected $userService;

    /**
     * RegisterController constructor.
     *
     * @param  UserService  $userService
     */
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function register(Request $request)
    {
        try {
            $rules = [
                'name' => 'required',
                'email' => 'unique:users|required',
                'password' => 'required|min:8',
                'confirm_password' => 'required',
            ];

            $input = $request->only(
                'name',
                'email',
                'password',
                'confirm_password'
            );
            $validator = Validator::make($input, $rules);

            if ($validator->fails()) {
                return response()->json(['error' => $validator->messages()], 200);
            }

            if ($request->confirm_password == $request->password) {
                event(new Registered($user = $this->create($request->all())));
                // $response['token'] = $user->createToken('VetandTechToken')->accessToken;
                // $response['user_data'] = auth()->user();
                return response()->json(['success' => true, 'message' => 'We have sent you verification email. Please check your mailbox and verify before login and proceeding further!'],200);
            } 
            else {
                return response()->json(
                    ['error' =>'Password does not matched with confirmed password',],200);
            }
        } catch (\Throwable $th) {
            return response()->json(
                ['error' =>$th->getMessage(),],200);
        }
    }

    protected function create(array $data)
    {
        abort_unless(config('boilerplate.access.user.registration'), 404);

        return $this->userService->registerUser($data);
    }
}