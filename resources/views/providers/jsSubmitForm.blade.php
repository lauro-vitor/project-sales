<script>
    $('#providerForm').submit(function(event){
        event.preventDefault();
        let contact = {
            id: $('#contact_id').val(),
            email: $('#email').val(),
            phone: $('#phone').val()
        };
        let address = {
            id: $('#address_id').val(),
            street: $('#street').val(),
            complement:$('#complement').val(),
            state: $('#state').val(),
            city: $('#city').val()
        };
        let provider = {
            id: $('#id').val(),
            name: $('#name').val(),
            fantasy_name: $('#fantasy_name').val(),
            cnpj: $('#cnpj').val(),
            type_provider_id: $('#type_provider').val(),
            enterprise_id: $('#enterprise').val(),
            contact_id: $('#contact_id').val(),
            address_id: $('#address_id').val()
        };
        if($('#id').val() == ''){
            sentCreate(contact, address,provider);
        } else {
            updateProvider(contact, address,provider);
        }
        $('#providerDialog').modal('hide');
    });
    
</script>