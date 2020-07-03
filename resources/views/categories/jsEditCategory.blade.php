<script>
    function editCategory(id) {
       $.getJSON(`/api/categories/${id}`, function(response) {
            $('#idInput').val(response.id);
            $('#name').val(response.name);
            $('#categoryDialog').modal('show');
       });
    }
    function updateCategory() {
        let category = {
            id: $('#idInput').val(),
            name: $('#name').val(),
        }
        $.ajax({
            type: 'PUT',
            url: `api/categories/${category.id}`,
            data: category,
            success: function(response) {
                if(response.httpCode == 201) {
                    let category = response.category;
                    let line = document.getElementById(category.id);
                    line.cells[1].innerHTML = category.name;
                }
                $('#categoryDialog').modal('hide');
                alert(response.message);
            },
            error: function(error) {
                console.log(error);
            }
        });
    }
</script>