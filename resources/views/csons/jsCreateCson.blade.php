<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN' : "{{ csrf_token() }}"
        }
    });
    function createCson(){
        let cson = {
            description : $('#description').val(),
            code: $('#code').val()
        }
        $.post(`/api/csons`,cson , function(response){
            if(response.httpCode == 201){
                let line = buildLineOfCsons(response.cson);
                $('#csonsId>tbody').append(line);
            }
            alert(response.message);
        });
    };
    function clearForm(){
        $('#idInput').val('');
        $('#description').val('');
        $('#code').val('');
    }

</script>