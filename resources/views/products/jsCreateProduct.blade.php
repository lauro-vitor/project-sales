<script>
    $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN' : "{{ csrf_token() }}"
      }
  });
  function clearFormOfProduct(){
    $('#idInput').val('');
    $('#description').val('');
    $('#unity').val('');
    $('#price').val('');
    $('#reference').val('');
    $('#category').val('');
    $('#ncms').val('');
    $('#aliquot').val('');
    $('#cson').val('');
  }
  function createProduct(){
      let product = {
        description: $('#description').val(),
        unity: $('#unity').val(),
        price: $('#price').val(),
        reference: $('#reference').val(),
        category_id: $('#category').val(),
        ncm_id: $('#ncms').val(),
        aliquot_id: $('#aliquot').val(),
        cson_id: $('#cson').val(),
        enterprise_id : 1
      };
     $.post('/api/products', product, function (response) {
        let res = JSON.parse(response);
        let line = buildLineOfProducts(res.product);
        $('#productsTable>tbody').append(line);
        alert(res.message);
     });
  }
</script>