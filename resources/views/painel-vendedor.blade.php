<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Evipes</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link href="{{ asset('assets/css/layout.css') }}" rel="stylesheet">

    <!-- Datatables -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.21/datatables.min.css" />
    <!-- Tolen -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

</head>

<body>
    <!-- Navbar -->
    <nav id="navbar-example2" class="navbar navbar-dark bg-primary">
        <a class="navbar-brand" href="{{route('home')}}">Evipes</a>
        <ul class="nav nav-pills ">
            @guest
            @if (Route::has('register'))
            <li class="nav-item">
                <a class="nav-link text-white" href="{{ route('register') }}">{{ __('Cadastre-se') }}</a>
            </li>
            @endif
            <li class="nav-item">
                <a class="nav-link text-white" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
            @else
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Dropdown
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link text-white" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    <i class="fe-log-out"></i>
                    {{ __('Sair') }}
                </a>
            </li>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            @endguest
        </ul>
    </nav>
    <!-- Navbar -->
    <!-- Tabelas -->
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <h1>Produtos</h1>
                    <div class="float-right">
                        <button type="button" id="btn-adicionar" class="btn btn-primary">
                            Adicionar</button>
                    </div>
                    <!-- Tabela de produtos -->
                    <table class="table" id="table-products">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Código</th>
                                <th scope="col">Nome</th>
                                <th scope="col">Valor</th>
                                <th scope="col">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                        <!-- Tabela de produtos -->
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <h1>Vendas</h1>
                    <!-- Tabela de produtos -->
                    <table class="table" id="table-sales">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Identificador</th>
                                <th scope="col">Valor</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                        <!-- Tabela de produtos -->
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal de produto -->
    @include('modais.produto')


</body>
<!-- Bootstrap -->
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

<!-- Datatables -->
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.21/datatables.min.js"></script>

<!-- sweetalert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

<!-- Script icons -->
<script src="https://unpkg.com/ionicons@5.1.2/dist/ionicons.js"></script>

<!-- Script produto -->
<script src="{{ URL::asset('assets/js/painel_vendedor/produto.js')}}"></script>

<!-- Script vendas -->
<script src="{{ URL::asset('assets/js/painel_vendedor/vendas.js')}}"></script>

</html>