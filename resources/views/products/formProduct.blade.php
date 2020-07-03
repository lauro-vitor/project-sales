<div class="modal fade" tabindex="-1" role="dialog" id="productFormDialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Novo Produto</h5>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" id="product">
                    <input type="hidden" id="idInput">
                    <div class="form-group">
                        <label for="description">Descrição:</label>
                        <input 
                            type="text" 
                            name="description"  
                            id="description" 
                            placeholder="Descrição do produto"
                            class="form-control">
                        <p style="visibility: hidden;" >Error</p>
                    </div>
                    <div class="form-group">
                        <label for="unity">Quantidade</label>
                        <input 
                            type="number" 
                            name="unity" 
                            id="unity"
                            class="form-control">
                        <p style="visibility: hidden;" >Error</p>
                    </div>
                    <div class="form-group">
                        <label for="preco">Preço:</label>
                        <input 
                            type="text" 
                            name="price" 
                            id="price"
                            class="form-control"
                            placeholder="39,99">
                        <p style="visibility: hidden;" >Error</p>
                    </div>
                    <div class="form-group">
                        <label for="reference">Referência:</label>
                        <input 
                            type="text" 
                            name="reference" 
                            id="reference"
                            class="form-control"
                            >
                        <p style="visibility: hidden;" >Error</p>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-10">
                            <label for="categoria">Categoria:</label>
                            <select name="category" id="category" class="form-control">
                            </select>
                        </div>
                        <div class="form-group col-md-2" style="margin-top: 6.2%;">
                            <button class="btn btn-primary"
                            onclick="openWindow('http://localhost:8000/categories')">detalhes</button>
                        </div>
                    </div>
                    
                   <div class="form-row">
                        <div class="form-group col-md-10">
                            <label for="">NCM</label>
                            <select name="ncms" id="ncms" class="form-control">
                                
                            </select>
                        </div>
                        <div class="form-group col-md-2" style="margin-top: 6.2%;">
                            <button class="btn btn-primary"
                            onclick="openWindow('http://localhost:8000/ncms')">detalhes</button>
                        </div>
                   </div>
                    <div class="form-row">
                       
                        <div class="form-group col-md-6">
                            <label for="aliquot">Alíquota</label>
                            <select name="aliquot" id="aliquot" class="form-control">
                                
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="cson">CSON</label>
                            <select name="cson" id="cson" class="form-control">
                            </select>
                        </div>
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