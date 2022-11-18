<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->isAdmin();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        switch($this->method())
        {
            case 'POST':
                {
                    return [
                        'first_name' => 'required|min:3',
                        'last_name' => 'required|min:3',
                        'email' => 'required|email|unique:users',
                        'password' => 'required|min:6|confirmed',
                        'confirmed' => 'required',
                        'active' => 'required'
                    ];
                }
            case 'PUT':
            case 'PATCH':
                {
                    return [
                        'first_name' => 'required|min:3',
                        'last_name' => 'required|min:3',
                        'email' => 'required|email|',
                        'password' => 'nullable|min:6|confirmed',
                        'confirmed' => 'required',
                        'active' => 'required'
                    ];
                }
        }
    }
}
