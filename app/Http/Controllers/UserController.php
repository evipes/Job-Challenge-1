<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * This will redirect you to the main view of the Clilent
     * 
     * @param   void
     * @return  \Illuminate\View\View
     */
    public function index ()
    {
        return view('user.index');
    }
    
    /**
     * This methods redirects you to a new-product form
     * 
     * @param   void
     * @return  \Illuminate\View\View
     */
    public function createProduct(Request $request)
    {
        return view ('product.createProduct');
    }

    /**
     * This creates a new User. Redirects to a new User form
     * 
     * @param   void
     * @return  \Illuminate\View\View
     */
    public function createUser(Request $request)
    {
        return view ('product.createProduct');
    }

   /**
     * This method persist a new User on Database
     * 
     * @param   void
     * @return  \Illuminate\View\View
     */
    public function saveUser(Request $request)
    {
        return view ('product.createProduct');
    }


    

}