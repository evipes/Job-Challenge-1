@extends('layout')

<!-- Cabeçalho a ser exibido no topo da pagina -->
@section('cabecalho')
    NOVO PRODUTO
@endsection

<!-- Texto descritivo abaixo do cabeçalho -->
@section('cabecalho-descrit')
    Cadastro de novo produto na base de dados
@endsection

<!-- CONTEUDO PRINCIAL -->
@section('conteudo')

    <!-- Exibir erros (pendente e pre-alocado) -->

    
    <!-- Formulario para adicionar produtos -->
    @include('product.newProduct')

@endsection
