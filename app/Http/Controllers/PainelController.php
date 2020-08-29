<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PainelController extends Controller
{
    public function vendedor()
    {
        return view('paineis.painel-vendedor');
    }

    public function cliente()
    {
        return view('paineis.painel-cliente');
    }
}
