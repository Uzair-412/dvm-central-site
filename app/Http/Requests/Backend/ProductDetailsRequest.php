<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class ProductDetailsRequest extends FormRequest
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
            'price_catalog' => 'sometimes|numeric',
            'price_discounted' => 'nullable|numeric',
            'pdf_link' => 'nullable|url',
            'video_link' => 'nullable|url',
            'price_discounted_start' => 'nullable|date',
            'price_discounted_end' => 'nullable|date',
            'quantity' => 'nullable|integer',
            'weight' => 'nullable|numeric',
            'position' => 'nullable|integer'
        ];
    }
}
