@extends('layout')

<!-- Cabeçalho a ser exibido no topo da pagina -->
@section('cabecalho')
Olá, seja bem vindo 
@endsection

<!-- Texto descritivo abaixo do cabeçalho -->
@section('cabecalho-descrit')
Area de acesso principal (Index)
@endsection

<!-- CONTEUDO PRINCIAL -->
@section('conteudo')
    <a name="" id="" class="btn btn-dark mb-2" href="/user" role="button">Secção de vendedores</a>
    <a name="" id="" class="btn btn-dark mb-2" href="/user" role="button">Secção para clientes</a>
    <a name="" id="" class="btn btn-dark mb-2" href="{{route('newUser')}}" role="button">New Users</a>
@endsection
