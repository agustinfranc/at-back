<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'name' => 'required|string|between:1,80|unique:App\Models\User,name',
            'email' => 'required|string|email|between:1,100|unique:App\Models\User,email',
            'password' => 'required|string|between:1,100',
            'repeate_password' => 'required|string|same:password',
            'user_role_id' => 'required',
        ];
    }
}
