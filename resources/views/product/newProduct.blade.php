<form method="POST">
    @csrf
        <div class="form">
            <div class="container-fluid mb-2" style="border:1px solid #cecece;">
                <div class="form-row" >
                    <!-- Nome do produto -->
                    <div class="form-group col-md-6">
                        <label for="name" > Nome do produto </label>
                    <input type="text" class="form-control" name="name" id="nome" value="{{$client->name ??''}}">
                    </div>
    
                    <!-- Valor do produto -->
                    <div class="form-group col-md-2">
                        <label for="market">Valor do produto</label>
                        <input type="text" class="form-control" name="market" id="market" value="{{$client->market ??''}}">
                    </div>

                    <!-- Proprietario/User -->
                    <div class="form-group col-md-4">
                        <label for="name" > Proprietario </label>
                    <input type="text" class="form-control" name="name" id="nome" value="{{$client->name ??''}}">
                    </div>
                </div>
            </div>
        </div>
        <button class="btn btn-primary mt-2">SALVAR</button>       
</form>
