<script>
    $('#aliquotForm').submit(function (event) {
        event.preventDefault();
        
        if($('#idInput').val() == '') {
            createAliquot();
        } else {
            updateAliquot();
        }
        $('#aliquotDialog').modal('hide');
    });
</script>