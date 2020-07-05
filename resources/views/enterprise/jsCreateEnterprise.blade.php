<script>    
      $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN' : "{{ csrf_token() }}"
        }
     });
    function clearForm() {
        $('#id').val('');
        $('#contact_id').val('');
        $('#address_id').val('');
        $('#name').val('');
        $('#fantasy_name').val('');
        $('#cnpj').val('');
        $('#register_state').val('');
        $('#email').val('');
        $('#phone').val('');
        $('#street').val('');
        $('#complement').val('');
        $('#state').val('');
        $('#city').val('');
    }
    function createEnterprise(contact, address, enterprise){
        sentContact(contact, address, enterprise);
    }

    function sentContact(contact,address, enterprise) {
        $.post('/api/contacts',contact, function(resContact) {
            if(resContact.httpCode = 201) {
                sentAddress(address, enterprise,resContact);
            } else {
                alert(resContact.message);
            }
        });
    }
    function sentAddress(address, enterprise, resContact){
        $.post('/api/addresses', address, function(resAddress){
            if(resAddress.httpCode = 201){
                sentEnterprise(enterprise, resContact, resAddress);
            } else {
                alert(resAddress.message);
            }
        });
    }
    function sentEnterprise(enterprise, resContact, resAddress) {
        enterprise.contact_id = resContact.contact.id;
        enterprise.address_id = resAddress.address.id;
        $.post('/api/enterprises', enterprise, function (resEnterprise) {
            if(resEnterprise.httpCode == 201) {
                let line = buildLineOfEnterprises(resEnterprise.enterprises);
                $('#enterpriseTable>tbody').append(line);
            }
            alert(resEnterprise.message);
        });
    }
</script>