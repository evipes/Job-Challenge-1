<?php

namespace App\Interfaces;

interface IUserAddress
{
    public function criarOuAtualizar(string $street, string $number, string $neighborhood, string $city, string $state, string $userId);
}