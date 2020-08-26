
INFORMAÇÕES DE CONTATO
<div class="container-fluid mb-2" style="border:1px solid #cecece;">

    <div class="form-row">

        <!-- Rua -->
        <div class="col col-7">
            <label for="street_name" >Rua</label>
            <input type="text" class="form-control" name="street_name" id="street_name" >  
        </div>

        <!-- Numero  -->
        <div class="col col-1">
            <label for="street_number" > Numero </label>
            <input type="text" class="form-control" name="street_number" id="street_number" >  
        </div>

        <!-- Bairro -->
        <div class="col col-4">
            <label for="neighborhood" > Bairro </label>
            <input type="text" class="form-control" name="neighborhood" id="neighborhood" >  
        </div>

        <!-- Complemento -->
        <div class="col col-4">
            <label for="complement" > Complemento </label>
            <input type="text" class="form-control" name="complement" id="complement" >  
        </div>                    

        <!-- Estados Brasileiros -->
        <div class="form-group col-md-3">
            <label for="state">Estado</label>
            <select id="state" class="form-control" name="state">
            @include('subviews.states')
        </div>

        <!-- Cidade -->
        <div class="col col-5">
            <label for="city" >Cidade</label>
            <input type="text" class="form-control" name="city" id="city" >
        </div>

    </div>
</div>