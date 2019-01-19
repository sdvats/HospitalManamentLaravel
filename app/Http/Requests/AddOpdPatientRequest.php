<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddOpdPatientRequest extends FormRequest
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

            'patient_id'            => 'unique:opdpatients,patient_id',
            'first_name'            => 'Required',
            'gender'                => 'Required',
            'birth_date'            => 'required|date|before:today',
            'group'                 => 'required',
            'country'               => 'Required',
            'email'                 => 'email|unique:opdpatients,email',
            'contact'               => 'Required|numeric|unique:opdpatients,contact',
        ];
    }
}
