<template>
  <div class="tela-checkout">
    <div
      class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 Menu-checkout text-white"
    >
      <img src="../assets/img/logo-1.png" style="max-height: 50px" alt />
      <h5 class="my-0 mr-md-auto font-weight-normal"></h5>
      <nav class="my-2 my-md-0 mr-md-3"></nav>
      <router-link
        class="btn btn-outline-success text-white"
        to="/"
      >Login</router-link>
    </div>

    <div class="topo">
      <div class="container">
        <div class="row" v-show="carregando">
          <div class="container text-center h1">
            <i class="fas fa-spinner fa-spin"></i>
            Buscando produto...
          </div>
        </div>

        <div class="justify-content-center" v-show="!carregando">
          <div class="row">
            <div class="col-7">
              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      <th colspan="2" class="h2 text-white text-center">PRODUTO</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th>
                        <span class="h4 text-white text-center">
                          Descrição:
                          
                        </span>
                      </th>
                      <th>
                        <span class="h4 text-white text-center">
                          Valor:
                          <b>
                            {{
                            produto.amount
                            | FormatMoney
                            }}
                          </b>
                        </span>
                      </th>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="col-5">
              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      <th colspan="2" class="h2 text-white text-center">VENDEDOR</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th>
                        <span class="h6 text-white text-center">
                          Nome:
                          <b>
                            {{
                            produto.user.name
                            | strToUpper
                            }}
                          </b>
                        </span>
                      </th>
                      <th>
                        <span class="h6 text-white text-center">
                          E-mail:
                          <b>
                            {{
                            produto.user.email
                            }}
                          </b>
                        </span>
                      </th>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="conteudo" v-show="!carregando && !pedido">
      <div class="container">
        <div class="card shadow">
          <form @submit.prevent="EnviarPedido()" v-show="!salvando">
            <div class="row pl-20 pr-20">
              <div class="col-md-6">
                <div class="justify-content-center align-content-center">
                  <div class="card">
                    <div class="card-body">
                      <h4>1. Dados pessoais</h4>
                      <br />

                      <div class="form-group">
                        <label for="name">Nome</label>
                        <input
                          type="text"
                          class="form-control t-input"
                          id="name"
                          required
                          v-model="form.name"
                          :class="{'is-invalid': form.errors.has('name')}"
                        />
                        <has-error :form="form" field="name"></has-error>
                      </div>

                      <div class="form-group">
                        <label for="Email">Email</label>
                        <input
                          type="email"
                          class="form-control t-input"
                          id="email"
                          required
                          v-model="form.email"
                          :class="{'is-invalid': form.errors.has('email')}"
                        />
                        <has-error :form="form" field="email"></has-error>
                      </div>

                      <div class="form-group">
                        <label for="CEP">CEP</label>
                        <input 
                          type="text"
                          v-on:keyup="buscarCep()"
                          class="form-control t-input"
                          id="cep"
                          v-mask="maskCEP"
                          required
                          v-model="form.cep"
                          
                          :class="{'is-invalid': form.errors.has('cep')}"
                        />
                        <has-error :form="form" field="cep"></has-error>
                      </div>

                      <div class="form-group">
                        <label for="street">Rua</label>
                        <input
                          type="text"
                          class="form-control t-input"
                          id="street"
                          required
                          v-model="form.street"
                          :class="{'is-invalid': form.errors.has('street')}"
                        />
                        <has-error :form="form" field="street"></has-error>
                      </div>

                      <div class="form-group">
                        <label for="neighborhood">Bairro</label>
                        <input
                          type="text"
                          class="form-control t-input"
                          id="neighborhood"
                          required
                          v-model="form.neighborhood"
                          :class="{'is-invalid': form.errors.has('neighborhood')}"
                        />
                        <has-error :form="form" field="neighborhood"></has-error>
                      </div>

                      <div class="form-group">
                        <label for="number">Número</label>
                        <input
                          type="text"
                          class="form-control t-input"
                          id="number"
                          required
                          v-model="form.number"
                          :class="{'is-invalid': form.errors.has('number')}"
                        />
                        <has-error :form="form" field="number"></has-error>
                      </div>

                      <div class="form-group">
                        <label for="city">Cidade</label>
                        <input
                          type="text"
                          class="form-control t-input"
                          id="city"
                          required
                          v-model="form.city"
                          :class="{'is-invalid': form.errors.has('city')}"
                        />
                        <has-error :form="form" field="city"></has-error>
                      </div>

                      <div class="form-group">
                        <label for="state">Estado</label>
                        <select
                          class="form-control t-input"
                          aria-label="Default select example"
                          id="state"
                          required
                          v-model="form.state"
                          :class="{'is-invalid': form.errors.has('state')}"
                        >
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
                        <has-error :form="form" field="state"></has-error>
                      </div>
                    </div>
                  </div>
                </div>
                <br />
              </div>

              <div class="col-md-6">
                <div class="card">
                  <div class="card-body">
                    <h4>2. Dados de pagamento</h4>
                    <br />

                    <div class="form-group">
                      <label for="cardnumber">Número Cartão</label>
                      <input type="number" class="form-control t-input" id="cardnumber" required />
                    </div>

                    <div class="form-group">
                      <label for="carddate">Data de Validade</label>
                      <vue-mask
                        mask="00/0000"
                        placeholder="08/2020"
                        type="text"
                        class="form-control t-input"
                        id="carddate"
                        required
                      />
                    </div>

                    <div class="form-group">
                      <label for="cardcvv">CVV</label>
                      <vue-mask
                        mask="000"
                        placeholder="123"
                        type="text"
                        class="form-control t-input"
                        id="cardcvv"
                        required
                      />
                    </div>

                    <button class="btn btn-primary btn-block t-input">Comprar!</button>
                  </div>
                </div>
              </div>
            </div>
          </form>

          <div class="row" v-show="salvando">
            <div class="container text-center h1">
              <i class="fas fa-spinner fa-spin"></i>
              Salvando...
            </div>
          </div>
        </div>
      </div>
    </div>

<div class="conteudo" v-show="pedido">
      <div class="container">
        <div class="card shadow">
          <div class="align-content-center text-center h3">
           <h2>Pedido realizado com sucesso!</h2>  <br>
            <h2 v-show="senha > 0">Sua senha é: <b>{{senha}}</b></h2>  <br>
            <router-link  to="/" class="btn btn-success">Acessar area do cliente</router-link>
          </div>
        </div>
        </div>
        </div>


  </div>
</template>

<script>
export default {
  data() {
    return {
      maskCEP: "#####-###",
      carregando: true,
      pedido: false,
      salvando: false,
      senha: 0,
      produto: {},
      form: new Form({
        name: "",
        email: "",
        cep: "",
        street: "",
        number: "",
        city: "",
        state: "",
        neighborhood: "",
        amount: "",
        quantity: 1,
        installments: 1,
        product_id: "",
      }),
    };
  },
  methods: {
    BuscadProdutos() {
      axios
        .get("/checkout/" + this.$route.params.slug)
        .then((res) => {
          this.produto = res.data.produto;
          
          this.carregando = false;
        })
        .catch((e) => {
          this.$swal("", "Produto não encontrado..." + e);
          this.carregando = false;
        });
    },
    EnviarPedido() {
      this.salvando = true;
      this.form.product_id = this.produto.id;
      axios
        .post("/saler", this.form)
        .then((res) => {
          this.pedido = true;
          this.salvando = false;
          this.senha = res.data.senha;
        })
        .catch((e) => {
          this.$swal("", "Erro ao enviar o pedido..." + e);
          this.salvando = false;
        });
    },
    buscarCep() {
      
      if (this.form.cep.length > 7) {
        axios
          .get("https://viacep.com.br/ws/" + this.form.cep + "/json/")
          .then((res) => {
            this.form.street = res.data.logradouro;
            this.form.city = res.data.localidade;
            this.form.neighborhood = res.data.bairro;
          })
          .catch((e) => {
            console.log(e);
          });
      }
    },
  },
  mounted() {
    this.BuscadProdutos();
  },
};
</script>

<style lang="css">
.tamanho-card {
  min-width: 35em
}
.Menu-checkout {
  background: #ff6688 !important;
}
.texto-pdf-red {
  color: rgb(238, 71, 71);
}
.modal-header {
  background: #fd547a;
  color: aliceblue;
}

.topo {
  background: #fd547a;
  position: absolute;
  width: 100%;
  padding-bottom: 35px;
}
.logo {
  display: block;
  margin-left: auto;
  margin-right: auto;
  max-height: 150px;
  padding-bottom: 15px;
}
.conteudo {
  position: absolute;
  width: 100%;
  margin-top: 110px;
  margin-bottom: 10px;
  z-index: 0;
}

.rodape {
  background: #fd547a;
  position: absolute;
  width: 100%;
  bottom: 0;
  z-index: -1;
}

@media only screen and (max-width: 600px) {
  .topo {
    background: #fd547a;
    width: 100% !important;
    height: 50%;
  }
  .tamanho-card {
  max-width: 22em
}
  .logo {
    display: block;
    margin-left: auto;
    margin-right: auto;
    max-height: 75px;
  }
  .conteudo {
    position: absolute;
    width: 100%;
    margin-top: 230px;
    z-index: 0;
  }
  .t-input {
    max-width: 100% !important;
  }
  #EsconderMobile {
    display: none !important;
  }
}
</style>
