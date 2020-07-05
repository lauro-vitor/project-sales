<script>
    function loadingEnterprises(){
        $.getJSON('/api/enterprises',   function(response){
            if(response.httpCode == 201) {
                let enterprises = response.enterprises;
                enterprises.map(function(enterprise){
                    let option = buildOptionOfEnterprises(enterprise);
                    $('#enterprise').append(option);
                });
            }
        });
    }
    function buildOptionOfEnterprises(enteprise) {
        return(
            `<option value="${enteprise.id}">${enteprise.name}</option>`
        );
    }
    $(function(){
        loadingEnterprises();
    });
</script>