<script>
    $('#enterprise').submit(function(event){
        let contact = {
            id: $('#contact_id').val(),
            email: $('#email').val(),
            phone: $('#phone').val(),
        };
        let address = {
            id: $('#address_id').val(),
            street: $('#street').val(),
            complement: $('#complement').val(),
            state : $('#state').val(),
            city: $('#city').val()
        };
        let enterprise = {
            id: $('#id').val(),
            name: $('#name').val(),
            fantasy_name: $('#fantasy_name').val(),
            cnpj: $('#cnpj').val(),
            register_state: $('#register_state').val(),
            contact_id: $('#contact_id').val(),
            address_id: $('#address_id').val()
        };

        if($('#id').val() == '') {
            createEnterprise(contact, address, enterprise);
        } else {
            sentUpdate(contact, address, enterprise);
        }
        $('#enterpriseDialog').modal('hide');
        return false;
    });
</script>