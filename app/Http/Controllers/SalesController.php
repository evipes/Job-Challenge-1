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

    public function list_vendas()
    {

        //Selecionando todas as vendas que o usuário logado fez 
        $sales = DB::table('sales')
            ->join('products', 'sales.product_id', '=', 'products.id')
            ->join('users', 'products.user_id', '=', 'users.id')
            ->select('users.id', 'products.name', 'sales.amount', 'sales.status')->where('users.id', Auth::user()->id)
            ->get();
        return datatables()->of($sales)
            ->escapeColumns([0])
            ->make(true);
    }



    public function list_compras()
    {
        // Selecionando todas as compras que o usuário logado realizou
        $sales = DB::table('sales')
            ->join('products', 'sales.product_id', '=', 'products.id')
            ->select('sales.user_id', 'products.name',  'sales.amount', 'sales.status', 'products.id')->where('sales.user_id', Auth::user()->id)
            ->get();
        return datatables()->of($sales)
            ->escapeColumns([0])
            ->make(true);
    }
}
