$(document).ready(function() {

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


    $(document).on('submit', '#form-register', function(e) {
        e.preventDefault();
        dados = new FormData($("#form-register")[0]);
        $.ajax({
            type: 'post',
            url: 'register',
            data: dados,
            processData: false,
            contentType: false,
            error: function(data) {
                if (data.status === 400) {
                    var error = data.responseJSON.erros;
                    //Manipular mensagens na tela
                    for (var indice in error) {
                        $("[name='" + indice + "']").addClass('is-invalid');
                        $("div." + indice).text(error[indice][0])
                    }
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Erro interno, entre em contato com o suporte!',
                        showConfirmButton: false,
                        timer: 1500
                    });
                }
            }
        });
    })



});