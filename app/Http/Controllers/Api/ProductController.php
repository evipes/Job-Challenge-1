<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Product;
use Validator;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produtos = Product::where('user_id', Auth::user()->id)->orderBy('id','desc')->get();
        return response()->json([
            'status' => 'success',
            'produtos' => $produtos
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validar = Validator::make($request->all(), [
            'name' => 'required',
            'amount' => 'required',
        ]);

        if ($validar->fails()) {
            return response()->json($validar->errors(), 422);
        }

        $produto = new Product([
            'name' => $request->name,
            'amount' => $request->amount,
            'user_id' => Auth::user()->id
        ]);
        $produto->save();
        return response()->json([
            'status' => 'success',
            'produto' => $produto
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validar = Validator::make($request->all(), [
            'name' => 'required',
            'amount' => 'required',
        ]);

        if ($validar->fails()) {
            return response()->json($validar->errors(), 422);
        }
        $produto = Product::where(['id' => $id, 'user_id' => Auth::user()->id]);

        if ($produto->get() == null) {
            return response()->json(['message' => 'Produto não existe'], 422);
        }
        $produto->update($request->all());
        return response()->json([
            'status' => 'success',
            'produto' => $produto->get()
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produto = Product::where(['id' => $id, 'user_id' => Auth::user()->id]);

        if ($produto->get() == null) {
            return response()->json(['message' => 'Produto não existe'], 422);
        }

        $produto->delete();
        return response()->json([
            'status' => 'success'
        ]);
    }
}
