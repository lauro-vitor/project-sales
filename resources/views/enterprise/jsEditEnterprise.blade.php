<script>
    function editEnterprise(id){
        $.getJSON(`api/enterprises/${id}`, function(response){
            $('#id').val(response.id);
            $('#contact_id').val(response.contact.id);
            $('#address_id').val(response.address.id);
            $('#name').val(response.name);
            $('#fantasy_name').val(response.fantasy_name);
            $('#cnpj').val(response.cnpj);
            $('#register_state').val(response.register_state);
            $('#email').val(response.contact.email);
            $('#phone').val(response.contact.phone);
            $('#street').val(response.address.street);
            $('#complement').val(response.address.complement);
            $('#state').val(response.address.state);
            $('#city').val(response.address.city);
            $('#enterpriseDialog').modal('show');
        });
    }
    function sentUpdate(contact, address, enterprise){
        updateContact(contact, address, enterprise);
    }
   
    function updateContact(contact, address, enterprise) {
        $.ajax({
            type: 'PUT',
            url: `/api/contacts/${contact.id}`,
            data: contact,
            success: function(response) {
                if(response.httpCode == 201) {
                    let contact = response.contact;
                    let line = document.getElementById(enterprise.id);
                    line.cells[5].innerHTML = contact.email;
                    line.cells[6].innerHTML = contact.phone;

                    updateAddress(address, enterprise);
                } else {
                    let msg = 'algum erro ocorreu ao alterar o contato da empresa\n' + response.message;
                    alert(msg);
                }
            },
            error: function(error) {
                console.log(error);
            }
        });
    }
    function updateAddress(address, enterprise) {
        $.ajax({
            type: 'PUT',
            url: `/api/addresses/${address.id}`,
            data: address,
            success: function(response) {
                if(response.httpCode == 201) {
                    let address = response.address;
                    let line = document.getElementById(enterprise.id);
                    line.cells[7].innerHTML = address.street;
                    line.cells[8].innerHTML = address.complement;
                    line.cells[9].innerHTML = address.state;
                    line.cells[10].innerHTML = address.city;

                    updateEnterprise(enterprise);

                } else {
                    let msg = 'algum erro ocorreu ao alterar o endereço da empresa\n' + response.message;
                    alert(msg);
                }
            },
            error: function(error) {
                console.log(error);
            }
        });
    }
    function updateEnterprise(enterprise){
        $.ajax({
            type: 'PUT',
            url: `/api/enterprises/${enterprise.id}`,
            data: enterprise,
            success: function(response) {
                if(response.httpCode == 201) {
                    let enterprise = response.enterprises;
                    let line = document.getElementById(enterprise.id);
                    line.cells[1].innerHTML = enterprise.name;
                    line.cells[2].innerHTML = enterprise.fantasy_name;
                    line.cells[3].innerHTML = enterprise.cnpj;
                    line.cells[4].innerHTML = enterprise.register_state;
                    alert(response.message);
                } else {
                    let msg = 'algum erro ocorreu ao alterar o endereço da empresa\n' + response.message;
                    alert(msg);
                }
            },
            error: function(error) {
                console.log(error);
            }
        });
    }
    
</script>