<script>
   function loadingEnterprises() {
        $.getJSON('/api/enterprises/', function (response){
            let enterprises = response.enterprises;
            enterprises.map(function(enterprise) {
                line = buildLineOfEnterprises(enterprise);
                $('#enterpriseTable>tbody').append(line);
            });
        })
    }
    function buildLineOfEnterprises(enterprise){
        return(
            `<tr id=${enterprise.id}>
                <td> ${enterprise.id} </td> 
                <td>  ${enterprise.name}  </td> 
                <td>  ${enterprise.fantasy_name}  </td> 
                <td>  ${enterprise.cnpj}  </td> 
                <td>  ${enterprise.register_state}  </td> 
                <td>  ${enterprise.contact.email}  </td> 
                <td>  ${enterprise.contact.phone}  </td> 
                <td>  ${enterprise.address.street}  </td> 
                <td>  ${enterprise.address.complement}  </td> 
                <td>  ${enterprise.address.state}  </td> 
                <td>  ${enterprise.address.city}  </td> 
                <td>
                    <button class="btn btn-warning" onClick="editEnterprise(${enterprise.id})"> 
                        Editar 
                    </button>
                    <button class="btn btn-danger" onClick="removeEnterprise(${enterprise.id})" >
                     Apagar 
                    </button>
                </td>
            <tr>`
        );
    }
    $(function(){;
        loadingEnterprises();
    });
</script>