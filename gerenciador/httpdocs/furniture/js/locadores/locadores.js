$(document).ready(function () {
    $('#locators-table').DataTable({
        pageLength: 10,
        language: {
            processing: "Processando...",
            search: "Pesquisar: ",
            lengthMenu: "_MENU_ resultados por página",
            info: "Mostrando de _START_ até _END_ de _TOTAL_ registros",
            infoEmpty: "Mostrando 0 até 0 de 0 registros",
            infoFiltered: "(Filtrados de _MAX_ registros)",
            infoPostFix: "",
            loadingRecords: "Processando...",
            zeroRecords: "Nenhum registro encontrado",
            emptyTable: "Nenhum registro encontrado",
            paginate: {
                first: "Primeiro",
                previous: "Anterior",
                next: "Próximo",
                last: "Último"
            },
            aria: {
                sortAscending: ": Ordenar colunas de forma ascendente",
                sortDescending: ": Ordenar colunas de forma descendente"
            }
        },
        order: [[0, "desc"]],
        lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "Tudo"]]
    });
});