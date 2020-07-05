<script>
    //promises provider -> address-> contact 
    function removeProvider(id) {
        $.getJSON(`/api/providers/${id}`, function(res){
            if(res.httpCode == 201){
                let addressId = res.provider.address_id;
                let contactId = res.provider.contact_id;
                deleteProvider(id, addressId, contactId);
            }
        });
    }
    function deleteProvider(providerId, addressId, contactId) {
        $.ajax({
            type: 'DELETE',
            url: `/api/providers/${providerId}`,
            context: this,
            success: async function(res){
                if(res.httpCode == 201){
                    await deleteAddress(addressId,contactId);
                    document.getElementById(providerId).textContent = '';
                }
                alert(res.message);
            },
            error: function(error){
                console.log(error);
            }
        });
    }
    function deleteAddress(addressId, contactId) {
        $.ajax({
            type: 'DELETE',
            url: `/api/addresses/${addressId}`,
            context: this,
            success: async function(res){
                if(res.httpCode == 201){
                    await deleteContact(contactId);
                } else {
                    alert('erro ao excluir o endereço');
                }
            },
            error: function(error){
                console.log(error);
            }
        });
    }
    function deleteContact(contactId) {
        $.ajax({
            type: 'DELETE',
            url: `/api/contacts/${contactId}`,
            context: this,
            success: function(res){
                if(!res.httpCode == 201){
                    alert('error ao remover contato');
                }
            },
            error: function(error){
                console.log(error);
            }
        });
    }
  
</script>