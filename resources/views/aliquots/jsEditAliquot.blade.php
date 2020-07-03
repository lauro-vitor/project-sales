<script>
    function editAliquot(id) {
       $.getJSON(`/api/aliquots/${id}`, function(response){
           let aliquot = response.aliquot;
            $('#idInput').val(aliquot.id);
            $('#state').val(aliquot.state);
            $('#value').val(aliquot.value);
            $('#aliquotDialog').modal('show');
       });
    }
    function updateAliquot(){
        let aliquot = {
            id: $('#idInput').val(),
            state: $('#state').val() ,
            value: $('#value').val()
        }
        $.ajax({
            type: 'PUT',
            url: `api/aliquots/${aliquot.id}`,
            data: aliquot,
            success: function(response) {
                if(response.httpCode == 201) {
                    let aliquot = response.aliquot;
                    let line = document.getElementById(aliquot.id);
                    line.cells[1].innerHTML = aliquot.state;
                    line.cells[2].innerHTML = aliquot.value;
                }
                alert(response.message); 
            },
            error: function(error) {
                console.log(error);
            }
        });
    }
</script>