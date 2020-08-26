$(document).ready(function() {

    //mascara cnpj
    function mask_cnpj() {
        // Alterando texto da label
        $("#cpf_cnpj_label").html('CNPJ');
        //alterando tipo de input
        $("#cpf_cnpj").attr('type', 'text');
        //Alterando nome do campo
        $("#cpf_cnpj").attr('name', 'cnpj');
        //Removendo mascaras anteriores
        $('#cpf_cnpj').unmask();
        //Adicionando mascara
        $("#cpf_cnpj").mask('00.000.000/0000-00', {
            reverse: true,
            placeholder: "00.000.000/0000-00"
        });
    }

    // mascara cpf
    function mask_cpf() {

        // Alterando texto da label
        $("#cpf_cnpj_label").html('CPF');
        //alterando tipo de input
        $("#cpf_cnpj").attr('type', 'text');
        //Alterando nome do campo
        $("#cpf_cnpj").attr('name', 'cpf');
        //Removendo mascaras anteriores
        $('#cpf_cnpj').unmask();
        //Adicionando mascara
        $('#cpf_cnpj').mask('000.000.000-00', {
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

});