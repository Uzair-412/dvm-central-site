<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Validator;

class InvoiceRequest extends FormRequest
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
                        'customer_id' => 'required',
                        'ref_type' => 'required',
                        'ref_id' => 'required_if:ref_type,order',
                        'title' => 'required',
                        'invoice_number' => 'required',
                        'amount' => 'required',
                        'due_date' => 'required',
                        'late_fee_type' => 'required',
                        'late_fee' => 'required_if:late_fee_type,percentage|required_if:late_fee_type,flat',
                    ];
                }
            case 'PUT':
            case 'PATCH':
                {
                    return [
                        'category' => 'required',
                        'name' => 'required',
                        'slug' => 'required|unique:products,slug,'. $this->get('id') .'|min:3',
                        'sku' => 'required|unique:products,sku,'. $this->get('id') .'|min:3'
                    ];
                }
        }
    }

    public function withValidator(Validator $validator)
    {
        $validator->after(function ($validator) {
            $this->session->put('ses_invoice_data', $this->request->all());
            //error_log('----------------- '. json_encode($this->request->all()) .' ---------------------');
        });
    }

    public function attributes()
    {
        return [
            'ref_type' => 'invoice type',
            'ref_id' => 'order id',
            'late_fee_type' => 'charge late fee',
            'late_fee' => 'late fee amount',
        ];
    }
}
