<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdatePost extends FormRequest
{
    /**
     * Determine se o usuário está autorizado a fazer essa solicitação.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; //authorized validation
    }

    /**
     * Obtenha as regras de validação que se aplicam à solicitação.
     *
     * @return array
     */
    public function rules()
    {

        $rules = [
            //my rules

            'title' => 'required', //|min:6|max:160|unique:posts, caso o nosso titulo for unico
            'content' => ['nullable'], //, 'min:6', 'max:10000'
            'image' => ['required', 'image']
         ];

         if($this->method() == 'PUT'){

            $rules['image'] =  ['nullable', 'image'];

         }
         return $rules;
    }

}
