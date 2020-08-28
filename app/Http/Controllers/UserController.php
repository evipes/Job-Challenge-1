<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * This will redirect you to the main view of the User
     * 
     * @param   void
     * @return  \Illuminate\View\View
     */
    public function index (Request $request )
    {
        $id = Auth::user()->id;
        $products = Product::listProduct($id);
        return view('user.index', compact('products'));
    }
    
    /**
     * This creates a new User. Redirects to a new User form
     * 
     * @param   void
     * @return  \Illuminate\View\View
     */
    public function createUser()
    {
        return view ('user.createUser');
    }

    /**
     * This method persist a new User on Database
     * 
     * @param   \Illuminate\Http\Request    $request
     * @return  void
     */
    public function saveUser(Request $request)
    {
        User::createUser($request);
        
        redirect(route('login'));
    }

}