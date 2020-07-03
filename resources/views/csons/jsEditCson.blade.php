<script>
    function editCson(id) {
       $.getJSON(`api/csons/${id}`, function(response){
           if(response.httpCode == 201) {
                let cson = response.cson;
                $('#idInput').val(cson.id);
                $('#code').val(cson.code);
                $('#description').val(cson.description);
                $('#csonDialog').modal('show');
           }
       });
    }
    function updateCson() {
        let cson = {
            id: $('#idInput').val(),
            code: $('#code').val(),
            description: $('#description').val()
        }
        $.ajax({
            type: 'PUT',
            url: `api/csons/${cson.id}`,
            data: cson,
            success: function(response) {
                if(response.httpCode == 201) {
                    let cson = response.cson;
                    let line = document.getElementById(cson.id);
                    line.cells[1].innerHTML = cson.description;
                    line.cells[2].innerHTML = cson.code;
                }
                $('#csonDialog').modal('hide');
                alert(response.message);
            },
            error: function(error) {
                console.log(error);
            }
        });
    }
</script>