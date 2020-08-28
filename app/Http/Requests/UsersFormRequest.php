<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsersFormRequest extends FormRequest
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
            'name'=>'required|min:3',
            'type'=>'required',
            'number'=>'required',
            'email'=>'required',
            'password'=>'required',
            'street_name'=>'required|min:1',
            'street_number'=>'required|max:10|min:1',
            'complement'=>'required',
            'state'=>'required',
            'city'=>'required'
        ];
    }

    public function messages()
    {
        return [
            'required'=>'O campo :attribute é obrigatorio',
            'name.min' => 'O campo nome precisa ter pelo menos 3 caracteres'
        ];
    }

}
