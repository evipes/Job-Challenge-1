<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Evipes</title>

    <title>{{ config('app.name', 'Laravel') }}</title>

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
                <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <!-- Exibindo o nome -->
                    {{ Auth::user()->name }}
                </a>
                <div class="dropdown-menu " aria-labelledby="navbarDropdown">
                    <!-- Caso seja um vendedor as rotas para os paineis são diferentes -->
                    @role('vendedor')
                    <a class="dropdown-item" href="{{ route('painel-vendedor')}}">Meu painel</a>
                    @endrole
                    @role('cliente')
                    <a class="dropdown-item" href="{{ route('painel-cliente')}}">Meu painel</a>
                    @endrole
                    <div class="dropdown-divider"></div>
                    <!-- Link para deslogar caso esteja logado -->
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        <i class="fe-log-out"></i>
                        {{ __('Sair') }}
                    </a>
                </div>
            </li>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            @endguest
        </ul>
    </nav>

    <div id="app">
        <main >
            @yield('content')
        </main>
    </div>


</body>
<!-- Bootstrap -->
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

<!-- Datatables -->
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.21/datatables.min.js"></script>

<!-- sweetalert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

@yield('script')


</html>