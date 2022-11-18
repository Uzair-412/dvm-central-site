<?php

namespace App\Domains\Auth\Http\Requests\Frontend\Auth;

use App\Domains\Auth\Rules\UnusedPassword;
use Illuminate\Foundation\Http\FormRequest;
use LangleyFoxall\LaravelNISTPasswordRules\PasswordRules;

/**
 * Class UpdatePasswordRequest.
 */
class UpdatePasswordRequest extends FormRequest
{

    protected $redirect = "/dashboard/profile?section=password";
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if(auth()->user()->password_changed_at == null)
        {
            return [
                'password' => array_merge(
                    [
                        'max:100',
                        new UnusedPassword($this->user()),
                    ],
                    PasswordRules::changePassword(
                        $this->email, null
                    )
                ),
            ];  
        }
        return [
            'current_password' => ['required', 'max:100'],
            'password' => array_merge(
                [
                    'max:100',
                    new UnusedPassword($this->user()),
                ],
                PasswordRules::changePassword(
                    $this->email,
                    config('boilerplate.access.user.password_history') ? 'current_password' : null
                )
            ),
        ];
    }
}
