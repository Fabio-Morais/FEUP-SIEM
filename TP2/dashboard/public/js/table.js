// Call the dataTables jQuery plugin
$(document).ready(function() {
    $('#dataTable').DataTable();
});
$('#dataTable').DataTable( {
    "language": {
        "lengthMenu": "Mostrar _MENU_ dados por página",
        "zeroRecords": "Não encontramos nada, desculpe",
        "info": "Mostrando página _PAGE_ de _PAGES_",
        "infoEmpty": "No records available",
        "infoFiltered": "(filtered from _MAX_ total records)",
        "search": "Procurar",

    }
} );

