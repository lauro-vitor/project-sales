<script>
    function loadingTypeProvider() {
        $.getJSON('/api/type_providers/', function(res){
            let typeProviders = res.typesProviders;
            typeProviders.map(function(typeProvider) {
                let line = buildLineOfTypeProvider(typeProvider);
                $('#typeProviderTable>tbody').append(line);
            });
        });
    }
    function buildLineOfTypeProvider(typeProvider) {
        return(
            `<tr id="${typeProvider.id}">
                <td>${typeProvider.id}</td>
                <td>${typeProvider.description}</td>
                <td>
                    <button class="btn btn-warning" onclick="edit(${typeProvider.id})">alterar</button>
                    <button class="btn btn-danger" onclick="remove(${typeProvider.id})">excluir</button>
                </td>
            </tr>`
        );
    }
    $(function(){
        loadingTypeProvider();
    });
</script>