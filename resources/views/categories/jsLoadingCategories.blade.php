<script>
  function loadingCategories() {
        $.getJSON('/api/categories', function (categories){
            categories.map(function(category) {
                line = buildLineOfCategories(category);
                $('#categoriesTable>tbody').append(line);
            });
        })
    }
    function buildLineOfCategories(category){
        return(
            `<tr id=${category.id}>` +
                '<td>' + category.id + '</td>' +
                '<td>' + category.name + '</td>' +
                '<td>' +
                    '<button class="btn btn-warning mr-3" onClick="editCategory('+category.id+')"> Editar </button>' +
                    '<button class="btn btn-danger mr-3" onClick="removeCategory('+category.id+')" > Apagar </button>' +
                '</td>' +
            '<tr>'
        );
    }
    $(function(){
        loadingCategories();
    });
</script>