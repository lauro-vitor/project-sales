<script>
    function loadingProviders(){
        $.getJSON('/api/providers/', function(response){
            if(response.httpCode == 201){
                let providers = response.providers;
                providers.map(function(provider){
                    let line = buildLineOfProviders(provider);
                    $('#providerTable>tbody').append(line);
                });
            }else{
                document.getElementById('errorTable').style.visibility = 'visible';
            }
        });
    }
    function buildLineOfProviders(provider){
        return(
            `<tr id="${provider.id}">
                <td>${provider.id}</td>
                <td>${provider.name}</td>
                <td>${provider.fantasy_name}</td>
                <td>${provider.cnpj}</td>
                <td>${provider.type_provider.description}</td>
                <td>${provider.contact.email}</td>
                <td>${provider.contact.phone}</td>
                <td>${provider.address.city}</td>
                <td>${provider.address.state}</td>
                <td>${provider.enterprise.name}</td>
                <td>
                    <button class="btn btn-warning" onclick="editProvider(${provider.id})">
                        Editar
                    </button>
                    <button class="btn btn-danger" onclick="removeProvider(${provider.id})">
                        Remover
                    </button>
                </td>
            </tr>`
        );
    }
    $(function(){
        loadingProviders();
    })
</script>