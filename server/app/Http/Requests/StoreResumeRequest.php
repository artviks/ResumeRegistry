<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StoreResumeRequest extends FormRequest
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
            'person.name' => 'required',
            'person.phone_number' => 'required',
            'person.email' => 'required|email',

            'education.*.school' => Rule::requiredIf(!empty($this->input('education')[0])),
            'education.*.degree' => Rule::requiredIf(!empty($this->input('education')[0])),
            'education.*.field_of_study' => Rule::requiredIf(!empty($this->input('education')[0])),
            'education.*.start_year' => [Rule::requiredIf(!empty($this->input('education')[0])), 'numeric'],
            'education.*.end_year' => 'numeric',

            'work_experience.*.title' => Rule::requiredIf(!empty($this->input('work_experience')[0])),
            'work_experience.*.company' => Rule::requiredIf(!empty($this->input('work_experience')[0])),
            'work_experience.*.start_date' => Rule::requiredIf(!empty($this->input('work_experience')[0])),


            'address.address' => 'required',
            'address.country' => 'required',
            'address.postal_code' => 'required'
        ];
    }
}
