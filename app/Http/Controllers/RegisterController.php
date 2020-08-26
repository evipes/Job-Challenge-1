<?php

namespace App\Http\Controllers;

use App\services\LoginData;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

// Esse controller já existe dentro da pasta Auth!!
class RegisterController extends Controller
{
    
    public function store(Request $request)
    {
        
        $user = User::createUser($request);
        Auth::login($user);

        return redirect('/');
    }
}
