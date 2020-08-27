<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Checkout Page</title>

    <!-- Outside CDN Stylesheets -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css"
        integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
</head>

<body>

    <div id="root" class="d-flex justify-content-center align-content-center">

        <div class="card mt-2">
            <div class="card-header">
                Produto X • R$ 0,00
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
                <a href="#" class="btn btn-primary">Comprar!</a>
            </div>
        </div>

    </div>

    <!-- Outside CDN Javascript -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js"
        integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous">
    </script>
</body>

</html>
