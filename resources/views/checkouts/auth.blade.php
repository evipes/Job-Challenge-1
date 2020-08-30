@extends('layouts.app')

@section('content')
<div class="container ">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-body">
                    <form id="form-vendas-auth">
                        <div class="row justify-content-center">
                            <h3>{{$product->name}}: R${{$product->amount}}</h3>
                        </div>
                        <!-- Dados do produto e id do users -->
                        <input type="hidden" name="product_id" value=" {{$product->id}} ">
                        <input type="hidden" name="user_id" value="{{$product->user_id}}">
                        <input type="hidden" name="amount" value="{{$product->amount}}">
                        <div class="row">
                            <div class="col-lg-6">
                                <!-- numero cartao -->
                                <div class="form-group">
                                    <label for="cardnumber">Número do cartão</label>
                                    <input type="text" class="form-control" name="cardnumber" placeholder="Número do cartão" id="cardnumber">
                                </div>
                                <!-- validade cartao -->
                                <div class="form-group">
                                    <label for="carddate">Validade</label>
                                    <input type="month" class="form-control" name="carddate" placeholder="Validade do cartão" id="carddate">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <!-- cvv cartao -->
                                <div class="form-group">
                                    <label for="cardcvv">CVV</label>
                                    <input type="password" class="form-control" placeholder="Dígito verificador" name="cardcvv" id="cardcvv">
                                </div>
                                <!-- Quantidade de parcelas -->
                                <div class="form-group">
                                    <label for="installments" class=" col-form-label">Parcelas</label>
                                    <select class="form-control" id="installments" name="installments">
                                        <option selected disabled>Selecione a quantidade de parcelas</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <button id="btn-comprar-auth" class="btn btn-primary btn-block">
                            Comprar
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>





@endsection

@section('script')
<!-- sjquery mask -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
<!-- Script de venda -->
<script src="{{ URL::asset('assets/js/checkouts/sale.js')}}"></script>
@endsection