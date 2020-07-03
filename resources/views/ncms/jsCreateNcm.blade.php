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
        let line = buildLineOfNcm(res.ncm);
        $('#ncmsTable>tbody').append(line);
        alert(res.message);
     });
  }
</script>