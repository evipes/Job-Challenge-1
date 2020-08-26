<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    /**
     * This will redirect you to the main view of the User
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
    public function createProduct()
    {
        return view ('product.createProduct');
    }

    /**
     * This methods redirects you to a new-product form
     * 
     * @param   void
     * @return  \Illuminate\View\View
     */
    public function saveProduct()
    {
        echo ("Até aqui tudo ok . Save product POST");
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
     * @return  \Illuminate\View\View
     */
    public function saveUser(Request $request)
    {

        User::createUser($request);
#        echo ("Até aqui ok. Save new user");
    }




}