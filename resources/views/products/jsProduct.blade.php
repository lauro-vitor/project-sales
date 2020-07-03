<script type="text/javascript">
  
    function loadingProducts() {
        $.getJSON('/api/products', function(products){
            for(let i = 0; i < products.length; i++) {
                let line = buildLineOfProducts(products[i]);
                $('#productsTable>tbody').append(line);
            }
        });
    }
    function buildLineOfProducts(product){
        return(
            `<tr id=${product.id}>` +
                '<td>' + product.id + '</td>' +
                '<td>' + product.description + '</td>' +
                '<td>' + product.unity + '</td>' +
                '<td>' + product.price + '</td>' +
                '<td>' + product.reference + '</td>' +
                '<td>' + product.category.name + '</td>' +
                '<td>' + product.ncm.code + '</td>' +
                '<td>' + product.aliquot.value + '</td>' +
                '<td>' + product.cson.code + '</td>' +
                '<td>' +
                    '<button class="btn btn-warning mr-3" onClick="editProduct('+product.id+')"> Editar </button>' +
                    '<button class="btn btn-danger mr-3" onClick="removeProduct('+product.id+')" > Apagar </button>' +
                '</td>' +
            '<tr>'
        );
    }
    //categories
    function loadingCategories() {
        $.getJSON('/api/categories', function (categories){
            categories.map(function(category) {
                let option = 
                '<option value ="'+ category.id +'" >' +
                    category.name +
                '</ option>';

                $('#category').append(option);
            });
        })
    }

    //ncm
    function loadingNcms(){
        $.getJSON('/api/ncms', function(ncms) {
            ncms.map(function (ncm){
                let option = 
                    '<option value = "' + ncm.id + '" >' +
                        ncm.code +
                    '</ option>'
                ;
                $('#ncms').append(option);
            });
        })
    }
    //aliquots
    function loadingAliquots(){
        $.getJSON('/api/aliquots', function (aliquots){
            aliquots.map( function(aliquot) {
                let option = 
                    '<option value = "' + aliquot.id + '" >' +
                        aliquot.state + ' ' + aliquot.value +
                    '</ option>'
                ;
                $('#aliquot').append(option);
            });
        });
    }
    function loadingCsons() {
        $.getJSON('/api/csons', function(csons) {
            csons.map(function (cson) {
                let option = 
                    '<option value = "' + cson.id + '" >' +
                        cson.code
                    '</ option>'
                ;
                $('#cson').append(option);
            });
        });
    }
  
     $(function(){
            loadingCategories();
            loadingNcms();
            loadingAliquots();
            loadingCsons();
            loadingProducts();
        })
</script>