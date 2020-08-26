<?php

namespace App\Http\Requests;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class StoreProduct extends FormRequest
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
    private function rules()
    {
        return [
            'slug'   =>  ['required', 'numeric'],
            'name'  =>  ['required', 'string', 'max:255'],
            'amount'    =>  ['required', 'numeric']
        ];
    }

    private function attributeNames()
    {
        return [
            'name' => 'nome',
            'slug' => 'código',
            'amount' => 'valor'
        ];
    }


    //método que valida as entradas
    public function validator(Request $request)
    {
        $validator=Validator::make($request->all(), $this->rules(), [], $this->attributeNames());

        //Validações personalizadas
        $validator->after(function ($validator) use ($request) {
            $product = DB::table('products')->where('slug', $request->slug)->get();
            /**verificando se o codigo está sendo usado em um outro produto */
            if ($product->first()!=null && $product->first()->id!=$request->id)
                $validator->errors()->add('slug', 'O código já encontra-se cadastrado em nossa base de dados!');
        });

        return $validator;
    }
}
