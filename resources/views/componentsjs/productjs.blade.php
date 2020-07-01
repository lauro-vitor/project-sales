<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN' : "{{ csrf_token() }}"
        }
    });

    function loadingProducts(){
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
                    '<button class="btn btn-warning mr-3" onClick="edit('+product.id+')"> Editar </button>' +
                    '<button class="btn btn-danger mr-3" onClick="remove('+product.id+')" > Apagar </button>' +
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
     $(function(){
            loadingProducts();
            loadingCategories();
        })
</script>