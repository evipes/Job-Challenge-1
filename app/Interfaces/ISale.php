<?php

namespace App\Interfaces;

interface ISale
{
    public function buscarVendasUserLogado();
    public function buscarComprasUserLogado();
    public function criarSale(string $amount, int $product_id, int $userId);
    public function buscarVendaPorIdUserLogado(int $id);
}