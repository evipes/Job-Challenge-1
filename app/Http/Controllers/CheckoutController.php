<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\UserAddress;
use App\UserDocuments;
use App\Sale;
use League\CommonMark\Block\Element\Document;

use function GuzzleHttp\Promise\all;

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
