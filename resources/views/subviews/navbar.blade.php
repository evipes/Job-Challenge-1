<nav class="navbar navbar-expand-lg navbar-light bg-light mb-2  d-flex justify-content-between">

    <a class="btn btn-dark mb-2" href="/"><i class="fas fa-home"></i></a>
    @auth
    <h1 class='welcome'> Olá 'Auth-name aqui', tenha um bom trabalho! </h1>

    <a class="btn btn-outline-danger" href="/logout">Sair</a>    
    @endauth
    
    @guest
    <a class="btn btn-outline-primary" href="/login">Entrar</a>    
    @endguest
    
</nav>