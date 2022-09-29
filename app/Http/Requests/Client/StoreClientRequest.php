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
            'name' => 'required|string|between:1,80',
            'dni' => 'required|integer|digits_between:6,9',
            'phone' => 'required|integer|digits_between:8,14',
            'rate' => 'required|digits_between:1,5',
            'taxable' => 'integer|digits_between:1,3',
            'comments' => 'string|nullable|between:1,280',
            'address' => 'string|required|between:1,80',
            'guardian_name' => 'string|required|between:1,80',
            'extra_phone' => 'string|between:1,50',
            'birthday' => 'required|date|after:1900-03-29T05:50:06',
            'medicine' => 'string|nullable|between:1,100',
            'diagnosis' => 'string|nullable|between:1,80',
            'treatment' => 'string|nullable|between:1,80',
            'health_insurance' => 'string|nullable|between:1,20',
            'affiliate' => 'string|nullable|between:1,80',
            'budget_date' => 'required|date|after:1900-03-29T05:50:06',
        ];
    }
}
