<?php

namespace App\Http\Requests\Client;

use Illuminate\Foundation\Http\FormRequest;

class UpdateClientRequest extends FormRequest
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
            'dni' => 'required|integer|min_digits:6|max_digits:9',
            'phone' => 'required|integer|min_digits:8|max_digits:14',
            'rate' => 'required|float|min_digits:1|max_digits:5',
            'taxable' => 'integer|min_digits:1|max_digits:3',
            'comments' => 'string|nullable|between:1,280',
        ];
    }
}
