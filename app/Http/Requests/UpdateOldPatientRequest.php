<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateOldPatientRequest extends FormRequest
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
            'ipd_no'                => 'Required|numeric',
            'date'                  => 'Required|date',
            'first_name'            => 'Required|alpha',
            'last_name'             => 'alpha',
            'age'                   => 'Required|numeric',
            'gender'                => 'Required',
            'contact_1'             => 'Required|Numeric',
            'contact_2'             => 'Numeric',
            'country'               => 'Required',
            'procedure_list'        => 'Required',
        ];
    }
}
