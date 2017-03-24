<?php

namespace App\Http\Requests\Control\Personal;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class PersonalRequest extends FormRequest
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
    public function rules(Request $request)
    {

        if(!empty($request->input('password'))){

            return [
                'name' => 'required|min:2',
                'password' => 'min:6|max:255|required',
                'password_confirmation' => 'min:6|max:255|same:password'
            ];

        } else {

            return [
                'name' => 'required|min:2',
            ];

        }

    }

    public function messages()
    {
        return[
            'same' => 'As senhas não são iguais.',
        ];
    }

}
