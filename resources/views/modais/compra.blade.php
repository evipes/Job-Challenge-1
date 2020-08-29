<!-- Modal -->
<div class="modal fade" id="modal-compra" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-title">Adicionar produtos</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-compra">
                    <div class="form-group">
                        <label for="slug">URL do produto</label>
                        <input type="text" class="form-control" required name="slug" id="slug">
                    </div>
                    <div class="form-group">
                        <label for="cardnumber">Número do cartão</label>
                        <input type="text" class="form-control" required name="cardnumber" id="cardnumber">
                    </div>
                    <div class="form-group">
                        <label for="carddate">Validade</label>
                        <input type="month" pattern="[0-9]{4}-[0-9]{2}" class="form-control" required name="carddate" id="carddate">
                    </div>
                    <div class="form-group">
                        <label for="cardcvv">CVV</label>
                        <input type="text" class="form-control" required name="cardcvv" id="cardcvv">
                    </div>
                    <input type="hidden" id="id-produto" name="id">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary btn-action enviar-compra">Comprar</button>
            </div>
        </div>
    </div>
</div>