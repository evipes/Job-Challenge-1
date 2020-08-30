$(document).ready(function($) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // Configuração Datatables de vendas
    var tabela = $('#table-sales').DataTable({
        processing: true,
        serverSide: true,
        deferRender: true,
        ajax: './list-vendas',
        type: 'get',
        columns: [
            { data: 'id', name: 'order' },
            { data: 'name', name: 'name' },
            { data: 'amount', name: 'amount' },
            { data: 'status', name: 'status' },
        ],
        createdRow: function(row, data, index) {
            row.id = "item-" + data.id;
        },
        paging: true,
        lengthChange: true,
        searching: true,
        ordering: true,
        info: true,
        autoWidth: false,
        scrollX: true,
        sorting: [
            [1, "asc"]
        ],
        responsive: true,
        lengthMenu: [
            [10, 15, -1],
            [10, 15, "Todos"]
        ],
        language: {
            "sEmptyTable": "Nenhum registro encontrado",
            "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
            "sInfoFiltered": "(Filtrados de _MAX_ registros)",
            "sInfoPostFix": "",
            "sInfoThousands": ".",
            "sLengthMenu": "_MENU_ resultados por página",
            "sLoadingRecords": "Carregando...",
            "sProcessing": "<div><i class='fa fa-circle-o-notch fa-spin' style='font-size:38px;'></i> <span style='font-size:20px; margin-left: 5px'> Carregando...</span></div>",
            "sZeroRecords": "Nenhum registro encontrado",
            "sSearch": "Pesquisar",
            "oPaginate": {
                "sNext": "Próximo",
                "sPrevious": "Anterior",
                "sFirst": "Primeiro",
                "sLast": "Último"
            },
            "oAria": {
                "sSortAscending": ": Ordenar colunas de forma ascendente",
                "sSortDescending": ": Ordenar colunas de forma descendente"
            }
        },
        columnDefs: [
            { targets: [0, 3], sortable: false },
            { "width": "5%", "targets": 0 }, //nº
            { "width": "10%", "targets": 1 }, //produto
            { "width": "10%", "targets": 2 }, //valor
            { "width": "5%", "targets": 3 }, //status


        ]
    });
    // Cria os ids da table
    tabela.on('draw.dt', function() {
        tabela.column(0, { search: 'applied', order: 'applied' }).nodes().each(function(cell, i) {
            cell.innerHTML = tabela.page.info().page * tabela.page.info().length + i + 1;
        });
    }).draw();

});