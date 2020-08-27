<template>
  <div class="tela-painel">
    <br />
    <div class="row">
      <div class="col">
        <h3 class="m-0 font-weight-bold" style="float: left!important">Painel</h3>
      </div>
      <div class="col">
        <span style="float: right!important">
          Olá
          <b>{{ $auth.user().name }}</b>
        </span>
      </div>
    </div>
    <div class="row">
      <div class="col-xl-3 col-md-6 mb-4" v-show="$auth.check('seller')">
        <div
          class="card text-white bg-secondary mb-3 border-left-primary shadow-sm p-3 mb-5 rounded"
        >
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-white text-uppercase mb-1">Qtd. Produtos</div>
                <div class="h2 mb-0 font-weight-bold text-gray-800">{{QtdProdutos.length}}</div>
              </div>
              <div class="col-auto">
                <i class="fab fa-product-hunt fa-3x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-4 col-md-6 mb-4" v-show="Compras.length > 0">
        <div
          class="card text-white bg-secondary mb-3 border-left-primary shadow-sm p-3 mb-5 rounded"
        >
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-white text-uppercase mb-1">Compras - {{Compras.length}}UN</div>
                <div class="h2 mb-0 font-weight-bold text-gray-800">
                  <b>Valor</b>
                  : {{Total_Compras | FormatMoney }}
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-5 col-md-6 mb-4" v-show="$auth.check('seller')">
        <div
          class="card text-white bg-secondary mb-3 border-left-primary shadow-sm p-3 mb-5 rounded"
        >
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-white text-uppercase mb-1">Total de vendas - {{Vendas.length}}UN</div>
                <div class="h2 mb-0 font-weight-bold text-gray-800">
                  <b>Valor</b>
                  : {{Total_Vendas | FormatMoney }}
                </div>
              </div>
              <div class="col-auto">
                <i class="fas fa-dollar-sign fa-3x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>


      <div class="col-xl-8 col-md-8 mb-4" v-show="$auth.check('client')">
        <div class="card text-white bg-secondary mb-3 border-left-primary shadow-sm p-3 mb-5 rounded">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-white text-uppercase mb-1">Clique no botão abaixo para começar a vender tambem!</div>
                <div class="h2 mb-0 font-weight-bold text-gray-800">
                  <button type="button" class="btn btn-warning btn-block" @click="alertQuero()">Quero vender</button>
                </div>
              </div>
              <div class="col-auto">
                <i class="fas fa-dollar-sign fa-3x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>

    <div class="row" v-show="$auth.check('seller')">
      <div class="col-12">
        <div class="shadow-sm p-3 mb-2 bg-white rounded">
          <div class="card-body">
            <h5 class="card-title">Suas vendas</h5>
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Produto</th>
                    <th scope="col">Cliente</th>
                    <th scope="col">Valor</th>
                    <th scope="col">Status</th>
                    <th scope="col">Data</th>
                    <th scope="col">Opção</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="d in Vendas" :key="d.id">
                    <td>{{d.id}}</td>
                    <td>{{d.product.name}}</td>
                    <td>{{d.user.name}}</td>
                    <td>{{d.amount | FormatMoney}}</td>
                    <td>
                      <h2 class="badge badge-primary" v-if="d.status == 'pending'">Pendente</h2>
                      <h2 class="badge badge-success" v-else-if="d.status == 'approved'">Aprovado</h2>
                      <h2 class="badge badge-dark" v-else>Rejeitado</h2>
                    </td>
                    <td>{{d.created_at | formatDate}}</td>
                    <td>
                      <div class="btn-group mr-2" role="group" aria-label="First group">
                        <button class="btn btn-secondary" @click="modalUpdate(d)">
                          <i class="fas fa-edit"></i>
                        </button>
                      </div>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>

    <hr />
    <div class="row" v-show="Compras.length > 0">
      <div class="col-12">
        <div class="shadow-sm p-3 mb-2 bg-white rounded">
          <div class="card-body">
            <h5 class="card-title">Suas compras</h5>
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Produto</th>
                    <th scope="col">Vendedor</th>
                    <th scope="col">Valor</th>
                    <th scope="col">Status</th>
                    <th scope="col">Data</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="d in Compras" :key="d.id">
                    <td>{{d.id}}</td>
                    <td>{{d.product.name}}</td>
                    <td>{{d.product.user.name}}</td>
                    <td>{{d.amount | FormatMoney}}</td>
                    <td>
                      <h2 class="badge badge-primary" v-if="d.status == 'pending'">Pendente</h2>
                      <h2 class="badge badge-success" v-else-if="d.status == 'approved'">Aprovado</h2>
                      <h2 class="badge badge-dark" v-else>Rejeitado</h2>
                    </td>
                    <td>{{d.created_at | formatDate}}</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div
      class="modal fade"
      id="modalup"
      tabindex="-1"
      role="dialog"
      aria-labelledby="modaladdLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modaladdLabel">Atualizar pedido</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form @submit.prevent="AtualizarStatus()">
            <div class="modal-body">
              <div class="form-group">
                <label for="exampleFormControlSelect1">Selecione o status</label>
                <select
                  class="form-control"
                  v-model="form.status"
                  id="exampleFormControlSelect1"
                  :class="{'is-invalid': form.errors.has('status')}"
                >
                  <option value="pending" :selected="form.status == 'pending'">Pendente</option>
                  <option value="approved" :selected="form.status == 'approved'">Aprovado</option>
                  <option value="rejected" :selected="form.status == 'rejected'">Rejeitado</option>
                </select>
                <has-error :form="form" field="status"></has-error>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
              <button class="btn btn-primary" v-show="!salvando">Salvar</button>
              <button class="btn btn-primary" disabled v-show="salvando">Salvando</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      salvando: false,
      QtdProdutos: [],
      Vendas: [],
      Compras: [],
      Total_Compras: 0,
      Total_Vendas: 0,
      form: new Form({
        status: "",
      }),
    };
  },
  methods: {
    BuscadProdutos() {
      axios
        .get("/products", {
          headers: {
            authorization:
              "Bearer " + localStorage.getItem("auth_token_default"),
          },
        })
        .then((res) => {
          this.QtdProdutos = res.data.produtos;
        });
    },
    BuscadVendas(){
      axios
        .get("/saler", {
          headers: {
            authorization:
              "Bearer " + localStorage.getItem("auth_token_default"),
          },
        })
        .then((res) => {
          this.Vendas = res.data.sales;
          this.Total_Vendas = res.data.sales_total;
          this.Compras = res.data.shopping;
          this.Total_Compras = res.data.shopping_total;
        });
    },
    modalUpdate(item) {
      this.form.reset();
      this.form.status = item.status;
      this.form.id = item.id;
      $("#modalup").modal("show");
    },
    AtualizarStatus() {
      this.salvando = true;
      this.form
        .put("/saler/" + this.form.id, {
          headers: {
            authorization:
              "Bearer " + localStorage.getItem("auth_token_default"),
          },
        })
        .then((res) => {
          $("#modalup").modal("hide");
          this.$swal("", "Pedido atualizado com sucesso! ");
          this.salvando = false;
          this.BuscadVendas();
        })
        .catch((e) => {
          this.$swal("", "Error......" + e);
          this.salvando = false;
        });
    },
    alertQuero(){
      this.$swal({
          title: 'Deseja torna-se vendedor?',
          type: 'warning',
          showCancelButton: true,
          confirmButtonText: 'Sim',
          cancelButtonText: 'Não',
          showCloseButton: true,
          showLoaderOnConfirm: true
        }).then((result) => {
          if(result.value) {
            this.QueroVender();
            this.$swal('Agora você pode vender seus produtos', '', 'success')
          }
        })
    },
    QueroVender(){
      axios
        .put("/user", {
          headers: {
            authorization:
              "Bearer " + localStorage.getItem("auth_token_default"),
          },
        })
        .then((res) => {
          console.log(res);
          location.reload();
        });
    },
  },
  mounted() {
    this.BuscadProdutos();
    this.BuscadVendas();
  },
};
</script>
