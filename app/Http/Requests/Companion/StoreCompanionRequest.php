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
            'name' => 'required|string|between:1,80|unique:App\Models\Companion,name',
            'cuit' => 'required|string|between:6,13',
            'nationality' => 'required|string|between:1,50',
            'birthday' => 'required|date|after:1900-03-29T05:50:06',
            'phone' => 'required|string|between:1,50',
            'extra_phone' => 'nullable|string|between:1,100',
            'extra_phone_reference' => 'nullable|string|between:1,100',
            'max_taxable' => 'integer|digits_between:1,10',
            'monotax' => 'nullable|boolean',
            'criminal_record' => 'nullable|boolean',
            'insurance' => 'nullable|boolean',
            'has_sign_contract' => 'nullable|boolean',
        ];
    }
}
