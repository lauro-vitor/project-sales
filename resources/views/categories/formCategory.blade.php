<div class="modal fade" tabindex="-1" role="dialog" id="categoryDialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Nova Categoria</h5>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" id="category">
                    <input type="hidden" id="idInput">
                    
                    <div class="form-group">
                        <label for="name">Nome:</label>
                        <input 
                            type="text" 
                            name="name"  
                            id="name" 
                            placeholder="Nome da Categoria"
                            class="form-control">
                        <p style="visibility: hidden;" >Error</p>
                    </div>
                  
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" >Salvar</button>
                        <button 
                            type="cancel" 
                            class="btn btn-secondary" 
                            data-dismiss="modal"
                        >
                            Cancelar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>