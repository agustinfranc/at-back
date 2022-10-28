<?php

namespace App\Http\Requests\Client;

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
            'name' => 'required|string|between:1,80|unique:App\Models\Client,name',
            'dni' => 'required|integer|digits_between:6,9',
            'phone' => 'nullable|string|between:1,50',
            'extra_phone' => 'nullable|string|between:1,100',
            'rate' => 'nullable|numeric',
            'taxable' => 'nullable|integer|digits_between:1,3',
            'comments' => 'nullable|string|between:1,280',
            'address' => 'nullable|string|between:1,80',
            'guardian_name' => 'nullable|string|between:1,80',
            'birthday' => 'nullable|date|after:1900-03-29T05:50:06',
            'medicine' => 'nullable|string|between:1,280',
            'diagnosis' => 'nullable|string|between:1,280',
            'treatment' => 'nullable|string|between:1,280',
            'health_insurance' => 'nullable|string|between:1,20',
            'affiliate' => 'nullable|string|between:1,80',
            'budget_date' => 'nullable|date|after:1900-03-29T05:50:06',
        ];
    }
}
