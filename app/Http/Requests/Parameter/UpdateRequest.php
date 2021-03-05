<?php

namespace App\Http\Requests\Parameter;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'gender' => ['string', 'in:М,Ж'],
            'growth' => ['integer'],
            'weight' => ['integer'],
        ];
    }
}
