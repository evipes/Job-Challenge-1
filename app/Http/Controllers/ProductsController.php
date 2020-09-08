<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('index');
        $this->middleware('guest:client')->except('index');
        $this->middleware('guest:vendor')->except('index');
    }

    public function index()
    {
        $products = Product::all();
        return response()->json(compact('products'));
    }
}
