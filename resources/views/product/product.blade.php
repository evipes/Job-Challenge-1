<form method="POST">
    @csrf
        <div class="form">
            <div class="container-fluid mb-2" style="border:1px solid #cecece;">
                <div class="form-row" >
                    <!-- Nome do produto -->
                    <div class="form-group col-md-6">
                        <label for="name" > Nome do produto </label>
                    <input type="text" class="form-control" name="name" id="nome" value="{{$product->name ??''}}">
                    </div>
    
                    <!-- Valor do produto -->
                    <div class="form-group col-md-2">
                        <label for="amount">Valor do produto</label>
                        <input type="number" class="form-control" name="amount" id="amount" min="0" step=".01" value="{{$product->amount ??''}}">
                    </div>
                </div>
            </div>
        </div>
        <button class="btn btn-primary mt-2">SALVAR</button>       
</form>
