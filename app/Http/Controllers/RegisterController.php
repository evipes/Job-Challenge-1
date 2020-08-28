<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsersFormRequest;
use App\services\LoginData;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class RegisterController extends Controller
{
    
    public function store(UsersFormRequest $request)
    {
        
        $user = User::createUser($request);
        Auth::login($user);
        
        return redirect('/');
    }
}
