<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Sale;
use App\User;
use App\Product;
use App\UserAddress;
use App\UserDocuments;
use Illuminate\Http\Request;

use Mail;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vendas = Sale::with('user', 'product.user')
        ->join('products', function ($join) {
            $join->on('sales.product_id', '=', 'products.id')
                 ->where('products.user_id', '=', Auth::user()->id);
        })
        ->select('sales.*')
        ->get();


        $compras = Sale::with('user', 'product.user')
        ->join('users', function ($join) {
            $join->on('sales.user_id', '=', 'users.id')
                 ->where('sales.user_id', '=', Auth::user()->id);
        })
        ->select('sales.*')
        ->get();

        return response()->json([
            'status' => 'success',
            'sales' => $vendas,
            'sales_total' => $vendas->sum('amount'),
            'shopping' => $compras,
            'shopping_total' => $compras->sum('amount'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validar = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'cep' => 'required',
            'street' => 'required',
            'number' => 'required',
            'city' => 'required',
            'neighborhood' => 'required',
            'state' => 'required',
            'quantity' => 'required',
            'installments' => 'required',
            'product_id' => 'required',
        ]);

        if ($validar->fails()) {
            return response()->json($validar->errors(), 422);
        }

        $produtos = Product::find($request->product_id);

        if ($produtos == null) {
            return response()->json(['message' => 'Produto não encontrado.'], 404);
        }

        //verficar se o usuário já existe por email
        $user = User::where('email', $request->email)->first();
        $vendedor = User::where('id', $produtos->user_id)->first();
        $senha = 0;
       if(!$user) {
        $senha = rand(100000,999999);
            $user = User::create([
                'password' => bcrypt($senha),
                'name' => $request->name,
                'email' => $request->email,
                'role' => 'client'
            ]);
            //Enviar Email de criação de conta
            $this->EnviarMail("Sua conta foi criada, sua senha é $senha", $request->email, "Conta criada!");
        }

        UserAddress::updateOrCreate([
            'street_name' => $request->street,
            'street_number' => $request->number,
            'neighborhood' => $request->neighborhood,
            'city' => $request->city,
            'state' => $request->state,
            'user_id' => $user->id
            ]);

        Sale::create([
            'amount' => $produtos->amount,
            'quantity' => 1,
            'status' => 'pending',
            'installments' => 1,
            'product_id' => $request->product_id,
            'user_id' => $user->id
        ]);

        //enviar email do pedido
        $this->EnviarMail("Compra realizada com sucesso!", $request->email, "Compra realizada!");
        $this->EnviarMail("Produto vendido para  $user->name", $vendedor->email, "Produto vendido!");

        return response()->json([
            'message' => 'Pedido registrado com sucesso',
            'status' => 'success',
            'user' => $user,
            'senha' => $senha
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validar = Validator::make($request->all(), [
            'status' => 'required'
        ]);

        if ($validar->fails()) {
            return response()->json($validar->errors(), 422);
        }
        $dado = Sale::join('products', function ($join) {
                    $join->on('sales.product_id', '=', 'products.id')
                        ->where('products.user_id', '=', Auth::user()->id);
                })
                ->where('sales.id', '=', $id)
                ->select('sales.*');

        if ($dado->first() == null) {
            return response()->json(['message' => 'Não existe'], 422);
        }

        $dado->update(['status' => $request->status]);
        return response()->json([
            'status' => 'success',
            'produto' => $dado->first()
        ]);
    }


    public function EnviarMail($msg, $to, $title)
    {
        Mail::send('email', ['msg' => $msg], 
        function($message) use ($to, $title) {
            $message->from('daniel@daniel.com', 'DANIEL LUCAS');
            $message->to($to)
            ->subject($title);
        });

        return true;
    }
}
