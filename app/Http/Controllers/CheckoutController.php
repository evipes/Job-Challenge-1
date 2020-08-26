<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    /**
     * Renderiza a página de checkout
     * 
     * @param   \App\Product
     * @return  \Illuminate\View\View
     */
    public function index(Product $product)
    {
        return view('checkouts.simple', compact('product'));
    }
}
