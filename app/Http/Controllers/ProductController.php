<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
   
    /**
     * This methods redirects you to a new-product form
     * 
     * @param   void
     * @return  \Illuminate\View\View
     */
    public function createProduct()
    {
        return view ('product.createProduct');
    }

    /**
     * This methods redirects you to a new-product form
     * 
     * @param   \Illuminate\Http\Request    $request
     * @return  void
     */
    public function saveProduct(Request $request)
    {        
        Product::createProduct($request);
        
        return view ('product.createProduct');
    }

}