@extends('layouts.app')

@section('content')
    <div class="container ">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-body">
                        <form  id="form-vendas">
                            <div class="row justify-content-center">
                                <h3>{{$product->name}}: R${{$product->amount}}</h3>
                            </div>
                            <!-- Dados do produto e id do users -->
                            <input type="hidden" name="product_id" value=" {{$product->id}} ">
                            <input type="hidden" name="user_id" value="{{$product->user_id}}">
                            <input type="hidden" name="amount" value="{{$product->amount}}">
                            <div class="row">
                                <div class="col-lg-6">
                                    <!-- Nome -->
                                    <div class="form-group">
                                        <label for="name">Nome</label>
                                        <input type="text" class="form-control" placeholder="Insira seu nome" name="name" id="name">
                                    </div>
                                    <!-- Email -->
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="text" class="form-control" placeholder="example@email.com" name="email" id="email">
                                    </div>
                                    <!-- estado -->
                                    <div class="form-group ">
                                        <label for="state">Estado</label>
                                        <select class="form-control" aria-label="Default select example" id="state" name="state">
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
                                    <!-- Cidade -->
                                    <div class="form-group">
                                        <label for="city">Cidade</label>
                                        <input type="text" class="form-control" placeholder="Sua cidade" name="city" id="city">
                                    </div>
                                    <!-- Bairro -->
                                    <div class="form-group">
                                        <label for="street_name">Bairro</label>
                                        <input type="text" class="form-control" placeholder="Seu bairro" name="neighborhood" id="neighborhood">
                                    </div>
                                    <!-- Rua -->
                                    <div class="form-group">
                                        <label for="street_name">Rua</label>
                                        <input type="text" class="form-control" placeholder="Sua rua" name="street_name" id="street_name">
                                    </div>
                                    <!-- casa -->
                                    <div class="form-group">
                                        <label for="street_number">Casa</label>
                                        <input type="text" class="form-control" placeholder="Número da sua casa" name="street_number" id="street_number">
                                    </div>
                                     <!-- complemento -->
                                     <div class="form-group">
                                        <label for="complement">Complemento</label>
                                        <input type="text" class="form-control" placeholder="Informação adicional" name="complement" id="complement">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <!-- CPF -->
                                    <div class="form-group">
                                        <label for="number">CPF</label>
                                        <input type="text" class="form-control" name="cpf" id="cpf">
                                    </div>
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
                                    <!-- Senha -->
                                    <div class="form-group">
                                        <label for="password">Senha</label>
                                        <input type="password" class="form-control" name="password" placeholder="Digite uma senha" id="password">
                                    </div>

                                    <!-- Confirmar senha -->
                                    <div class="form-group">
                                        <label for="password_confirmation">Confirme sua senha</label>
                                        <input type="password" class="form-control" name="password_confirmation" placeholder="Cofirme a senha" id="password_confirmation">
                                    </div>
                                    <a class="btn btn-link" href="{{ route('login') }}">
                                        {{ __('Já possue uma conta? Faça login') }}
                                    </a>
                                </div>
                            </div>
                            <button id="btn-comprar" class="btn btn-primary btn-block">
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