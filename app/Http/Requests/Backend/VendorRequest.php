<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class VendorRequest extends FormRequest
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
                        'contact_name' => 'required|min:3',
                        'address' => 'required',
                        'city' => 'required',
                        'state' => 'required',
                        'zip_code' => 'required',
                        'phone' => 'required',
                        'user' => 'required',
                        'name' => 'required|unique:vendors|min:3',
                        'slug' => 'required|unique:vendors|min:3',
                        'tax_percentage' => 'required',
                        'percentage_from_sales' => 'required',
                        // 'publishable_key' => 'required',
                        // 'secret_key' => 'required',
                        // 'client_account_id' => 'required',
                        'status' => 'required'
                    ];
                }
            case 'PUT':
            case 'PATCH':
                {
                    return [
                        'contact_name' => 'required|min:3',
                        'address' => 'required',
                        'city' => 'required',
                        'state' => 'required',
                        'zip_code' => 'required',
                        'phone' => 'required',
                        'user' => 'required',
                        'name' => 'sometimes|required|unique:vendors,name,'. $this->get('id') .'|min:3',
                        'slug' => 'sometimes|required|unique:vendors,slug,'. $this->get('id') .'|min:3',
                        'tax_percentage' => 'required',
                        'percentage_from_sales' => 'required',
                        // 'publishable_key' => 'required',
                        // 'secret_key' => 'required',
                        // 'client_account_id' => 'required',
                        'status' => 'required'
                    ];
                }
        }
    }
}
