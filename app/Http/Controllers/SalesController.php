<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use App\User;
use App\UserAddress;
use App\UserDocuments;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreSales;
use App\Sale;
use Illuminate\Support\Facades\Auth;
class SalesController extends Controller
{

    public function list()
    {
        $sales = Sale::where('user_id',Auth::user()->id)->get();
        return datatables()->of($sales)
            ->escapeColumns([0])
            ->make(true);
    }

    public function adicionar(Request $request, StoreSales $validatorSales)
    {

        $validatedData = $validatorSales->validator($request);

        if (is_array($validatedData))
            if (count($validatedData))
                return response($validatedData, 422);

        // Realizando cadastro do usuário caso seja novo
        try {
            DB::beginTransaction();
            // criando novo usuário
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = $request->password;
            $user->save();

            // Associando ao endereço
            $addresses = new UserAddress();
            $addresses->street_name = $request->street_name;
            $addresses->street_number = $request->street_number;
            $addresses->complement = $request->complement;
            $addresses->neighborhood = $request->neighborhood;
            $addresses->city = $request->city;
            $addresses->state = $request->state;
            $addresses->user_id = $user->id;
            $addresses->save();


            // Associandoo aos documentos
            $documents = new UserDocuments();
            $documents->type = $request->type;
            $documents->number = $request->number;
            $documents->user_id = $user->id;
            $documents->save();

            // Registrando compra
            $sale = new Sale();
            $sale->amount = $request->amount;
            $sale->quantity = $request->quantity;
            $sale->status = $request->status;
            $sale->product_id = $request->product_id;
            $sale->user_id = $user->id;
            $sale->save();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return response([
                'message' => 'Não foi possível realizar sua compra, favor entrar em contato com o nosso suporte'
            ], 500);
        }
    }
}
