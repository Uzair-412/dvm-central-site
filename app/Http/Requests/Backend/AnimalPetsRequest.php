<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class AnimalPetsRequest extends FormRequest
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
                        'position' => 'required',
                        'slug' => 'required|unique:animal_pets,slug|min:3'
                    ];
                }
            case 'PUT':
            case 'PATCH':
                {
                    return [
                        'name' => 'required|min:3',
                        'position' => 'required',
                        'slug' => 'required|unique:animal_pets,slug,'. $this->get('id') .'|min:3'
                    ];
                }
        }
    }
}
