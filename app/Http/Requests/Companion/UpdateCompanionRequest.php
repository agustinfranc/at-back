<?php

namespace App\Http\Requests\Companion;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCompanionRequest extends FormRequest
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
        $storeRules = (new StoreCompanionRequest())->rules();

        $localRules = [
            'id' => 'required|integer',
            'name' => 'required|string|between:1,80',
        ];

        return array_merge($storeRules, $localRules);
    }
}
