@extends('layouts.modelo')

@section('content')

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

<!-- Sobre nós -->
<div class="jumbotron ">
    <h1 class="display-4">Quem somos nós?</h1>
    <hr class="my-4">
    <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information. This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information. This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information. This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information. This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
</div>

<div class="container">
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
</div>
@endsection