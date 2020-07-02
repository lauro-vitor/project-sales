<script>
     $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN' : "{{ csrf_token() }}"
        }
    });
    function clearForm(){
        $('#name').val('');
    }
    function createCategory() {
        let category = {
            name : $('#name').val()
        }
        $.post('/api/categories', category ,function(response) {
             let category = response.category;
             line = buildLineOfCategories(category);
             $('#categoriesTable>tbody').append(line);
             alert(response.message);
             $('#categoryDialog').modal('hide');
        });
    }
</script>