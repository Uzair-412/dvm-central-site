<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class  AddressRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;//$this->user()->isAdmin();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'first_name' => 'min:3|regex:/^[a-zA-Z0-9\s]+$/',
            'last_name' => 'min:3|regex:/^[a-zA-Z0-9\s]+$/',
//            'company' => 'sometimes|regex:/^[a-zA-Z0-9\s]+$/',
            'address1' => 'required',
            'country' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zip' => 'required',
            'phone' => 'required',
            'vat' => 'sometimes|numeric',
            //'default_billing' => 'required',
            //'default_shipping' => 'required'
        ];
    }
}
