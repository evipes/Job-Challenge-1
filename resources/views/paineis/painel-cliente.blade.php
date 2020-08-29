@extends('layouts.modelo')

@section('content')
<!-- Tabelas -->
<div class="container">

    <div class="row justify-content-center">
        <div class="col-lg-8 mt-40">
            <div class="card">

                <div class="card-body">
                    <div class="float-right">
                        <button type="button" id="btn-comprar" class="btn btn-primary">
                            Nova compra
                        </button>
                    </div>
                    <h1>Suas Compras</h1>
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
</div>
@include('modais.compra')
@endsection

@section('script')
<!-- Script compras -->
<script src="{{ URL::asset('assets/js/painel_cliente/compras.js')}}"></script>
@endsection