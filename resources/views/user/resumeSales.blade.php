@extends('layout')

<!-- Cabeçalho a ser exibido no topo da pagina -->
@section('cabecalho')
Compras
@endsection

<!-- Texto descritivo abaixo do cabeçalho -->
@section('cabecalho-descrit')
Lista de itens comprados
@endsection

<!-- CONTEUDO PRINCIAL -->
@section('conteudo')
    <a name="" id="" class="btn btn-dark mb-2" href="{{route('newProduct')}}" role="button"> Criar produtos</a>  
    <ul class="list-group">
        @foreach($sales as $key=>$sale)
            <li class="list-group-item d-flex justify-content-between align-items-center">
            <span id="product-name">{{$product[$key]}}</span>
            <span id="product-value">Valor: {{ $sale->amount }}</span>
            </li>
        @endforeach
    </ul>
@endsection
