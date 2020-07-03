<script>
    function removeNcm(id) {
      $.ajax({
          type: 'DELETE',
          url: `/api/ncms/${id}`,
          context: this,
          success: function(response) {
            if(response.httpCode == 201){
                document.getElementById(id).textContent = '';
            }
            alert(response.message);
          },
          error: function(error){
              alert(error.responseJSON.message);
          }
      });
    }
</script>