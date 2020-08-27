<?php

namespace App\Repositories;

use Illuminate\Support\Facades\Auth;
use App\Interfaces\ISale;
use App\Sale;

class SaleRepository implements ISale
{
    protected $sale;

    public function __construct(Sale $sale)
    {
        $this->sale = $sale;
    }

    public function buscarVendasUserLogado()
    {
        $response = $this->sale::with('user', 'product.user')
                    ->join('products', function ($join) {
                        $join->on('sales.product_id', '=', 'products.id')
                            ->where('products.user_id', '=', Auth::user()->id);
                    })
                    ->select('sales.*')
                    ->get();

        return $response;
    }

    public function buscarComprasUserLogado()
    {
        $response = $this->sale::with('user', 'product.user')
                    ->join('users', function ($join) {
                        $join->on('sales.user_id', '=', 'users.id')
                            ->where('sales.user_id', '=', Auth::user()->id);
                    })
                    ->select('sales.*')
                    ->get();

        return $response;
    }

    public function criarSale(string $amount, int $product_id, int $userId)
    {
        $response = $this->sale::create([
            'amount' => $amount,
            'quantity' => 1,
            'status' => 'pending',
            'installments' => 1,
            'product_id' => $product_id,
            'user_id' => $userId
        ]);

        return $response;
    }

    public function buscarVendaPorIdUserLogado(int $id)
    {
        $response = $this->sale::join('products', function ($join) {
                        $join->on('sales.product_id', '=', 'products.id')
                            ->where('products.user_id', '=', Auth::user()->id);
                    })
                    ->where('sales.id', '=', $id)
                    ->select('sales.*');

        return $response;
    }
}