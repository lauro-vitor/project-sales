<script>
    function loadingCson() {
        $.getJSON('/api/csons',function(response){
            let csons = response.csons;
            csons.map(function(cson){
                let line = buildLineOfCsons(cson);
                $('#csonsId>tbody').append(line);
            });
        });
    }
    function buildLineOfCsons(cson){
        return(
            `<tr id="${cson.id}">
                <td>${cson.id}</td>
                <td>${cson.description}</td>
                <td>${cson.code}</td>
                <td>
                    <button class="btn btn-warning" onclick="editCson(${cson.id})">
                        Alterar
                    </button>
                    <button class="btn btn-danger" onclick="removeCson(${cson.id})">
                        Remover
                    </button>
                </td>
            </tr>
            `
        );
    }
    $(function(){
        loadingCson();
    })
</script>