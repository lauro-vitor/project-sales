<div class="modal fade" tabindex="-1" role="dialog" id="aliquotDialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Alíquota</h5>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" id="aliquotForm">
                    <input type="hidden" id="idInput">
                    
                    <div class="form-group">
                        <label for="estate">Estado:</label>
                        <input 
                            type="text" 
                            name="state"  
                            id="state" 
                            placeholder="Estado"
                            class="form-control">
                        <p style="visibility: hidden;" >Error</p>
                    </div>

                    <div class="form-group">
                        <label for="value">Valor:</label>
                        <input 
                            type="text" 
                            name="value"  
                            id="value" 
                            placeholder="4.5"
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