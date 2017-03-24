<?php

namespace App\Http\Requests\Account;

use Illuminate\Foundation\Http\FormRequest;

class RecoverPasswordRequest extends FormRequest
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
            'email' => 'required|email|max:255|exists:users,email,deleted_at,NULL',
        ];

    }

    public function messages()
    {
        return [

            'email.required' => 'Este o campo email corretamente.',
            'email.max' => 'O email deve ter no máximo 255 caracteres.',
            'email.exists' => 'O e-mail inserido não foi encontrado, verifique abaixo se o e-mail foi digitado corretamente.'

        ];

    }

}
