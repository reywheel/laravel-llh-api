<?php

namespace App\Http\Requests\SleepData;

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
            'date' => ['required', 'date'],
            'hours' => ['required', 'integer'],
            'minutes' => ['required', 'integer'],
            'user_id' => ['required', 'exists:users,id']
        ];
    }
}
