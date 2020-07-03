<script>
    function removeCategory(id) {
        $.ajax({
            type: 'DELETE',
            url: `/api/categories/${id}`,
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
    function handleRemoveError(){

    }
</script>