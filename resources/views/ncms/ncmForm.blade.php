<div class="modal fade" tabindex="-1" role="dialog" id="ncmFormDialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-title">
                <h4>Novo NCM</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" id="ncmForm">
                    <input type="hidden" id="idInput">
                    <div class="form-group">
                        <label for="code">Código:</label>
                        <input 
                            type="text" 
                            class="form-control" 
                            id="code" 
                            name="code"
                            placeholder="9999.99.99">
                    </div>
                    <div class="form-group">
                        <label for="name">Nome:</label>
                        <textarea 
                            name="name" 
                            id="name" 
                            cols="30" 
                            rows="5" 
                            class="form-control"
                            placeholder="descrição do ncm">
                        </textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                     <button
                        type="cancel"
                        class="btn btn-secondary"
                        data-dismiss="modal">
                            Cancelar
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>