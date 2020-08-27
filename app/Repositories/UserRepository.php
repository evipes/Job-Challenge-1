<?php

namespace App\Repositories;

use App\Interfaces\IUser;
use App\User;

class UserRepository implements IUser
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
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
}