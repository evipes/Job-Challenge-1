Documento de Identificação
<div class="container-fluid mb-2" style="border:1px solid #cecece;">

    <div class="form-row">

        <!-- Nome do membro -->
        <div class="form-group col-md-5">
            <label for="name" >Nome completo</label>
            <input type="text" class="form-control" name="name" id="name" >
        </div>

        <!-- Tipo-->
        <div class="form-group col-md-2">
            <label for="type">Tipo de documento</label>
            <select id="type" class="form-control" name="type">
                <option selected disabled> Tipo </option>
                <option value="CPF">CPF</option>
                <option value="CNPJ">CNPJ</option>
            </select>
        </div>

        <!-- Numero -->
        <div class="form-group col-md-5">
            <label for="number"> Numero do documento</label>
            <input type="text" class="form-control" id="number" name="number" >
        </div>


    </div>

    <div class="form-row">

        <!-- Email principal -->
        <div class="form-group col-md-6">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email">
        </div>

        <!-- Senha -->
        <div class="form-group col-md-3">
            <label for="password"> Senha </label>
            <input type="password" class="form-control" id="password" name="password" >
        </div>
  
        <!-- Confirmar senha -->
        <div class="form-group col-md-3">
            <label for="repass"> Confirme sua senha: </label>
            <input type="password" class="form-control" id="repass" name="repass" >
        </div>
  
    </div>

</div>