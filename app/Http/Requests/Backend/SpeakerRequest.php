<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SpeakerRequest extends FormRequest
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
       
        return [
            'first_name' => 'required|max:191',
            'last_name' => 'required|max:191',
            'email' => 'required|max:191|email|'.Rule::unique('speakers')->ignore($this->id),
            //'job_title' => 'required',
            //'institute' => 'required',
            // 'profile' => 'required',
            //'about' => 'required',
            //'profession' => 'required',
            //'classification' => 'required',
            // 'specialty' => 'required',
            // 'employer_type' => 'required',
            // 'practice_role' => 'required',
            // 'vets_in_practice' => 'required',
            // 'techs_in_practice' => 'required',
            // 'practice_revenue' => 'required',
            // 'practices_in_group' => 'required',
            // 'credentials' => 'required',
            // 'website' => 'required',
            // 'phone' => 'required',
            // 'mobile' => 'required',
            'address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zip' => 'required',
            'country' => 'required',
            // 'sm_facebook' => 'required',
            // 'sm_linkedin' => 'required',
            // 'sm_twitter' => 'required',
            // 'sm_instagram' => 'required',
            // 'sm_pinterest' => 'required',
            // 'sm_youtube' => 'required',
            // 'sm_vimeo' => 'required',
            'status' => 'required',
        ];
    }
}
