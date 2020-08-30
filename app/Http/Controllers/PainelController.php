<?php

namespace App\Http\Controllers;


class PainelController extends Controller
{
    public function vendedor()
    {
        return view('paineis.vendedor');
    }

    public function cliente()
    {
        return view('paineis.cliente');
    }
}
