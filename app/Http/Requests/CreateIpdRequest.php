<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateIpdRequest extends FormRequest
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

            'ipd_no' => 'Required',
            'attendent_name' => 'regex:/^[\pL\s\-]+$/u',
            'procedure_type' => 'Required',
            'anesthesia' => 'Required',
            'admision_date' => 'Required_if:procedure_type,Major|date',
            'procedure_date' => 'Required|date',
        ];
    }
}
