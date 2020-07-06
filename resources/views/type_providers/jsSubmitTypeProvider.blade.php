<script>
    $('#typeProviderForm').submit(function(event){
        event.preventDefault();
        if($('#id').val() == '') {
            create();
        }else{
            update();
        }
        $('#typeProviderDialog').modal('hide');
    });
</script>