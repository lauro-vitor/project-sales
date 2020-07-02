<script>
    $('#product').submit(function (event) {
        event.preventDefault();
        
        if($('#idInput').val() == '') {
            createProduct();
        } else {
            updateProduct();
        }
        $('#productFormDialog').modal('hide');
    });
</script>