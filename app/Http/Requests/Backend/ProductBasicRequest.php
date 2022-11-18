<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class ProductBasicRequest extends FormRequest
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
        switch($this->method())
        {
            case 'POST':
                {
                    return [
                        'category' => 'required',
                        'name' => 'required',
                        'level' => 'required',
                        'slug' => 'required|unique:products|min:3',
                        'sku' => 'required|unique:products|min:3'
                    ];
                }
            case 'PUT':
            case 'PATCH':
                {
                    return [
                        'category' => 'required',
                        'name' => 'required',
                        'level' => 'required',
                        'slug' => 'sometimes|required|unique:products,slug,'. $this->get('id') .'|min:3',
                        'sku' => 'required|unique:products,sku,'. $this->get('id') .'|min:3'
                    ];
                }
        }
    }
}
