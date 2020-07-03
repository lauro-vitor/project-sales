<script>
    $('#ncmForm').submit(function(event) {
        event.preventDefault();
        
        if($('#idInput').val() == '') {
            createNcm();
        } else {
            updateNcm();
        }
        $('#ncmFormDialog').modal('hide');
    });
</script>   