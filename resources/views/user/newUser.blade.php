<!-- Formulario de cadastro para novos usuarios -->
<form method="post">
    @csrf

        <div class="form">
           
            <!-- INFORMAÇÕES PESSOAIS -->
            @include('user.userDocuments')
    
            <!-- ENDEREÇO E CONTATO -->    
            @include('user.userAdress')

        </div>

        <button class="btn btn-primary mt-2">SALVAR</button>
      
</form>
    
    