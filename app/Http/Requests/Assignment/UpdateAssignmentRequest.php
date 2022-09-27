<?php

namespace App\Http\Requests\Assignment;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAssignmentRequest extends FormRequest
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
            'client_id' => 'required|integer',
            'companion_id' => 'required|integer',
            'weekday_id' => 'required|integer',
            'periodic' => 'required|boolean',
            'enabled' => 'required|boolean',
            'hours' => 'required|integer|max:24',
        ];
    }
}
