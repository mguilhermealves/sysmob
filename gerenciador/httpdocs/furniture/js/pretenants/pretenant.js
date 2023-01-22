$(document).ready(function () {
    $("#dados-conjuge").hide();

    $(".phone").mask("(99) 9999-9999");

    $(".celphone").mask("(99) 99999-9999");

    var type_patrimony = $(".type_patrimony").val();

    if (type_patrimony == 'Imovel') {
        $(".imovel").show();
        $(".auto").hide();

        $("#tipo_auto").val("");
        $("#modelo_auto").val("");
        $("#ano_auto").val("");
    } else {
        $(".auto").show();
        $(".imovel").hide();

        $("#tipo_imovel").val("");
        $("#uf_imovel").val("");
        $("#onus").val("");
    }
});

$("#cpf_cnpj").keydown(function () {
    try {
        $("#cpf_cnpj").unmask();
    } catch (e) { }

    var tamanho = $("#cpf_cnpj").val().length;

    if (tamanho < 11) {
        $("#cpf_cnpj").mask("999.999.999-99");
    } else {
        $("#cpf_cnpj").mask("99.999.999/9999-99");
    }

    // ajustando foco
    var elem = this;
    setTimeout(function () {
        // mudo a posição do seletor
        elem.selectionStart = elem.selectionEnd = 10000;
    }, 0);
    // reaplico o valor para mudar o foco
    var currentValue = $(this).val();
    $(this).val('');
    $(this).val(currentValue);
});

$("#civil_status").change(function (e) {
    e.preventDefault();

    let civilStatus = $(this).val();

    if (civilStatus == "married") {
        $("#dados-conjuge").show();
    } else {
        $("#dados-conjuge").hide();
    }
});

$(".type_patrimony").change(function (e) {
    e.preventDefault();

    let type_patrimony = $(this).val();

    if (type_patrimony == 'Imovel') {
        $(".imovel").show();
        $(".auto").hide();

        $("#tipo_auto").val("");
        $("#modelo_auto").val("");
        $("#ano_auto").val("");
    } else {
        $(".auto").show();
        $(".imovel").hide();

        $("#tipo_imovel").val("");
        $("#uf_imovel").val("");
        $("#onus").val("");
    }
});