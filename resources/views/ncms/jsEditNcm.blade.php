<script>
    function editNcm(id){
      $.getJSON(`/api/ncms/${id}`, function(response) {
        if(response.httpCode == 201) {
            $('#idInput').val(response.ncm.id);
            $('#code').val(response.ncm.code);
            $('#name').val(response.ncm.name);
            $('#ncmFormDialog').modal('show');
        } else {
            alert(response.message);
        }
      });
    }
    function updateNcm()  {
        let ncm = {
            id : $('#idInput').val(),
            code: $('#code').val(),
            name: $('#name').val()
        }
        $.ajax({
            type: "PUT",
            url: `/api/ncms/${ncm.id}`,
            data: ncm,
            context: this,
            success: function(response) {
                if(response.httpCode == 201){
                    let ncm = response.ncm;
                    let line = document.getElementById(ncm.id);
                    line.cells[1].innerHTML = ncm.code;
                    line.cells[2].innerHTML = ncm.name;
                }
                alert(response.message);
                $('#ncmFormDialog').modal('hide');
            },
            error: function(error) {
                alert(error);
            }
        });
    }
</script>