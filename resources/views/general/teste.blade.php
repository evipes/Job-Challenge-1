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

<p> String de Teste 2: {{$teste2}}</p>

@endsection
