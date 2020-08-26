<!-- Modal -->
<div class="modal fade" id="modal-product" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-title">Adicionar produtos</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-product">
                    <div class="form-group">
                        <label for="slug">Código do produto</label>
                        <input type="number" class="form-control" required name="slug" id="slug">
                    </div>
                    <div class="form-group">
                        <label for="name">Nome</label>
                        <input type="text" class="form-control" required name="name" id="name">
                    </div>
                    <div class="form-group">
                        <label for="amount">Valor</label>
                        <input type="text" class="form-control" required name="amount" id="amount">
                    </div>

                    <input type="hidden" id="id-produto" name="id">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary btn-action add">Adicionar</button>
            </div>
        </div>
    </div>
</div>