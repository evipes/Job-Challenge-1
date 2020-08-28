@extends('layout')

<!-- Cabeçalho a ser exibido no topo da pagina -->
@section('cabecalho')
    NOVO CLIENTE
@endsection

<!-- Texto descritivo abaixo do cabeçalho -->
@section('cabecalho-descrit')
    Cadastro de novo cliente
@endsection

<!-- CONTEUDO PRINCIAL -->
@section('conteudo')

    <!-- Exibir erros -->
    @include('subviews.responseError',['errors'=>$errors])
    
    <!-- Formulario para adicionar produtos -->
    @include('user.newUser')

@endsection
