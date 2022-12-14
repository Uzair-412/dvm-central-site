<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class EnterToWinRequest extends FormRequest
{
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
        return [
        'email' => 'required|email',
        'first_name' => 'required|min:3',
        'last_name' => 'required|min:3',
        'company' => 'required',
        'phone' => 'required',
        'address' => 'required',
        'city' => 'required',
        'state' => 'required',
        'zip' => 'required',
        'role' => 'required'
        ];
    }
}
