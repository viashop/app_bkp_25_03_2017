<?php

namespace App\Http\Requests\Control\Authorization;

use Illuminate\Foundation\Http\FormRequest;

class PermissonRequest extends FormRequest
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
            'name' => 'min:5|max:50|required|unique:permissions',
            'description' => 'min:5|max:50|required'
        ];

    }


    public function messages()
    {

        return [
            'name.required' => 'Preencha a name ( SLUG com _ ).',
            'name.min' => 'O name deve ter no mínimo 5 caracteres.',
            'name.max' => 'O name deve ter no máximo 50 caracteres.',
            'name.unique' => 'Esta permissão já está em uso.',
            'description.required' => 'Preencha a descrição.',
            'description.min' => 'A descrição deve ter no mínimo 5 caracteres.',
            'description.max' => 'A descrição deve ter no máximo 50 caracteres.'
        ];

    }

}
