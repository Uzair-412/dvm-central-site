<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class BusinessTypeRequest extends FormRequest
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
                        'name' => 'required|min:3',
                        'slug' => 'required|unique:business_type|min:3',
                        'status' => 'required'
                    ];
                }
            case 'PUT':
            case 'PATCH':
                {
                    return [
                        'name' => 'required|min:3',
                        'slug' => 'sometimes|required|unique:business_type,slug,'. $this->get('id') .'|min:3',
                        'status' => 'required'
                    ];
                }
        }
    }
}
