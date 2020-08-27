<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Interfaces\ISale;
use App\Interfaces\IUser;
use App\Interfaces\IProduct;
use App\Interfaces\IUserAddress;
use Illuminate\Http\Request;

use Mail;

class SaleController extends Controller
{
    protected $productService;
    protected $userService;
    protected $saleService;
    protected $userAddressService;

    public function __construct(IProduct $p, IUser $u, ISale $s, IUserAddress $uA) {
        $this->productService = $p;
        $this->userService = $u;
        $this->saleService = $s;
        $this->userAddressService = $uA;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vendas =  $this->saleService->buscarVendasUserLogado();
        $compras = $this->saleService->buscarComprasUserLogado();

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

        $produtos = $this->productService->buscarPorId($request->product_id);

        if ($produtos == null) {
            return response()->json(['message' => 'Produto não encontrado.'], 404);
        }

        //verficar se o usuário já existe por email
        $user       = $this->userService->buscarPorEmail($request->email)->first();
        $vendedor   = $this->userService->buscarPorId($produtos->user_id);
        $senha      = 0;
       
       if(!$user) {
            $senha = rand(100000,999999);
            $user = $this->userService->criarUsuario($request->name, $senha, $request->email, 'client');
            //Enviar Email de criação de conta
            $this->EnviarMail("Sua conta foi criada, sua senha é $senha", $request->email, "Conta criada!");
        }

        $this->userAddressService->criarOuAtualizar($request->street, $request->number, $request->neighborhood, $request->city, $request->state, $user->id);
        $this->saleService->criarSale($produtos->amount, $request->product_id, $user->id);

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

        $dado = $this->saleService->buscarVendaPorIdUserLogado($id);

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
            $message->from('contato@evipes.com', 'EQUIPE EVIPES');
            $message->to($to)
            ->subject($title);
        });

        return true;
    }
}
