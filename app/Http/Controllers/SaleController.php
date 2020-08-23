<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function test (Request $request)
    {
        return view('sale.index');
    }
    
}