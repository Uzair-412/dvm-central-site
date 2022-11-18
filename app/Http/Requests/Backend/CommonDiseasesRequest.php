<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class CommonDiseasesRequest extends FormRequest
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
                        'animal_pet_id' => 'required|',
                        'slug' => 'required|unique:common_diseases,slug|min:3'
                    ];
                }
            case 'PUT':
            case 'PATCH':
                {
                    return [
                        'name' => 'required|min:3',
                        'animal_pet_id' => 'required|',
                        'slug' => 'required|unique:common_diseases,slug,'. $this->get('id') .'|min:3'
                    ];
                }
        }
    }
}
