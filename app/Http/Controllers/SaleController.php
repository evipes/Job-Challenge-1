<?php

namespace App\Http\Controllers;

use App\Product;
use App\Sale;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SaleController extends Controller
{
    public function sell (Request $request)
    {

        Sale::toSale($request);
        return redirect('/');
    }

    public function allSales (Request $request)
    {
        $id = Auth::user()->id;
        $products = Product::soldProducts($id);
        return view('user.list-sales', compact('products'));
    }

    public function productSales (Request $request)
    {
        $product_id = (int) $request->id;
        $sales = Sale::where('product_id',$product_id)->get();
        $buyers = [];
        $status=[];
        $export = [];
        foreach ($sales as $sale){
            $status[]=$sale->status;
            $buyers[]= User::find($sale->user_id)->name;            
        }
        $slug = Product::find($product_id)->slug;
        return view('user.list-product-sales', compact('status','buyers','slug'));
    }


}