<div class="modal fade" tabindex="-1" role="dialog" id="csonDialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">CSON</h5>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" id="csons">
                    <input type="hidden" id="idInput">
                    
                    <div class="form-group">
                        <label for="code">Código:</label>
                        <input 
                            type="text" 
                            name="code"  
                            id="code" 
                            placeholder="102"
                            class="form-control">
                        <p style="visibility: hidden;" >Error</p>
                    </div>
                    <div class="form-group">
                        <label for="description">Descrição:</label>
                        <textarea 
                            name="description" 
                            id="description" 
                            cols="30" 
                            rows="5"
                            placeholder="descrição da tributação"
                            class="form-control" >

                        </textarea>
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