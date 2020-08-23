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

<p> Aqui deve vir as opções disponiveis a clientes. Como a listagem de produtos adquiridos </p>

<a name="" id="" class="btn btn-dark mb-2" href="{{route('newProduct')}}" role="button"> Criar produtos</a>
<a name="" id="" class="btn btn-dark mb-2" href="/employee" role="button"> Gerar relatorio</a>
<a name="" id="" class="btn btn-dark mb-2" href="/employee" role="button"> Relatorio por produto</a>


@endsection
