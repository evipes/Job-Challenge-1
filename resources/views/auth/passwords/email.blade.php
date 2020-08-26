@extends('layouts.app')

@section('content')
<div class="container mt-60">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">

                <div class="card-body mt-20">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf
                        <div class="row justify-content-center">
                            <span><img src="{{URL::asset('assets/images/logo.png')}}" alt="Logo evipes"></span>
                        </div>

                        <div class="form-group row mt-20">
                            <label for="email" class="col-md-12 col-form-label">{{ __('Endereço de email') }}</label>

                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0 justify-content-center">
                            <div class="col-md-8">
                                <button type="submit" class="btn btn-primary btn-block">
                                    {{ __('Enviar link para recuperar senha') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection