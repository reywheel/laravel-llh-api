<?php

namespace App\Http\Requests\PersonalData;

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
            'user_id' => ['required', 'integer', 'unique:personal_data', 'exists:users,id'],
            'last_name' => ['required', 'string'],
            'first_name' => ['required', 'string'],
            'second_name' => ['required', 'string'],
            'date_of_birth' => ['required', 'date'],
            'address' => ['required', 'string'],
            'policy_number' => ['required', 'integer', 'unique:personal_data'],
        ];
    }
}
