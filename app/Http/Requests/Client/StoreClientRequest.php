<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreClientRequest extends FormRequest
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
            'rate' => 'required|digits_between:1,5',
            'taxable' => 'integer|digits_between:1,3',
            'comments' => 'string|nullable|between:1,280',
        ];
    }
}
