<?php

namespace App\Repositories;

use Illuminate\Support\Facades\Auth;
use App\Interfaces\IUser;
use App\User;

class UserRepository implements IUser
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function buscarPorId(int $id)
    {
        $response = $this->user::find($id);
        return $response;
    }

    public function buscarPorEmail(string $email)
    {
        $response = $this->user::where('email', $email);
        return $response;
    }

    public function criarUsuario(string $name, string $pass, string $email, string $role)
    {
        $response = $this->user::create([
            'password' => bcrypt($pass),
            'name' => $name,
            'email' => $email,
            'role' => $role
        ]);
        return $response;
    }

    public function buscarUsuarioLogado()
    {
        $response = $this->user::find(Auth::user()->id);
        return $response;
    }
}