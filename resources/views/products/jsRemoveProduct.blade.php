<script>
    function  removeProduct(id){
        $.ajax({
            type: "DELETE",
            url: `/api/products/${id}`,
            context: this,
            success: function (response) {
                document.getElementById(id).textContent = '';
                alert('Produto removido com sucesso');
            },
            error: function (error){
               console.log('error');
            }
        });
    }
</script>