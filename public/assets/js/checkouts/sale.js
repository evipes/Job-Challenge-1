$(document).ready(function($) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // máscara para o campo cpf
    $('#cpf').mask('000.000.000-00', {
        reverse: true,
        placeholder: "000.000.000-00"
    });

    // Pegando a URL local
    let base_url = location.protocol + '//' + window.location.host.toString() +
        '/';

    // Ação de comprar caso seja a primeira compra
    $(document).on('click', '#btn-comprar', function(e) {
        e.preventDefault();

        // Pegando dados do formulário de produtos e aramazenando na variável dados
        let dados = new FormData($("#form-vendas")[0]);
        $.ajax({
            type: 'post',
            url: base_url + "checkout/store",
            data: dados,
            processData: false,
            contentType: false,
            success: function(data) {
                // Mensagem de sucesso
                Swal.fire({
                    icon: 'success',
                    title: 'Compra realizada com sucesso!',
                    showConfirmButton: false,
                    timer: 1500
                });
                // Redirecionando para o index
                window.location.href = base_url;
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

    // Ação de comprar usuário já logado
    $(document).on('click', '#btn-comprar-auth', function(e) {
        e.preventDefault();

        // Pegando dados do formulário de produtos e aramazenando na variável dados
        let dados = new FormData($("#form-vendas-auth")[0]);
        $.ajax({
            type: 'post',
            url: base_url + "checkout/store",
            data: dados,
            processData: false,
            contentType: false,
            success: function(data) {
                // Mensagem de sucesso
                Swal.fire({
                    icon: 'success',
                    title: 'Compra realizada com sucesso!',
                    showConfirmButton: false,
                    timer: 1500
                });
                // Redirecionando para o index
                window.location.href = base_url;
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