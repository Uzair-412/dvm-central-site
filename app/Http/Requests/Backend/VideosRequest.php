<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class VideosRequest extends FormRequest
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
                    'title' => 'required',
                    'source' => 'required',
                    'video_id' => 'required',
                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                return [
                    'title' => 'required',
                    'source' => 'required',
                    'video_id' => 'required',
                ];
            }
        }
    }
}