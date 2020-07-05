<script>
    function sentDelete(id) {
        serachEnterprise(id);
    }
    //retorna a empresa como respost, caso exista irá deletar -> contato -> endereço -> empresa
    //cadeia de promisses
    function serachEnterprise(id) {
        $.getJSON(`/api/enterprises/${id}`, function(response){
            if(response){
                delteEnterprise(response.id, response.contact_id, response.address_id);
            }else {
                alert('Empresa não existente');
            }
        });
    }
     function delteEnterprise(idEnterprise,idContact,idAddress) {
        $.ajax({
            type: 'DELETE',
            url: `/api/enterprises/${idEnterprise}`,
            context: this,
            success: async function(res){
                if(res.httpCode == 201){
                    await deleteContact(idContact,idAddress);
                    document.getElementById(idEnterprise).textContent = '';
                }
                alert(res.message);
            },
            error: function(error){
                alert(error.responseJSON.message);
            }
        });
    }
     function deleteContact(idContact,idAddress) {
        $.ajax({
            type: 'DELETE',
            url: `/api/contacts/${idContact}`,
            context: this,
            success: async function(res){
                if (res.httpCode = 201){
                    await deleteAddress(idAddress);
                } else {
                    alert(res.message);
                }
            },
            error: function(error){
                alert(error.responseJSON.message);
            }
        });
    }
    function deleteAddress(idAddress){
        $.ajax({
            type: 'DELETE',
            url: `/api/addresses/${idAddress}`,
            context: this,
            success: function(res){

            },
            error: function(error){
                alert(error.responseJSON.message);
            }
        });
    }
  
</script>