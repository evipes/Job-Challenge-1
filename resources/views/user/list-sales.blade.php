@extends('layout')

<!-- Cabeçalho a ser exibido no topo da pagina -->
@section('cabecalho')
Vendedores/Users
@endsection

<!-- Texto descritivo abaixo do cabeçalho -->
@section('cabecalho-descrit')
Area de acesso a endedores cadastrados
@endsection

<!-- CONTEUDO PRINCIAL -->
@section('conteudo')

<a name="" id="" class="btn btn-dark mb-2" href="{{route('newProduct')}}" role="button"> Criar produtos</a>


   <!--  Impressão da lista de cliente  -->
<ul class="list-group">
    @foreach($products as $product)
        <li class="list-group-item d-flex justify-content-between align-items-center">
        <span id="product-name-{{$product->id}}">{{$product->name}}</span>
        <span id="product-slug-{{$product->id}}">Quantidade vendida: {{($product->sold)}}</span>

         <!-- Icones de cada Produto -->

        </li>
    @endforeach
</ul>


@endsection
