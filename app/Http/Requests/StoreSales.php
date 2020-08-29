<?php

namespace App\Http\Requests;

use App\Product;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class StoreSales extends FormRequest
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

    //  Caso seja a primeira compra esses são os campos requeridos
    private function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'cpf' => ['required', 'cpf'],
            'state' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'street_name' => ['required', 'string', 'max:255'],
            'street_number' => ['required', 'numeric'],
            'cardnumber' => ['required', 'numeric'],
            'carddate' => ['required', 'date'],
            'cardcvv' => ['required', 'numeric'],
        ];
    }

    // Caso o usuário esteja logado essas serão os campos requeridos
    private function rules_check()
    {
        return [
            'cardnumber' => ['nullable', 'numeric'],
            'carddate' => ['required', 'date'],
            'cardcvv' => ['required', 'numeric'],
        ];
    }

    private function attributeNames()
    {
        return [
            'name' => 'nome',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'amount' => 'valor',
            'state' => 'estado',
            'city' => 'cidade',
            'street_name' => 'rua',
            'street_number' => 'carddate',
            'cardnumber' => 'numero do cartão',
            'carddate' => 'validade',
            'cardcvv' => 'CVV',
            'password' => 'Senha'
        ];
    }


    //método que valida as entradas
    public function validator(Request $request)
    {
        // Caso seja autenticado
        if (Auth::check()) {
            $validator = Validator::make($request->all(), $this->rules_check(), [], $this->attributeNames());

            //Validações personalizadas
            $validator->after(function ($validator) use ($request) {
                // Simulando validacao de cartão
                if (strlen($request->cardnumber) != 16)
                    $validator->errors()->add('cardnumber', 'O cartão é inválido!');

                // verificando se o código do produto digitado é válido
                $product = Product::where('slug', $request->slug)->first();
                if ($product == null) {
                    $validator->errors()->add('slug', 'Digite um código válido!');
                }
            });
        }

        // Caso o usuário não esteja logado
        else {
            $validator = Validator::make($request->all(), $this->rules(), [], $this->attributeNames());
        }


        //Validações personalizadas
        $validator->after(function ($validator) use ($request) {
            // Simulando validacao de cartão
            if (strlen($request->cardnumber) != 16)
                $validator->errors()->add('cardnumber', 'O cartão é inválido!');
        });

        return $validator;
    }
}
