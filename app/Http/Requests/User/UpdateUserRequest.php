<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'id' => 'required|integer',
            'name' => 'required|string|between:1,80',
            'email' => 'required|string|email|between:1,100',
            'password' => 'sometimes|nullable|string|between:1,100',
            'repeate_password' => 'sometimes|nullable|string|same:password',
            'user_role_id' => 'required',
        ];
    }
}
