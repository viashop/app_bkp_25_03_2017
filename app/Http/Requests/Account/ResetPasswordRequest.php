<?php

namespace App\Http\Requests\Account;

use Illuminate\Foundation\Http\FormRequest;

class ResetPasswordRequest extends FormRequest
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
            'password' => 'min:6|max:255|required',
            'password_confirmation' => 'min:6|max:255|same:password'
        ];
    }

    public function messages()
    {

        return [

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
