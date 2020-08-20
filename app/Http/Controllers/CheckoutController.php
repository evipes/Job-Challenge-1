<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    /**
     * Renderiza a página de checkout
     */
    public function index()
    {
        return view('checkouts.simple');
    }
}
