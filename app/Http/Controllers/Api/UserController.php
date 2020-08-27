<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function updateRole()
    {
        $user = User::where('id', Auth::user()->id)->update(['role' => 'seller']);
        return response()->json([
            'message' => 'Atualizado com sucesso',
            'user' => $user,
            'status' => 'success'
        ], 200);
    }
}
