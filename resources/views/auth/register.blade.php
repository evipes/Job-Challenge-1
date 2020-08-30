@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8 ">
            <div class="card">
                <div class="card-body">
                    <form method="POST" id="form-register">
                        @csrf
                        <div class="row justify-content-center">
                            <a href="{{route('home')}}">
                                <span><img src="{{URL::asset('assets/images/logo.png')}}" alt="Logo evipes"></span>
                            </a>
                        </div>

                        @if(isset($product))
                        <input type="hidden" name="teste" value="sim">
                        <h1>Cadstre-se na plataforma</h1>
                        @endif
                        <div class="row">

                            <div class="form-group row col-lg-12">
                                <label for="name" class="col-md-12 col-form-label ">{{ __('Name') }}</label>
                                <div class="col-md-12">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row col-lg-12 justify-content-center">
                                <div class="form-check ">
                                    <input class="form-check-input" type="radio" name="type" id="cpf" value="cpf" checked>
                                    <label class="form-check-label" for="cpf">
                                        CPF
                                    </label>
                                </div>
                                <div class="form-check pl-30">
                                    <input class="form-check-input" type="radio" name="type" id="cnpj" value="cnpj">
                                    <label class="form-check-label" for="cnpj">
                                        CNPJ
                                    </label>
                                </div>
                            </div>

                            <div class="form-group row col-lg-12">
                                <div class="col-md-12">
                                    <label for="cpf" id="cpf-cnpj-label" class="col-form-label  text-md-right"></label>
                                    <input id="cpf-cnpj" type="text" required placeholder="000.000.000-00" class="form-control @error('cpf') is-invalid @enderror @error('cnpj') is-invalid @enderror " value="{{ old('cpf') }}" name="cpf">
                                    @error('cpf')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    @error('cnpj')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row col-lg-12">
                                <label for="email" class="col-md-12 col-form-label ">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-12">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row  col-lg-12">
                                <label for="password" class="col-md-12 col-form-label ">{{ __('Senha') }}</label>

                                <div class="col-md-12">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <input type="hidden" name="produto">

                            <div class="form-group row  col-lg-12">
                                <label for="password-confirm" class="col-md-12 col-form-label ">{{ __('Confirme sua senha') }}</label>

                                <div class="col-md-12">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>
                        </div>
                </div>
                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-3">
                        <button type="submit" class="btn btn-primary btn-block">
                            {{ __('Cadastrar') }}
                        </button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection