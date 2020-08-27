<?php

namespace App\Repositories;

use Illuminate\Support\Facades\Auth;
use App\Interfaces\IProduct;
use App\Product;

class ProductRepository implements IProduct
{
    protected $produto;

    public function __construct(Product $produto)
    {
        $this->produto = $produto;
    }

    public function buscarPorId($id)
    {
        $response = $this->produto::find($id);
        return $response;
    }
 
    public function buscarProdutosUsuarioLogado()
    {
        $response = $this->produto::where('user_id', Auth::user()->id)->orderBy('id','desc');
        return $response;
    }

    public function buscarProdutoPorIdUsuarioLogado($id)
    {
        $response = $this->produto::where(['id' => $id, 'user_id' => Auth::user()->id]);
        return $response;
    }

    public function criarProduto(string $name, string $amount)
    {
        $response = $this->produto::create([
            'name' => $name,
            'amount' => $amount,
            'user_id' => Auth::user()->id
        ]);
        return $response;
    }
}