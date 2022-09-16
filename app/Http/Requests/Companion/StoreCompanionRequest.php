<?php

namespace App\Http\Requests;

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
            'name' => 'required|string|between:1,60',
            'dni' => 'required|integer|digits_between:8,9',
            'phone' => 'required|integer|digits_between:8,13',
            'max_taxable' => 'integer|digits_between:1,10',
            'extras' => 'integer|nullable|between:1,280',
        ];
    }
}
