$(document).ready(function($) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    let base_url = location.protocol + '//' + window.location.host.toString() +
        '/';

    $(document).on('click', '#enviar', function() {
        // Pegando a URL local
        let base_url = location.protocol + '//' + window.location.host.toString() +
            '/';
        // Pegando dados do formulário de produtos e aramazenando na variável dados
        let dados = new FormData($("#form-vendas")[0]);
        $.ajax({
            type: 'post',
            url: base_url + "checkout/sales",
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
})