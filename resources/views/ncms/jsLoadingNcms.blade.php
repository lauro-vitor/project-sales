<script>    
   function loadingNcm() {
       $.getJSON('/api/ncms', function(ncms) {
           ncms.map(function(ncm) {
               let line = buildLineOfNcm(ncm);
                $('#ncmsTable>tbody').append(line);
           });
       });
   }
   function buildLineOfNcm(ncm) {
    return(
        `<tr id=${ncm.id} >` +
            `<td> ${ncm.id} </td>`+
            `<td> ${ncm.code} </td>` +
            `<td> ${ncm.name} </td>` +
            '<td>' +
                `<button class="btn btn-warning mr-2" onClick="editNcm(${ncm.id})">Editar</button>`+
                `<button class="btn btn-danger" onClick="removeNcm(${ncm.id})">Remover</button>` +
            '</td>' +
        '</tr>'
    );
   }
   $(function() {
       loadingNcm();
   });
</script>