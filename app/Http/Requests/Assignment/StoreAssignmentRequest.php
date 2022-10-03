<?php

namespace App\Http\Requests\Assignment;

use Illuminate\Foundation\Http\FormRequest;

class StoreAssignmentRequest extends FormRequest
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
            'client_id' => 'required|integer',
            'companion_id' => 'required|integer',
            'enabled' => 'required|boolean',
            'periodic' => 'required|boolean',
            'days' => 'required|array',
            'days.*.day_id' => 'required|integer|distinct',
            'days.*.enabled' => 'required|boolean',
            'days.*.from' => 'nullable|string',
            'days.*.to' => 'nullable|string',
            'days.*.hours' => 'required|integer',
        ];
    }
}
