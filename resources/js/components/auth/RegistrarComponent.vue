<template class="teste">
    <div class="tela-register">
        <div class="d-flex justify-content-center">
            <form class="form-signin" @submit.prevent="register()">
                <img
                    src="../../assets/img/logo.png"
                    style="max-height: 135px; display: block; margin-left: auto; margin-right:auto"
                    alt
                />
                <div class="card box-fip">
                    <h1 class="h3 mb-3 font-weight-700 text-white text-center">
                        Quero Vender
                    </h1>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span
                                class="input-group-text icone-input"
                                id="basic-addon1"
                            >
                                <i class="fas fa-user"></i>
                            </span>
                        </div>
                        <input
                            v-model="form.name"
                            type="text"
                            class="form-control"
                            placeholder="Seu nome"
                            name="name"
                            aria-label="name"
                            aria-describedby="basic-addon1"
                            required
                            :class="{
                                'is-invalid': form.errors.has('name')
                            }"
                        />
                        <has-error
                            :form="form"
                            field="name"
                            style="color: #fff"
                        ></has-error>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span
                                class="input-group-text icone-input"
                                id="basic-addon1"
                            >
                                <i class="fas fa-at"></i>
                            </span>
                        </div>
                        <input
                            v-model="form.email"
                            type="text"
                            class="form-control"
                            placeholder="Seu e-mail"
                            name="email"
                            aria-label="Email"
                            aria-describedby="basic-addon1"
                            required
                            :class="{
                                'is-invalid': form.errors.has('email')
                            }"
                        />
                        <has-error
                            :form="form"
                            field="email"
                            style="color: #fff"
                        ></has-error>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span
                                class="input-group-text icone-input"
                                id="Senha"
                            >
                                <i class="fas fa-key"></i>
                            </span>
                        </div>
                        <input
                            v-model="form.password"
                            type="password"
                            class="form-control"
                            placeholder="Sua senha"
                            name="passowrd"
                            aria-label="Senha"
                            aria-describedby="Senha"
                            required
                            :class="{
                                'is-invalid': form.errors.has('password')
                            }"
                        />
                        <has-error
                            :form="form"
                            field="password"
                            style="color: #fff"
                        ></has-error>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span
                                class="input-group-text icone-input"
                                id="Senha"
                            >
                                <i class="fas fa-key"></i>
                            </span>
                        </div>
                        <input
                            v-model="form.password_confirmation"
                            type="password"
                            class="form-control"
                            placeholder="Confirma senha"
                            name="password_confirmation"
                            aria-label="CSenha"
                            aria-describedby="CSenha"
                            required
                            :class="{
                                'is-invalid': form.errors.has(
                                    'password_confirmation'
                                )
                            }"
                        />
                        <has-error
                            :form="form"
                            field="password_confirmation"
                            style="color: #fff"
                        ></has-error>
                    </div>
                    <button
                        class="btn btn-lg btn-light btn-fip btn-block"
                        disabled
                        v-show="carregando"
                    >
                        <b> <i class="fas fa-cog fa-spin"></i> salvando... </b>
                    </button>
                    <button
                        class="btn btn-lg btn-light btn-fip btn-block"
                        v-show="!carregando"
                    >
                        <b>Registrar</b>
                    </button>
                    <div class="text-white text-center">
                        <br />
                        ou <br />
                        <router-link to="/" class="text-light"
                            >Login</router-link>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            carregando: false,
            form: new Form({
                name: "",
                email: "",
                password: "",
                password_confirmation: ""
            }),
            has_error: false
        };
    },
    methods: {
        register() {
            var app = this;
            app.carregando = true;
            return new Promise((resolve, reject) => {
                this.$auth
                    .register({
                        url: "auth/register",
                        body: this.form, // VueResource
                        data: this.form // Axios
                    })
                    .then(
                        res => {
                            this.$swal("", "Registrado com sucesso!");
                            this.$router.push({
                                name: "auth-login",
                                params: { successRegistrationRedirect: true }
                            });
                            app.carregando = false;
                            resolve(res);
                        },
                        e => {
                            this.$swal("", "Dados incorretos! " + e);
                            app.carregando = false;
                        }
                    );
                app.carregando = false;
            });
        }
    },
    mounted() {
        console.log("Login.");
    }
};
</script>

<style lang="css">
.tela-register {
    background-size: cover;
    padding-top: 40px;
    padding-bottom: 40px;
    background-color: #f5f5f5;
    height: 100vh;
}

.form-signin {
    width: 100%;
    max-width: 370px;
    padding: 15px;
    margin: auto;
}

.form-signin .form-control {
    position: relative;
    box-sizing: border-box;
    height: auto;
    padding: 10px;
    font-size: 16px;
}

.box-fip {
    background: #ff6688;
    padding: 25px;
}

.btn-fip {
    background: #42ffb6;
    color: #ff6688;
}

.icone-input {
    background: #42ffb6;
    color: #ff6688;
}
</style>
