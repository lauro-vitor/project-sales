<script>
    function remove(id){
        $.ajax({
            type: 'DELETE',
            url: `/api/type_providers/${id}`,
            context: this,
            success: function(res) {
                if(res.httpCode == 201) {
                    document.getElementById(id).textContent = '';
                }
                alert(res.message);
            },
            error: function(error) {
                console.log(error);
            }
        });
    }
</script>