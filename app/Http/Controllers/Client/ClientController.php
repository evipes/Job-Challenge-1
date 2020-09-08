<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class ClientController extends Controller
{

    public function __construct()
    {
        // variável pública listando as campanhas do site
        View::share('title', 'Área de clientes');
    }

    public function index()
    {
        return view('client.index');
    }

}
