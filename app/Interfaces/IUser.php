<?php

namespace App\Interfaces;

interface IUser
{
    public function criarUsuario(string $name, string $pass, string $email, string $role);
}