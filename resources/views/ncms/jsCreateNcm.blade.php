<script>  
    $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN' : "{{ csrf_token() }}"
      }
    });
    function clearFormOfNcm(){
    $('#idInput').val('');
    $('#code').val('');
    $('#name').val('');
  }
  function createNcm(){
      let ncm = {
        code: $('#code').val(),
        name: $('#name').val(),
      };
     $.post('/api/ncms', ncm, function (response) {
       if(response.httpCode == 201) {
          let line = buildLineOfNcm(response.ncm);
          $('#ncmsTable>tbody').append(line);
       }
        alert(response.message);
     });
  }
</script>