<?php

namespace App\Http\Requests\ArterialPressureData;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'measurement_time' => ['required', 'date'],
            'systolic_value' => ['required', 'integer'],
            'diastolic_value' => ['required', 'integer'],
            'user_id' => ['required', 'integer', 'exists:users,id']
        ];
    }
}
