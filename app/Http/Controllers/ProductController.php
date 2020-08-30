<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Product;
use App\Http\Requests\StoreProduct;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    // Botões para os dados
    private function setDataButtons($product)
    {
        //Iniciando botões
        $btnCompartilhar = $btnExcluir = $btnExcluir = '';
        //Dados da consulta
        $dados = "data-name='" . $product->name . "'data-id='" . $product->id . "' data-slug='" . $product->slug . "' data-amount='" . $product->amount . "' ";
        $btnCompartilhar = ' <button type="button" ' . $dados . ' class="btn btnCopy btn-success btn-xs"><ion-icon name="copy-sharp"></ion-icon></button>';
        $btnEditar  = ' <button type="button" ' . $dados . ' class="btn btnEditar btn-primary btn-xs" title="Editar"><ion-icon name="create-sharp"></ion-icon></button>';
        $btnExcluir = ' <button type="button" ' . $dados . ' class="btn btnExcluir btn-danger btn-xs"><ion-icon name="trash-sharp"></ion-icon></button>';
        return $btnCompartilhar . $btnEditar . $btnExcluir;
    }

    // Listar produtos
    public function index()
    {
        $product = Product::where('user_id',Auth::user()->id)->get();
        return datatables()->of($product)
            ->editColumn('acoes', function ($product) {
                return $this->setDataButtons($product);
            })
            ->escapeColumns([0])
            ->make(true);
    }

    // Adicionar produtos
    public function store(Request $request, StoreProduct $validatorProduct)
    {

        $validatedData = $validatorProduct->validator($request);

        if (is_array($validatedData))
            if (count($validatedData))
                return response($validatedData, 422);

        // Realizando cadastro de produto
        try {
            DB::beginTransaction();
            $product = new Product();
            $product->slug = $request->slug;
            $product->name = $request->name;
            $product->amount = $request->amount;
            $product->user_id = Auth::user()->id;
            $product->save();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return response([
                'message' => 'Não foi possível cadastrar o produto, favor entrar em contato com o nosso suporte'
            ], 500);
        }
    }

    // Editar produtos
    public function update(Request $request, StoreProduct $validatorProduct)
    {
        $validatedData = $validatorProduct->validator($request);

        if (is_array($validatedData))
            if (count($validatedData))
                return response($validatedData, 422);

        // Realizando edição do produto
        try {
            DB::beginTransaction();
            $product = Product::find($request->id);
            $product->slug = $request->slug;
            $product->name = $request->name;
            $product->amount = $request->amount;
            $product->save();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return response([
                'message' => 'Não foi possível Editar o produto, favor entrar em contato com o nosso suporte'
            ], 500);
        }
    }

    // Apagando produto
    public function destroy(Request $request)
    {
        $product = Product::find($request->id);
        $product->Delete();
    }

}
