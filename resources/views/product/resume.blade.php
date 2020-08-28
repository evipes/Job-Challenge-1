@extends('layout')

<!-- Cabeçalho a ser exibido no topo da pagina -->
@section('cabecalho')
    Produto
@endsection

<!-- Texto descritivo abaixo do cabeçalho -->
@section('cabecalho-descrit')
    Informações do seu produto até o momento
@endsection

<body>
    @include('subviews.client_navbar')
      <div id="root" class="d-flex justify-content-center align-content-center">
  
          <div class="card mt-2">
              <div class="card-header">
                  {{$product->name}} • R$ {{$product->amount}}
              </div>
              <div class="card-body" style="min-width: 30em">
                  <h4>1. Dados pessoais</h4>
                  <br>
                  <div class="mb-3 row">
                      <label for="name" class="col-sm-3 col-form-label">Nome</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="name">
                      </div>
                    </div>
                    <div class="mb-3 row">
                      <label for="email" class="col-sm-3 col-form-label">Email</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="email">
                      </div>
                    </div>
                    <div class="mb-3 row">
                      <label for="cep" class="col-sm-3 col-form-label">CEP</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="cep">
                      </div>
                    </div>
                    <div class="mb-3 row">
                      <label for="street" class="col-sm-3 col-form-label">Rua</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="street">
                      </div>
                    </div>
                    <div class="mb-3 row">
                      <label for="number" class="col-sm-3 col-form-label">Número</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="number">
                      </div>
                    </div>
                    <div class="mb-3 row">
                      <label for="city" class="col-sm-3 col-form-label">Cidade</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="city">
                      </div>
                    </div>
                    <div class="mb-3 row">
                      <label for="state" class="col-sm-3 col-form-label">Estado</label>
                      <div class="col-sm-9">
                          <select class="form-select" aria-label="Default select example" id="state">
                            @include('subviews.states')
                          </select>
                      </div>
                    </div>
                    <br><hr><br>
                    <h4>2. Dados de pagamento</h4>
                    <br>
                    <div class="mb-3 row">
                      <label for="cardnumber" class="col-sm-3 col-form-label">Número Cartão</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="cardnumber">
                      </div>
                    </div>
                    <div class="mb-3 row">
                      <label for="carddate" class="col-sm-3 col-form-label">Data de Validade</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="carddate">
                      </div>
                    </div>
                    <div class="mb-3 row">
                      <label for="cardcvv" class="col-sm-3 col-form-label">CVV</label>
                      <div class="col-sm-9">
                        <input type="password" class="form-control" id="cardcvv">
                      </div>
                    </div>
                  <a href="route{{'checkout_sell'}}" class="btn btn-primary">Comprar!</a>
              </div>
          </div>
  
      </div>