<script>
    function loadingAliquots() {
        $.get('/api/aliquots', function(response){
            response.aliquots.map(function(aliquot){
                let line = buildLineAliquots(aliquot);
                $('#aliquotsTable>tbody').append(line);
            });
        });
    }
    function buildLineAliquots(aliquot) {
        return(
            `<tr id=${aliquot.id}>
                <td> ${aliquot.id} </td>
                <td>${aliquot.state} </td>
                <td>${aliquot.value}</td>
                <td>
                    <button class="btn btn-warning" onclick="editAliquot(${aliquot.id})">
                        Editar
                    </button>
                    <button class="btn btn-danger" onclick="removeAliquot(${aliquot.id})">
                        remover
                    </button>
                </td>
             </tr>
            `
        );
    }
    $(function() {
        loadingAliquots();
    });
</script>