@extends('layouts.modelo')

@section('content')
<!-- Tabelas -->
<div class="container">

    <div class="row justify-content-center">
        <div class="col-lg-8 mt-40">
            <div class="card">
                <div class="card-body">
                    <h1>Suas Compras</h1>
                    <!-- Tabela de compras -->
                    <table class="table" id="table-sales">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nome</th>
                                <th scope="col">Valor</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<!-- Script compras -->
<script src="{{ URL::asset('assets/js/painel_cliente/purchase.js')}}"></script>
@endsection