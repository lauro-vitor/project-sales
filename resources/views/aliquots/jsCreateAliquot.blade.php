<script>
 $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN' : "{{ csrf_token() }}"
        }
    });
    function clearForm(){
        $('#idInput').val('');
        $('#state').val('');
        $('#value').val('');
    }
    function createAliquot() {
        let aliquot = {
            state: $('#state').val(),
            value: $('#value').val()
        }
        $.post(`/api/aliquots`, aliquot, function(response){
            if(response.httpCode == 201) {
                let line =  buildLineAliquots(response.aliquot);
                $('#aliquotsTable>tbody').append(line);
            }
            alert(response.message);
        });
    }
</script>