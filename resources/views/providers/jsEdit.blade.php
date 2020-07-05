<script>
    function updateProvider(contact, address,provider) { 
        $.ajax({
            type: 'PUT',
            url:`/api/providers/${provider.id}`,
            data:provider,
            success: async function(res) {
                if(res.httpCode == 201) {
                    await updateContact(contact, address,provider);
                    let localProvider = res.provider.provider;
                    let line = document.getElementById(provider.id);
                    line.cells[1].innerHTML = localProvider.name;
                    line.cells[2].innerHTML = localProvider.fantasy_name;
                    line.cells[3].innerHTML = localProvider.cnpj;
                    line.cells[4].innerHTML = localProvider.type_provider.description;
                    line.cells[9].innerHTML = localProvider.enterprise.name;
                }
                alert('Fornecedor alterado com sucesso!');
            },
            error: function(error) {
                console.log(error);
            }
        });
    }
    function updateContact(contact, address,provider) {
        $.ajax({
            type: 'PUT',
            url:`/api/contacts/${contact.id}`,
            data:contact,
            success: async function(res){
                if(res.httpCode == 201) {
                    await updateAddress(address,provider);
                    let contact = res.contact;
                    let line = document.getElementById(provider.id);
                    line.cells[5].innerHTML = contact.email;
                    line.cells[6].innerHTML = contact.phone;
                } else {
                    let msg = 'algum erro ocorreu ao alterar o contato do fornecedor\n' + res.message;
                    alert(msg);
                }
            },
            error: function(error){
                console.log(error);
            }
        });
    }
    function updateAddress(address,provider) {
        $.ajax({
            type: 'PUT',
            url: `/api/addresses/${address.id}`,
            data: address,
            success: function(res){
                if(res.httpCode == 201) {
                    let address = res.address;
                    let line = document.getElementById(provider.id);
                    line.cells[7].innerHTML = address.city;
                    line.cells[8].innerHTML = address.state;
                } else {
                    let msg = 'algum erro ocorreu ao alterar o endereço da fornecedor\n' + res.message;
                    alert(msg);
                }
            },
            error: function(error){
                console.log(error);
            }
        });
    }
    function editProvider(id) {
        $.getJSON(`/api/providers/${id}`, function(res){
            if(res.httpCode == 201) {
                $('#id').val(res.provider.id);
                $('#name').val(res.provider.name);
                $('#fantasy_name').val(res.provider.fantasy_name);
                $('#cnpj').val(res.provider.cnpj);
                $('#type_provider').val(res.provider.type_provider_id);
                $('#enterprise').val(res.provider.enterprise_id);
                $('#contact_id').val(res.provider.contact_id);
                $('#email').val(res.provider.contact.email);
                $('#phone').val(res.provider.contact.phone);
                $('#address_id').val(res.provider.address_id);
                $('#street').val(res.provider.address.street);
                $('#complement').val(res.provider.address.complement);
                $('#state').val(res.provider.address.state);
                $('#city').val(res.provider.address.city);
                $('#providerDialog').modal('show');
            }
        });
    }
</script>