<?php

namespace App\Http\Requests\Account;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name' => 'required|min:2|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'min:6|max:255|required',
            'password_confirmation' => 'min:6|max:255|same:password'
        ];
    }

    public function messages()
    {

        return [
            'name.required' => 'Preencha o seu nome completo corretamente.',
            'name.min' => 'O nome deve ter no mínimo 5 caracteres.',
            'name.max' => 'O nome deve ter no máximo 255 caracteres.',
            'email.required' => 'Preencha a descrição.',
            'email.max' => 'O email deve ter no máximo 255 caracteres.',
            'email.unique' => 'Já existe um cadastro com este email, experimente fazer login.',
            'password.required' => 'Preencha o campo senha corretamente.',
            'password.min' => 'A senha deve ter no mínimo 5 caracteres.',
            'password.max' => 'A senha deve ter no máximo 255 caracteres.',
            'password_confirmation.required' => 'Preencha a confirmação de senha corretamente.',
            'password_confirmation.min' => 'A confirmação de senha deve ter no mínimo 5 caracteres.',
            'password_confirmation.max' => 'A confirmação de senha deve te no máximo 255 caracteres.',
            'same' => 'As senhas não são iguais.',
        ];

    }
}
