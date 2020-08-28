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
   <p> Seu icone de acesso para vendas é: { {{url('checkout/'.$slug)}} }</p>
  
<ul class="list-group">
    @foreach($buyers as $key=>$buyer)
        <li class="list-group-item d-flex justify-content-between align-items-center">
        <span id="buyer-name">{{$buyer}}</span>
        <span id="product-status">Status: {{ $status[$key] }}</span>

         <!-- Icones de cada Produto -->

        </li>
    @endforeach
</ul>


@endsection
