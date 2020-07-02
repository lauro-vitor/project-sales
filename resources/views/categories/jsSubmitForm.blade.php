<script>
    $('#category').submit(function (event) {
        event.preventDefault();
        
        if($('#idInput').val() == '') {
            console.log('create');
            createCategory();
        } else {
            updateCategory();
        }
        $('#productFormDialog').modal('hide');
    });
</script>