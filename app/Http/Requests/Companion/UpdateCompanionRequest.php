<?php

namespace App\Http\Requests\Companion;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCompanionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'id' => 'required|integer',
            'name' => 'required|string|between:1,80',
            'dni' => 'required|integer|digits_between:6,9',
            'phone' => 'required|integer|digits_between:8,14',
            'max_taxable' => 'integer|digits_between:1,10',
            'monotax' => 'boolean|nullable',
            'criminal_record' => 'boolean|nullable',
            'insurance' => 'boolean|nullable',
        ];
    }
}
