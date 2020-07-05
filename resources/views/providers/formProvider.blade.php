<div  class="modal fade" tabindex="-1" role="dialog" id="providerDialog">
   <div class="modal-dialog">
       <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Registro Fornecedor</h5>
            </div>
            <div class="modal-body">
                <form action="" id="providerForm">
                    <input type="hidden" id="id">
                    <input type="hidden" id="contact_id">
                    <input type="hidden" id="address_id">
                    <div class="form-group">
                        <label for="name">Nome:</label>
                        <input type="text" id="name" name="name" class="form-control">
                    </div>
                    <div class="form-row"> 
                        <div class="form-group col-md-6">
                            <label for="fantasy_name">Nome Fantasia:</label>
                            <input type="text" class="form-control" id="fantasy_name" name="fantasy_name">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="cnpj">CNPJ:</label>
                            <input type="text" class="form-control" id="cnpj" name="cnpj">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="email">E-mail:</label>
                            <input type="text" class="form-control" id="email" name="email">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="phone">Telefone:</label>
                            <input type="text" class="form-control" id="phone" name="phone">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="street">Rua:</label>
                        <input type="text" class="form-control" id="street" name="street">
                    </div>
                    <div class="form-row">
                       <div class="form-group col-md-6">
                            <label for="complement">Complemento:</label>
                            <input type="text" class="form-control" id="complement" name="complement">
                       </div>
                       <div class="form-group col-md-4">
                            <label for="city">Cidade:</label>
                            <input type="text" class="form-control" id="city" name="city">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="state">Estado:</label>
                            <input type="text" class="form-control" id="state" name="state">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="enterprise">Empresa:</label>
                        <select name="enterprise" id="enterprise" class="form-control"></select>
                    </div>
                    <div class="form-group">
                        <label for="type_provider">Tipo</label>
                        <select name="type_provider" id="type_provider" class="form-control"></select>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary" type="submit">Salvar</button>
                        <button class="btn btn-secondary" type="cancel"  data-dismiss="modal" >Cancelar</button>
                    </div>
                </form>
            </div>
       </div>
   </div> 
</div>
