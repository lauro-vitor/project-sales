<script>
     $('#csons').submit(function (event) {
        event.preventDefault();
        
        if($('#idInput').val() == '') {
            createCson();
        } else {
            updateCson();
        }
        $('#csonDialog').modal('hide');
    });
</script>