$(document).ready(function() {

    let base_url = location.protocol + '//' + window.location.host.toString();

    //mascara cnpj
    function mask_cnpj() {
        // Alterando texto da label
        $("#cpf-cnpj-label").html('CNPJ');
        //alterando tipo de input
        $("#cpf-cnpj").attr('type', 'text');
        //Alterando nome do campo
        $("#cpf-cnpj").attr('name', 'cnpj');
        //Removendo mascaras anteriores
        $('#cpf-cnpj').unmask();
        //Adicionando mascara
        $("#cpf-cnpj").mask('00.000.000/0000-00', {
            reverse: true,
            placeholder: "00.000.000/0000-00"
        });
    }

    // mascara cpf
    function mask_cpf() {

        // Alterando texto da label
        $("#cpf-cnpj-label").html('CPF');
        //alterando tipo de input
        $("#cpf-cnpj").attr('type', 'text');
        //Alterando nome do campo
        $("#cpf-cnpj").attr('name', 'cpf');
        //Removendo mascaras anteriores
        $('#cpf-cnpj').unmask();
        //Adicionando mascara
        $('#cpf-cnpj').mask('000.000.000-00', {
            reverse: true,
            placeholder: "000.000.000-00"
        });
    }


    //Mudar tipo e aplicar mascara de tratamento
    $("input[name='type']").click(function() {
        let tipo = $(this).val()
        if (tipo === 'cnpj')
            mask_cnpj();
        else
            mask_cpf()
    });

    // Iniciando a função da máscara de cpf   
    mask_cpf();


    $(document).on('click', '#btn-cadastrar', function(e) {
        e.preventDefault();
        dados = new FormData($("#form-register")[0]);
        $.ajax({
            type: 'post',
            url: 'register',
            data: dados,
            processData: false,
            contentType: false,
            success: function(data) {
                Swal.fire({
                    icon: 'success',
                    title: 'Cadastro efetuado com sucesso!',
                    showConfirmButton: true,
                });
                window.location.href = base_url;
            },
            error: function(data) {
                if (data.status === 400) {
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
                            showConfirmButton: false,
                        });
                } else {
                    // mensagem caso não seja erro interno
                    Swal.fire({
                        icon: 'error',
                        title: 'Favor entrar em contato com o suporte.!',
                        showConfirmButton: false,
                        timer: 1500
                    });
                }
            }
        });
    })
});