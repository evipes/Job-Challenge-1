<template>
  <div class="tela-produto">
    <br />
    <div class="row">
      <div class="col">
        <h3 class="m-0 font-weight-bold" style="float: left!important">Produtos</h3>
      </div>
      <div class="col">
        <h1 style="float: right!important">
          <button type="button" class="btn btn-dark" @click="modalAdd()">Adicionar</button>
        </h1>
      </div>
    </div>

    <div class="shadow-sm p-3 mb-5 bg-white rounded">
      <div class="card-body">
        
        <div class="table-responsive">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Slug</th>
              <th scope="col">Link</th>
              <th scope="col">Nome</th>
              <th scope="col">Valor</th>
              <th scope="col">Dt. Criação</th>
              <th scope="col">Dt. Atualização</th>
              <th scope="col">Opção</th>
            </tr>
          </thead>
          <tbody>
            <tr v-show="carregando">
              <td colspan="7" class="text-center">
                <i class="fas fa-spinner fa-spin"></i>
                buscando...
              </td>
            </tr>
            <tr v-for="d in dados" :key="d.id">
              <th scope="row">{{d.id}}</th>
              <td>{{d.slug}}</td>
              <td> <router-link :to="{name: 'Checkout', params: {slug: d.slug}}" target= '_blank'>Chekount</router-link></td>
              <td>{{d.name}}</td>
              <td>{{d.amount | FormatMoney }}</td>
              <td>{{d.created_at | formatDate}}</td>
              <td>{{d.updated_at | formatDate }}</td>
              <td>
                <div class="btn-group mr-2" role="group" aria-label="First group">
                <button class="btn btn-secondary" @click="modalUpdate(d)"><i class="fas fa-edit"></i></button>
                <button class="btn btn-danger" @click="alertDelete(d.id)"><i class="fas fa-trash"></i></button>
                </div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
      </div>
    </div>

    <!-- Modal -->
    <div
      class="modal fade"
      id="modaladd"
      tabindex="-1"
      role="dialog"
      aria-labelledby="modaladdLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modaladdLabel">Cadastrar produto</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form @submit.prevent="CadastrarProduto()">
            <div class="modal-body">
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text icone-input" id="basic-addon1">
                    <i class="fas fa-bullhorn"></i>
                  </span>
                </div>
                <input
                  v-model="form.name"
                  type="text"
                  class="form-control"
                  placeholder="Nome do produto"
                  name="name"
                  aria-label="text"
                  aria-describedby="basic-addon1"
                  required
                  :class="{'is-invalid': form.errors.has('name')}"
                />
                <has-error :form="form" field="name"></has-error>
              </div>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text icone-input" id="basic-addon1">
                    <i class="fas fa-dollar-sign"></i>
                  </span>
                </div>
                <input
                  v-model="form.amount"
                  type="number"
                  class="form-control"
                  placeholder="Valor do produto"
                  name="amount"
                  aria-label="text"
                  aria-describedby="basic-addon1"
                  required
                  step="0.01" min="0" lang="pt-br"
                  :class="{'is-invalid': form.errors.has('amount')}"
                />
                <has-error :form="form" field="amount"></has-error>
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
            <h5 class="modal-title" id="modaladdLabel">Cadastrar produto</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form @submit.prevent="AtualizarProduto()">
            <div class="modal-body">
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text icone-input" id="basic-addon1">
                    <i class="fas fa-bullhorn"></i>
                  </span>
                </div>
                <input
                  v-model="formUp.name"
                  type="text"
                  class="form-control"
                  placeholder="Nome do produto"
                  name="text"
                  aria-label="text"
                  aria-describedby="basic-addon1"
                  required
                  :class="{'is-invalid': formUp.errors.has('name')}"
                />
                <has-error :form="formUp" field="name"></has-error>
              </div>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text icone-input" id="basic-addon1">
                    <i class="fas fa-dollar-sign"></i>
                  </span>
                </div>
                <input
                  v-model="formUp.amount"
                  type="number"
                  class="form-control"
                  placeholder="Valor do produto"
                  name="amount"
                  aria-label="text"
                  aria-describedby="basic-addon1"
                  required
                  step="0.01" min="0" lang="pt-br"
                  :class="{'is-invalid': formUp.errors.has('amount')}"
                />
                <has-error :form="formUp" field="amount"></has-error>
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
      carregando: true,
      salvando: false,
      dados: {},
      form: new Form({
        name: "",
        amount: "",
      }),
      formUp: new Form({
        name: "",
        amount: "",
        id: "",
      }),
    };
  },
  methods: {
    modalAdd() {
      this.form.reset();
      $("#modaladd").modal("show");
    },
    modalUpdate(item) {
      this.formUp.reset();
      this.formUp.name = item.name;
      this.formUp.amount = item.amount;
      this.formUp.id = item.id;
      $("#modalup").modal("show");
    },
    alertDelete(id){
      this.$swal({
          title: 'Deseja excluir o produto?',
          type: 'warning',
          showCancelButton: true,
          confirmButtonText: 'Sim',
          cancelButtonText: 'Não',
          showCloseButton: true,
          showLoaderOnConfirm: true
        }).then((result) => {
          if(result.value) {
            this.DeleteProduto(id);
            this.$swal('Excluido', '', 'success')
          }
        })
    },
    BuscadProdutos() {
      axios
        .get("/products", {
          headers: {
            authorization:
              "Bearer " + localStorage.getItem("auth_token_default"),
          },
        })
        .then((res) => {
          this.dados = res.data.produtos;
          this.carregando = false;
        });
    },
    CadastrarProduto() {
      this.salvando = true;
      this.form
        .post("/product", {
          headers: {
            authorization:
              "Bearer " + localStorage.getItem("auth_token_default"),
          },
        })
        .then((res) => {
          this.dados.push(res.data.produto);
          $("#modaladd").modal("hide");
          this.$swal("", "Produto cadastrado com sucesso! ");
          this.salvando = false;
        })
        .catch((e) => {
          this.$swal("", "Error......" + e);
          this.salvando = false;
        });
    },
    AtualizarProduto(id) {
      this.salvando = true;
      this.formUp
        .put("/product/" + this.formUp.id, {
          headers: {
            authorization:
              "Bearer " + localStorage.getItem("auth_token_default"),
          },
        })
        .then((res) => {
         
          $("#modalup").modal("hide");
          this.$swal("", "Produto atualizado com sucesso! ");
          this.salvando = false;
          this.BuscadProdutos();
        })
        .catch((e) => {
          this.$swal("", "Error......" + e);
          this.salvando = false;
        });
    },
    DeleteProduto(id) {
      axios
        .delete("/product/" + id, {
          headers: {
            authorization:
              "Bearer " + localStorage.getItem("auth_token_default"),
          },
        })
        .then((res) => {
          console.log(res);
          this.BuscadProdutos();
        })
        .catch((e) => {
          this.$swal("", "Error......" + e);
        });
    },
  },
  mounted() {
    this.BuscadProdutos();
  },
};
</script>
