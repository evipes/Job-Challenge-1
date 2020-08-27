@extends('layout')

<!-- Cabeçalho a ser exibido no topo da pagina -->
@section('cabecalho')
    Produtos
@endsection

<!-- Texto descritivo abaixo do cabeçalho -->
@section('cabecalho-descrit')
    Produto criado com sucesso
@endsection

<!-- CONTEUDO PRINCIAL -->
@section('conteudo')

    <!-- Exibir erros (pendente e pre-alocado) -->

  <p>PRODUTO CRIADO COM SUCESSO. COLOCAR AQUI O SLUG </p>  
    <!-- Formulario para adicionar produtos -->
  

@endsection
