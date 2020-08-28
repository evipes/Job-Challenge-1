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
    
    <!-- Formulario de cadastro para novos usuarios -->
    <form method="post">
        @csrf

            <div class="form">
            
                <!-- INFORMAÇÕES PESSOAIS -->
                @include('user.userDocuments')
        
                <!-- ENDEREÇO E CONTATO -->    
                @include('user.userAdress')

            </div>

            <button class="btn btn-primary mt-2">SALVAR</button>
        
    </form>

@endsection
