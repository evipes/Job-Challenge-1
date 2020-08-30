<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreSales;
use Illuminate\Support\Facades\DB;
use App\User;
use Illuminate\Support\Facades\Hash;
use App\UserAddress;
use App\UserDocuments;
use App\Sale;

class CheckoutController extends Controller
{
    function index($product)
    {
        $product = Product::where('slug', $product)->first();
        if (Auth::check() && Auth::user()->hasRole('cliente')) {
            return view('checkouts.auth', compact('product'));
        } else {
            return view('checkouts.simple', compact('product'));
        }
    }

    function store(Request $request, StoreSales $validatorSales)
    {
        $validatedData = $validatorSales->validator($request);
        if (is_array($validatedData))
            if (count($validatedData))
                return response($validatedData, 422);

        // Realizando criação de user e da compra
        try {
            DB::beginTransaction();
            if (!Auth::check()) {
                // Criando novo usuário
                $user = new User();
                $user->name = $request->name;
                $user->email = $request->email;
                $user->password = Hash::make($request->password);
                $user->save();

                // Definindo papel do usuário
                $user->assignRole('cliente');

                // Registrando o dcumento ligado a aquele novo usário
                $userDocument = new UserDocuments();
                $userDocument->type = 'cpf';
                $userDocument->number = $request->cpf;
                $userDocument->user_id = $user->id;
                $userDocument->save();

                // Registrando o endereço ligado ao usuário
                $userAddress = new UserAddress();
                $userAddress->street_name = $request->street_name;
                $userAddress->street_number = $request->street_number;
                $userAddress->complement = $request->complement;
                $userAddress->neighborhood = $request->neighborhood;
                $userAddress->state = $request->state;
                $userAddress->city = $request->city;
                $userAddress->user_id = $user->id;
                $userAddress->save();
            }

            // Registrando a compra feita pelo usuário
            $sale = new Sale();
            $sale->amount = $request->amount;
            $sale->quantity = '1';
            $sale->status = "approved";
            $sale->installments = $request->installments;
            $sale->product_id = $request->product_id;
            $sale->user_id = isset($user->id) ? $user->id : Auth::user()->id;
            $sale->save();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return response([
                'message' => 'Não foi possível Efetuar a compra, favor entrar em contato com o nosso suporte'
            ], 500);
        }
    }
}
