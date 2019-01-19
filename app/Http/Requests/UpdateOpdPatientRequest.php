<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateOpdPatientRequest extends FormRequest
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
            'patient_id'            => 'Required|unique:opdpatients,patient_id,'.$this->id,
            'first_name'            => 'Required',
            'gender'                => 'Required',
            'country'               => 'Required',
            'email'                 => 'email|unique:opdpatients,email,'.$this->id,
            'contact'               => 'numeric|unique:opdpatients,contact,'.$this->id,
        ];
    }
}
