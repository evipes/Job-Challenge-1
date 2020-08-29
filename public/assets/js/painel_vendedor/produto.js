$(document).ready(function($) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // Configuração Datatables Produto
    var tabela = $('#table-products').DataTable({
        processing: true,
        serverSide: true,
        deferRender: true,
        ajax: './product/list',
        type: 'get',
        columns: [
            { data: 'id', name: 'order' },
            { data: 'slug', name: 'slug' },
            { data: 'name', name: 'name' },
            { data: 'amount', name: 'amount' },
            { data: 'acoes', name: 'acoes' },
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
            { targets: [0, 4], sortable: false },
            { "width": "5%", "targets": 0 }, //nº
            { "width": "10%", "targets": 1 }, //codigo
            { "width": "10%", "targets": 2 }, //nome
            { "width": "5%", "targets": 3 }, //valor
            { "width": "10%", "targets": 4 }, //ações

        ]
    });
    // Cria os ids da table
    tabela.on('draw.dt', function() {
        tabela.column(0, { search: 'applied', order: 'applied' }).nodes().each(function(cell, i) {
            cell.innerHTML = tabela.page.info().page * tabela.page.info().length + i + 1;
        });
    }).draw();

    // máscara para o input de valor
    $('#amount').mask('###0.00', { reverse: true });


    // Exibindo modal para adicionar produto
    $(document).on('click', '#btn-adicionar', function() {
        // Limpando Form
        $("#form-product")[0].reset();
        // Mudando título do modal
        $('#modal-title').text("Adicionar Produto");
        // Alterando classe de botão de enviar
        $('.modal-footer .btn-action').removeClass('edit');
        $('.modal-footer .btn-action').addClass('add');
        // Exibindo modal   
        $("#modal-product").modal('show');
    })

    // Exibindo modal para editar produto
    $(document).on('click', '.btnEditar', function() {
        // Limpando Form
        $("#form-product")[0].reset();
        // Mudando título do modal
        $('#modal-title').text("Editar Produto");
        // Alterando classe de botão de enviar
        $('.modal-footer .btn-action').removeClass('add');
        $('.modal-footer .btn-action').addClass('edit');
        // Preenchendo inputs com os dados do produto
        $('#name').val($(this).data('name'));
        $('#slug').val($(this).data('slug'));
        $('#amount').val($(this).data('amount'));
        $('#id-produto').val($(this).data('id'));
        // Exibindo modal
        $("#modal-product").modal('show');
    })

    // Copiando link do produto
    $(document).on('click', '.btnCopy', function() {
        // Pegando a URL do aplicação
        let base_url = location.protocol + '//' + window.location.host.toString() +
            '/' + 'checkout' + "/" + $(this).data('slug');
        // Criando um textarea e incorporando ao html para ajudar a copiar o link do produto
        var $Input = $("<textarea>");
        $("body").append($Input);
        // Selecionando e copiando o texto colocado dentro do input
        $Input.val(base_url).select();
        document.execCommand("copy");
        // Removendo input após uso
        $Input.remove();
        // Alert de link copiado
        Swal.fire({
            icon: 'success',
            title: 'Link do produto copiado com sucesso!',
            showConfirmButton: false,
            timer: 1300
        });
    });


    // Excluindo produto
    $(document).on('click', '.btnExcluir', function() {
        // Pegando e armazenando dados do produto a ser excluído
        let id = $(this).data('id');
        let dados = new FormData();
        dados.append("id", id);
        Swal.fire({
            title: "Deletar",
            text: "Está seguro(a) disso?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Sim",
            cancelButtonText: "Não"
        }).then(function(result) {
            // Caso a pessoa escolha apagar o produto
            if (result.value) {
                $.ajax({
                    type: 'post',
                    url: './product/delete',
                    data: dados,
                    processData: false,
                    contentType: false,
                    success: function(data) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Produto apagado!',
                            showConfirmButton: false,
                            timer: 1500
                        });
                        tabela.ajax.reload();
                    },
                    error: function(error) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Favor entrar em contato com o suporte.!',
                            showConfirmButton: false,
                            timer: 1500
                        });
                    }
                });
            }
        })
    })

    $(document).on('click', '.add', function() {
        // Pegando dados do formulário de produtos e aramazenando na variável dados
        let dados = new FormData($("#form-product")[0]);
        $.ajax({
            type: 'post',
            url: './product/adicionar',
            data: dados,
            processData: false,
            contentType: false,
            success: function(data) {
                // Recarregando dados da tabela
                tabela.ajax.reload();
                // Mensagem de sucesso
                Swal.fire({
                    icon: 'success',
                    title: 'Produto adicionado!',
                    showConfirmButton: false,
                    timer: 1500
                });
                // fechando modal
                $("#modal-product").modal('hide')
            },
            error: function(data) {
                // Verificando se existe erros quanto ao preenchimento do form

                if (data.responseJSON.hasOwnProperty('errors')) {
                    var error = data.responseJSON.errors;
                    var html = '';
                    //Manipular mensagens de erro na tela
                    for (var indice in error) {
                        html += error[indice][0] + "<br>";
                    }
                    if (html !== '')
                        Swal.fire({
                            title: "erro",
                            icon: 'error',
                            html: html,
                            showConfirmButton: true,
                        });
                }
                // Caso não seja erros de preenchimento do form exibido notificação
                //  de entrar em contato com o suporte
                else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Favor entrar em contato com o suporte.!',
                        showConfirmButton: false,
                        timer: 1500
                    });
                }
            }
        })

    })

    $(document).on('click', '.edit', function() {
        // Pegando dados do formulário de produtos e aramazenando na variável dados
        let dados = new FormData($("#form-product")[0]);
        $.ajax({
            type: 'post',
            url: './product/edit',
            data: dados,
            processData: false,
            contentType: false,
            success: function(data) {
                // Recarregando dados da tabela
                tabela.ajax.reload();
                // Mensagem de sucesso
                Swal.fire({
                    icon: 'success',
                    title: 'Produto Editado!',
                    showConfirmButton: false,
                    timer: 1500
                });
                // fechando modal
                $("#modal-product").modal('hide')
            },
            error: function(data) {
                // Verificando se existe erros quanto ao preenchimento do form
                if (data.responseJSON.hasOwnProperty('errors')) {
                    var error = data.responseJSON.errors;
                    var html = '';
                    //Manipular mensagens de erro na tela
                    for (var indice in error) {
                        html += error[indice][0] + "<br>";
                    }
                    if (html !== '')
                        Swal.fire({
                            title: "erro",
                            icon: 'error',
                            html: html,
                            showConfirmButton: true,
                        });
                }
                // Caso não seja erros de preenchimento do form exibido notificação
                //  de entrar em contato com o suporte
                else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Favor entrar em contato com o suporte!',
                        showConfirmButton: false,
                        timer: 1500
                    });
                }
            }
        })

    });;
});