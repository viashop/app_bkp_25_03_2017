<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ModelRequest extends FormRequest
{

    //http://pt.stackoverflow.com/questions/131202/como-manter-os-dados-j%C3%A1-preenchidos-no-input-ap%C3%B3s-submeter-um-formul%C3%A1rio
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
     public function rules()
     {
         return [
             'nome' => 'min:3|max:100|required',
             'preco' => 'required',
             'descricao' => 'min:3|max:255|required',
             'categoria_id' => 'required',
         ];
     }

     public function messages()
     {
         return[
             'nome.required' => 'Preencha o nome',
             'nome.min' => 'O nome deve ter no mínimo 3 caracteres',
             'nome.max' => 'O nome deve ter no máximo 100 caracteres',
             'preco.required' => 'Preencha o preço',
             'descricao.required' => 'Preencha a descrição',
             'descricao.min' => 'A descrição deve ter no mínimo 3 caracteres',
             'descricao.max' => 'A descrição deve ter no máximo 255 caracteres',
             'categoria_id.required' => 'Escolha uma categoria',
         ];
     }
}
