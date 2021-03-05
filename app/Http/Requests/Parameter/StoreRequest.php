<?php

namespace App\Http\Requests\Parameter;

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
            'gender' => ['required', 'string', 'in:М,Ж'],
            'growth' => ['required', 'integer'],
            'weight' => ['required', 'integer'],
            'user_id' => ['required', 'integer', 'unique:parameters', 'exists:users,id']
        ];
    }
}
