<?php

namespace App\Interfaces;

interface IProduct
{
    public function buscarPorId(int $id);
    public function buscarProdutosUsuarioLogado();
    public function buscarProdutoPorIdUsuarioLogado(int $id);
    public function criarProduto(string $name, string $amount);
}