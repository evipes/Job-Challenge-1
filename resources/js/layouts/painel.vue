<template>
  <div>
    <nav class="navbar navbar-expand-lg navbar-light bg-light" id="bg-painel">
        <router-link to="/painel" class="navbar-brand">
          <img  src="../assets/img/logo-1.png"  style="max-height: 45px;" />
        </router-link>
      <button
        class="navbar-toggler"
        type="button"
        data-toggle="collapse"
        data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <router-link class="nav-link text-white" to="/painel">
              <b>Home</b> 
            </router-link>
          </li>
          <li class="nav-item">
            <router-link class="nav-link text-white" to="/painel/produtos">
            <b>Produtos</b> 
            </router-link>
          </li>
        </ul>
        <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap text-white">
          <a class="nav-link text-white" @click.prevent="$auth.logout()">
          <i class="fas fa-power-off"></i>
          </a>
        </li>
      </ul>
      </div>
      
    </nav>

    <div class="container">
      <router-view></router-view>
    </div>
  </div>
</template>


<style lang="css">
#bg-painel {
    background-color: #ff6688!important;
}
</style>