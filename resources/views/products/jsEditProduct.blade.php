<script>
    function editProduct(id) {
        $.getJSON(`/api/products/${id}`, function(response) {
            $('#idInput').val(id);
            $('#description').val(response.description);
            $('#unity').val(response.unity);
            $('#price').val(response.price);
            $('#reference').val(response.reference);
            $('#category').val(response.category_id);
            $('#ncms').val(response.ncm_id);
            $('#aliquot').val(response.aliquot_id);
            $('#cson').val(response.cson_id);
            $('#productFormDialog').modal('show');
        });
    }
    function updateProduct() {
        let product = {
            id : $('#idInput').val(),
            description: $('#description').val(),
            unity: $('#unity').val(),
            price: $('#price').val(),
            reference: $('#reference').val(),
            category_id: $('#category').val(),
            ncm_id: $('#ncms').val(),
            aliquot_id: $('#aliquot').val(),
            cson_id: $('#cson').val(),
            enterprise_id : 1
        }
        $.ajax({
            type: "PUT",
            url: `/api/products/${product.id}`,
            data: product,
            context: this,
            success: function(response) {
                if(response.httpCode == 201) {
                    let product =  response.product;
                    let lineProduct = document.getElementById(product.id);
                    lineProduct.cells[1].innerHTML = product.description;
                    lineProduct.cells[2].innerHTML = product.unity;
                    lineProduct.cells[3].innerHTML = product.price;
                    lineProduct.cells[4].innerHTML = product.reference;
                    lineProduct.cells[5].innerHTML = product.category.name;
                    lineProduct.cells[6].innerHTML = product.ncm.code;
                    lineProduct.cells[7].innerHTML = product.aliquot.value;
                    lineProduct.cells[8].innerHTML = product.cson.code;
                }
            },
            error: function(error) {
                console.log(error);
            }
        });
    }
</script>