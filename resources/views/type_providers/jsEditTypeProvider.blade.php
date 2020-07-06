<script>
    function edit(id){
       $.getJSON(`/api/type_providers/${id}`, function(res){
            if(res.httpCode == 201){
                $('#id').val(res.typeProvider.id);
                $('#description').val(res.typeProvider.description);
                $('#typeProviderDialog').modal('show');
            }
       });
    }
    function update() {
        let typeProvider = {
            id: $('#id').val(),
            description: $('#description').val()
        }
        $.ajax({
            type:'PUT' ,
            url:`/api/type_providers/${typeProvider.id}`,
            data: typeProvider,
            success: function(res){
                if(res.httpCode == 201) {
                    let line = document.getElementById(res.typeProvider.id);
                    line.cells[1].innerHTML = res.typeProvider.description;
                }
                alert(res.message);
            },
            error: function(error){
                console.log(error);
            }
        });
    }
</script>