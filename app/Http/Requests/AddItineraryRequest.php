<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddItineraryRequest extends FormRequest
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
            'opdpatient_id' => 'unique:itineraries,opdpatient_id',
            'arrival_date' => 'required|date',
            'departure_date' => 'date',
        ];
    }
}
