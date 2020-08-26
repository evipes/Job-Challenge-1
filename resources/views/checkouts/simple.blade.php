@extends('layouts.app')

@section('content')


<div id="root" class="d-flex justify-content-center align-content-center">

  <div class="card mt-2">
    <div class="card-header">
      Produto  {{$product->name}} • R$ {{$product->amount}}
    </div>
    <div class="card-body" style="min-width: 30em">
      <div class="row justify-content-center">
        <div class="col-lg-6">
          <h4>Dados pessoais</h4>
          <br>
          <div class="mb-3 row">
            <label for="name" class="col-lg-12 col-form-label">Nome</label>
            <div class="col-lg-12">
              <input type="text" class="form-control" id="name">
            </div>
          </div>
          <div class="mb-3 row">
            <label for="email" class="col-lg-12 col-form-label">Email</label>
            <div class="col-lg-12">
              <input type="text" class="form-control" id="email">
            </div>
          </div>
          <div class="mb-3 row">
            <label for="cep" class="col-lg-12 col-form-label">CEP</label>
            <div class="col-lg-12">
              <input type="text" class="form-control" id="cep">
            </div>
          </div>
          <div class="mb-3 row">
            <label for="street" class="col-lg-12 col-form-label">Rua</label>
            <div class="col-lg-12">
              <input type="text" class="form-control" id="street">
            </div>
          </div>
          <div class="mb-3 row">
            <label for="number" class="col-lg-12 col-form-label">Número</label>
            <div class="col-lg-12">
              <input type="text" class="form-control" id="number">
            </div>
          </div>
          <div class="mb-3 row">
            <label for="city" class="col-lg-12 col-form-label">Cidade</label>
            <div class="col-lg-12">
              <input type="text" class="form-control" id="city">
            </div>
          </div>
          <div class="mb-3 row">
            <label for="state" class="col-lg-12 col-form-label">Estado</label>
            <div class="col-lg-12">
              <select class="form-select" aria-label="Default select example" id="state">
                <option selected disabled>Selecione o Estado</option>
                <option value="AC">AC</option>
                <option value="AL">AL</option>
                <option value="AP">AP</option>
                <option value="AM">AM</option>
                <option value="BA">BA</option>
                <option value="CE">CE</option>
                <option value="DF">DF</option>
                <option value="ES">ES</option>
                <option value="GO">GO</option>
                <option value="MA">MA</option>
                <option value="MT">MT</option>
                <option value="MS">MS</option>
                <option value="MG">MG</option>
                <option value="PA">PA</option>
                <option value="PB">PB</option>
                <option value="PR">PR</option>
                <option value="PE">PE</option>
                <option value="PI">PI</option>
                <option value="RJ">RJ</option>
                <option value="RN">RN</option>
                <option value="RS">RS</option>
                <option value="RO">RO</option>
                <option value="RR">RR</option>
                <option value="SC">SC</option>
                <option value="SP">SP</option>
                <option value="SE">SE</option>
                <option value="TO">TO</option>
              </select>
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <h4>Dados de pagamento</h4>
          <br>
          <div class="mb-3 row">
            <label for="cardnumber" class="col-lg-12 col-form-label">Número Cartão</label>
            <div class="col-lg-12">
              <input type="text" class="form-control" id="cardnumber">
            </div>
          </div>
          <div class="mb-3 row">
            <label for="carddate" class="col-lg-12 col-form-label">Data de Validade</label>
            <div class="col-lg-12">
              <input type="text" class="form-control" id="carddate">
            </div>
          </div>
          <div class="mb-3 row">
            <label for="cardcvv" class="col-lg-12 col-form-label">CVV</label>
            <div class="col-lg-12">
              <input type="password" class="form-control" id="cardcvv">
            </div>
          </div>
        </div>
        <a href="#" class="btn btn-primary">Comprar!</a>
      </div>
    </div>
  </div>

</div>

<!-- Outside CDN Javascript -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous">
</script>
@endsection