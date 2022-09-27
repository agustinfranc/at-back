<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAssignmentWeekdayRequest extends FormRequest
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
            'monday' => 'boolean|nullable',
            'tuesday' => 'boolean|nullable',
            'wednesday' => 'boolean|nullable',
            'thursday' => 'boolean|nullable',
            'friday' => 'boolean|nullable',
            'saturday' => 'boolean|nullable',
            'sunday' => 'boolean|nullable',
        ];
    }
}
