<script>
    function clearForm() {
        $('#id').val('');
        $('#contact_id').val('');
        $('#address_id').val('');
        $('#name').val('');
        $('#fantasy_name').val('');
        $('#cnpj').val('');
        $('#email').val('');
        $('#phone').val('');
        $('#street').val('');
        $('#complement').val('');
        $('#city').val('');
        $('#state').val('');
    }

    function sentCreate(contact, address,provider){
        createContact(contact, address,provider);
    }

    function createContact(contact, address,provider) {
        $.post(
            `/api/contacts/`, 
            contact,
            async function(res){
                if(res.httpCode == 201){
                    await createAddress(address, provider,res);
                } else {
                    alert(res.message);
                }
            }
        );
    }

    function createAddress(address,provider, resContact) {
        $.post(
            '/api/addresses/',
            address,
            async function(resAddress) {
                if(resAddress.httpCode == 201){
                    await createProvider(provider,resContact, resAddress);
                } else {
                    alert(resAddress.message);
                }
            }
        );
    }

    function createProvider(provider, resContact, resAddress) {
        provider.contact_id = resContact.contact.id;
        provider.address_id = resAddress.address.id;
        $.post(
            '/api/providers',
            provider,
            function(res) {
                if(res.httpCode == 201){
                    let provider = res.provider.provider;
                    let line = buildLineOfProviders(provider);
                    $('#providerTable>tbody').append(line);
                }
                alert(res.message);
            }
        );
    }
</script>