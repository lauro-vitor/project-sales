<script>
    $('#category').submit(function (event) {
        event.preventDefault();
        
        if($('#idInput').val() == '') {
            createCategory();
        } else {
            updateCategory();
        }
        $('#productFormDialog').modal('hide');
    });
</script>