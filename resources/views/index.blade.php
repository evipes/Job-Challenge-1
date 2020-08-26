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

</head>

<body>
    <!-- Navbar -->
    <nav id="navbar-example2" class="navbar navbar-dark bg-primary">
        <a class="navbar-brand" href="#">Evipes</a>
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

    <!-- Carrossel -->
    <div id="carouselExampleControls" class="carousel slide mb-20" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{URL::asset('assets/images/carrossel-1.jpg')}}" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="{{URL::asset('assets/images/carrossel-2.jpg')}}" class="d-block w-100" alt="...">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <!-- Carrossel -->

    <!-- Sobre nós -->
    <div class="jumbotron ">
        <h1 class="display-4">Quem somos nós?</h1>
        <hr class="my-4">
        <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information. This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information. This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information. This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information. This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
    </div>
    <!-- Sobre nós -->

    <!-- Planos -->
    <h1 class="display-4 text-center">Conheça nossos planos</h1>

    <div class="row row-cols-1 row-cols-md-3 mt-20 planos">
        <div class="col mb-4">
            <div class="card">
                <img src="{{URL::asset('assets/images/micro.jpg')}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title text-success">MICRO-EMPREENDEDOR</h5>
                    <a href="#" class="btn btn-success">Conheça</a>
                </div>
            </div>
        </div>
        <div class="col mb-4">
            <div class="card">
                <img src="{{URL::asset('assets/images/startup.jpg')}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title text-warning">STARTUP</h5>
                    <a href="#" class="btn btn-warning">Conheça</a>
                </div>
            </div>
        </div>
        <div class="col mb-4">
            <div class="card">
                <img src="{{URL::asset('assets/images/empresa.jpg')}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title text-info">EMPRESA</h5>
                    <a href="#" class="btn btn-info">Conheça</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Planos -->
</body>
<!-- Bootstrap -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

</html>