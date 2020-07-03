<script>
    function removeAliquot(id) {
        $.ajax({
            type: 'DELETE',
            url: `/api/aliquots/${id}`,
            context: this,
            success: function(response) {
                if(response.httpCode == 201) {
                    document.getElementById(id).textContent = '';
                }
                alert(response.message);
            },
            error: function(error) {
                let message = 'ERROR\n' +error.responseJSON.message;
                alert(message);
            }
        });
    }
</script>