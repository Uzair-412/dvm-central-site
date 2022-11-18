<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
                        'show_in_menu' => 'required',
                        'slug' => 'required|unique:categories|min:3',
                        'display_mode' => 'required',
                        'status' => 'required'
                    ];
                }
            case 'PUT':
            case 'PATCH':
                {
                    return [
                        'name' => 'required|min:3',
                        'show_in_menu' => 'required',
                        'slug' => 'sometimes|required|unique:categories,slug,'. $this->get('id') .'|min:3',
                        'display_mode' => 'required',
                        'status' => 'required'
                    ];
                }
        }
    }
}
