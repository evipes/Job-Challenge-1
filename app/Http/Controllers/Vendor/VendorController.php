<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;

class VendorController extends Controller
{
    public function __construct()
    {
        // variável pública listando as campanhas do site
        View::share('title', 'Área de Vendedores');
    }

    public function index()
    {
        return view('vendor.index');
    }
}
