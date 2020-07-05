<script>
    function loadingTypeProviders(){
        $.getJSON('/api/type_providers', function(response){
            if(response.httpCode == 201) {
                let typeProviders = response.typesProviders;
                typeProviders.map(function(typeProvider){
                    let option = buildOptionsOfTypeProviders(typeProvider);
                    $('#type_provider').append(option);
                });
            }
        });
    }
    function buildOptionsOfTypeProviders(typeProvider){
        return(
            `<option value="${typeProvider.id}">${typeProvider.description}</option>`
        );
    }
    $(function(){
        loadingTypeProviders();
    })
</script>