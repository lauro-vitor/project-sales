<script>
    function clearForm(){
        $('#id').val('');
        $('#description').val('');
    }
    function create(){
        let typeProvider = {
            description : $('#description').val(),
        }
        $.post('/api/type_providers/', typeProvider, function(res){
            if(res.httpCode == 201) {
                let line = buildLineOfTypeProvider(res.typeProvider);
                $('#typeProviderTable>tbody').append(line);
            }
            alert(res.message);
        });
    }
</script>