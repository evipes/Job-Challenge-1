<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Redireciona para tela de login
     * 
     * @return  \Illuminate\Http\RedirectResponse 
     */
    public function acessForm()
    {
        return view('general.login');
    }

    /**
     * Metodo de login de Usuarios. 
     * 
     * @param   \Illuminate\Http\Client\Request
     * @return  \Illuminate\Http\RedirectResponse 
     */
    public function login(Request $request)
    {
        if(!Auth::attempt($request->only(['email','password'])))
        {
            return redirect()
            ->back()
            ->withErrors('Usuario e/ou senha incorreto(s)');
        }
        return redirect('/');
    }
    
    /**
     * Current user logout
     * 
     * @return  \Illuminate\Http\RedirectResponse
     * 
     */
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

}
