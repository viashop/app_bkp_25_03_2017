<?php

namespace App\Http\Requests\Control\User;

use Illuminate\Foundation\Http\FormRequest;

class UserRegisterRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|min:2',
            'email' => 'required|email|max:255|unique:users',
            'role_id' => 'required|array'
        ];
    }

    public function messages()
    {

        return [
            'email.unique' => 'Este email já está em uso.',
        ];

    }
}
