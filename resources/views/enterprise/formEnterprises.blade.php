<div class="modal fade" tabindex="-1" role="dialog" id="enterpriseDialog">  
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Empresa</h5>
            </div>
            <div class="modal-body">
                <form class="" id="enterprise">
                    <input type="hidden" id="id">
                    <input type="hidden" id="contact_id">
                    <input type="hidden" id="address_id">
                    <div class="form-group">
                        <label for="name">Nome:</label>
                        <input 
                            type="text" 
                            name="name"  
                            id="name" 
                            placeholder="Nome da Empresa"
                            class="form-control">
                        <p style="visibility: hidden;" >Error</p>
                    </div>
                    <div class="form-group">
                        <label for="fantasy_name">Nome Fantasia:</label>
                        <input 
                            type="text" 
                            name="fantasy_name"  
                            id="fantasy_name" 
                            placeholder="Nome Fantasia"
                            class="form-control">
                        <p style="visibility: hidden;" >Error</p>
                    </div>
                    <div class="form-group">
                        <label for="cnpj">CNPJ:</label>
                        <input 
                            type="text" 
                            name="cnpj"  
                            id="cnpj" 
                            placeholder="84.695.648/0001-10"
                            class="form-control">
                        <p style="visibility: hidden;" >Error</p>
                    </div>
                    <div class="form-group">
                        <label for="register_state">Insrição Estadual:</label>
                        <input 
                            type="text" 
                            name="register_state"  
                            id="register_state" 
                            placeholder="45380717-8"
                            class="form-control">
                        <p style="visibility: hidden;" >Error</p>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="email">Email:</label>
                            <input 
                                type="text" 
                                name="email"  
                                id="email" 
                                placeholder="exemplo@email.com"
                                class="form-control">
                            <p style="visibility: hidden;" >Error</p>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="phone">telefone</label>
                            <input 
                                type="text" 
                                name="phone"  
                                id="phone" 
                                placeholder="9 9999-999"
                                class="form-control">
                            <p style="visibility: hidden;" >Error</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="street">Rua:</label>
                        <input 
                            type="text" 
                            name="street"  
                            id="street" 
                            placeholder="rua exemplo nº 0"
                            class="form-control">
                        <p style="visibility: hidden;" >Error</p>
                    </div>
                    <div class="form-group">
                        <label for="complement">Complemento:</label>
                        <input 
                            type="text" 
                            name="complement"  
                            id="complement" 
                            placeholder="rua complemento nº 0"
                            class="form-control">
                        <p style="visibility: hidden;" >Error</p>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="state">Estado:</label>
                            <input 
                                type="text" 
                                name="state"  
                                id="state" 
                                placeholder="ES"
                                class="form-control">
                            <p style="visibility: hidden;" >Error</p>
                        </div>
                        <div class="form-group col-md-9">
                            <label for="city">Cidade:</label>
                            <input 
                                type="text" 
                                name="city"  
                                id="city" 
                                placeholder=""
                                class="form-control">
                            <p style="visibility: hidden;" >Error</p>
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