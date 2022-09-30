<?php

namespace App\Http\Requests\Companion;

use Illuminate\Foundation\Http\FormRequest;

class StoreCompanionRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|string|between:1,80',
            'cuit' => 'required|string|between:6,13',
            'nationality' => 'required|string|between:1,50',
            'birthday' => 'required|date|after:1900-03-29T05:50:06',
            'phone' => 'required|string|between:1,50',
            'max_taxable' => 'integer|digits_between:1,10',
            'monotax' => 'boolean|nullable',
            'criminal_record' => 'boolean|nullable',
            'insurance' => 'boolean|nullable',
            'has_sign_contract' => 'boolean|nullable',
        ];
    }
}
