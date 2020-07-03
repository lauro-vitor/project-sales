<script>
      $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN' : "{{ csrf_token() }}"
        }
     });
    function clearForm() {
        $('#idInput').val('');
        $('#name').val('');
        $('#fantasy_name').val('');
        $('#cnpj').val('');
        $('#register_state').val('');
        $('#email').val('');
        $('#phone').val('');
        $('#street').val('');
        $('#complement').val('');
        $('#state').val('');
        $('#city').val('');
    }
    function createContact(){
        let contact = {
            email: $('#email').val(),
            phone: $('#phone').val(),
        }
        $.post('/api/',contact, function(response){

        });
    }
    function createAddress() {
        let address = {
            street: $('#street').val(),
            complement: $('#complement').val(),
            state : $('#state').val(),
            city: $('#city').val('')
        }
    }
    function createEnterprise(){
      
      let enterprise = {
        name: $('#name').val(),
        fantasy_name: $('#fantasy_name').val(),
        cnpj: $('#cnpj').val(),
        register_state: $('#register_state').val(),
        
      };
     $.post('/api/enterprises', enterprise, function (response) {
        if(response.httpCode == 201) {
            line = buildLineOfEnterprises(response.enterprise);
            $('#enterpriseTable>tbody').append(line);
        }
        alert(response.message);
     });
  }
  
</script>