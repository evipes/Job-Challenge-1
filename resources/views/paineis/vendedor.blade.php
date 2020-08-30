@extends('layouts.modelo')

@section('content')
<!-- Tabelas -->
<div class="container">

    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <h1>Seus Produtos</h1>
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
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-8 mt-40">
            <div class="card">
                <div class="card-body">
                    <h1>Suas Vendas</h1>
                    <!-- Tabela de vendas -->
                    <table class="table" id="table-sales">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nome do produto</th>
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
<!-- Modal de produto -->
@include('modais.product')
@endsection

@section('script')
<!-- sjquery mask -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
<!-- Script produto -->
<script src="{{ URL::asset('assets/js/painel_vendedor/product.js')}}"></script>

<!-- Script vendas -->
<script src="{{ URL::asset('assets/js/painel_vendedor/sales.js')}}"></script>
@endsection