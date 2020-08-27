<?php

namespace App\Interfaces;

interface IUser
{
    public function buscarPorId(int $id);
    public function buscarPorEmail(string $email);
    public function criarUsuario(string $name, string $pass, string $email, string $role);
    public function buscarUsuarioLogado();
}