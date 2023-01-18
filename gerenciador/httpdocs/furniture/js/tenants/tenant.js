$(document).ready(function () {

    $('body').keypress(function (event) {
        if (event.keyCode == '13') {
            return false;
        }
    });

    $('.money').mask("#.##0,00", {
        reverse: true
    });

    $('.document').mask("999.999.999-99");
    $('.phone').mask("(99) 9999-9999");
    $('.celphone').mask("(99) 99999-9999");
    $('.postalcode').mask("99999-999");

    var status = ($('#marital_status').val());

    if (status == 'married') {
        $("#conjuge").show();
    } else {
        $("#conjuge").hide();
    }

    var is_pet = ($('#is_pet').val());

    if (is_pet == 'yes') {
        $("#type_pet").show();
    } else {
        $("#type_pet").hide();
    }

    var work = ($('#type_work').val());

    if (work == 'clt') {
        $('#clt').show();
        $('#pj').hide();
    } else if (work == 'pj') {
        $('#pj').show();
        $('#clt').hide();
    } else {
        $('#pj').hide();
        $('#clt').hide();
        $('#show_address_info_financeiras').hide();
    }

    var fiance = ($('#type_fiance').val());

    if (fiance == 'guarantor') {
        $('#fiance').show();
        $('#type_work_fiance_div').show();
        $('#surety_bond').hide();
    } else if (fiance == 'surety_bond') {
        $('#surety_bond').show();
        $('#type_work_fiance_div').hide();
        $('#fiance').hide();
    } else {
        $('#surety_bond').hide();
        $('#fiance').hide();
        $('#type_work_fiance_div').hide();
    }

    var type_work_fiance_div = ($('#type_work_fiance').val());

    if (type_work_fiance_div == 'clt_fiance') {
        $('#clt_fiance').show();
        $('#pj_fiance').hide();
        $('#fiance_guarantor').hide();
    } else if (type_work_fiance_div == 'pj_fiance') {
        $('#pj_fiance').show();
        $('#clt_fiance').hide();
        $('#fiance_guarantor').hide();
    } else if (type_work_fiance_div == 'fiance_guarantor') {
        $('#fiance_guarantor').show();
        $('#pj_fiance').hide();
        $('#clt_fiance').hide();
    } else {
        $('#pj_fiance').hide();
        $('#clt_fiance').hide();
        $('#fiance_guarantor').hide();
    }
});

$('#marital_status').change(function () {
    var status = ($(this).val());

    if (status == 'married') {
        $("#conjuge").show();
    } else {
        $("#conjuge").hide();
    }
});

$('#is_pet').change(function () {
    var status = ($(this).val());

    if (status == 'yes') {
        $("#type_pet").show();
    } else {
        $('#type_pet').hide();
        $('#type_pet').val('');
    }
});

$('#type_work').change(function () {
    var status = ($(this).val());

    if (status == 'clt') {
        $('#clt').show();
        $('#pj').hide();
    } else if (status == 'pj') {
        $('#pj').show();
        $('#clt').hide();
    } else {
        $('#pj').hide();
        $('#clt').hide();
        $('#show_address_info_financeiras').hide();
    }
});

$('#type_work_fiance').change(function () {
    var status = ($(this).val());

    if (status == 'clt') {
        $('#clt_fiance').show();
        $('#pj_fiance').hide();
    } else if (status == 'pj') {
        $('#pj_fiance').show();
        $('#clt_fiance').hide();
    } else {
        $('#pj_fiance').hide();
        $('#clt_fiance').hide();
        $('#fiance_guarantor').hide();
    }
});

$('#type_fiance').change(function () {
    var status = ($(this).val());

    if (status == 'guarantor') {
        $('#fiance').show();
        $('#type_work_fiance_div').show();
        $('#surety_bond').hide();
    } else if (status == 'surety_bond') {
        $('#surety_bond').show();
        $('#type_work_fiance_div').hide();
        $('#fiance').hide();
    } else {
        $('#surety_bond').hide();
        $('#fiance').hide();
        $('#type_work_fiance_div').hide();
    }
});

/* CONSULTA CPF */
$("#cpf").change(function () {
    var cpf = $(this).val().replace(/\D/g, '');

    $.ajax({
        method: "POST",
        url: '/consultar_cpf_tenant',
        data: {
            cpf: cpf
        },
        beforeSend: function () {
            $(".spinner-border").show();
        },
        success: function (data) {
            var jsonData = JSON.parse(data);
            if (jsonData.error == true) {
                $("#error_cpf").removeClass("d-none").html('<span>' + jsonData.message + '</span>').css("color", "red");
                $("#btn_save").addClass("d-none");
            } else {
                $("#error_cpf").addClass("d-none");
                $("#btn_save").removeClass("d-none");
            }
        },
        complete: function () {
            $('.spinner-border').hide();
        }
    });
});

/* CONSULTA CEP */
$("#postalcode").change(function () {

    //Nova variável "cep" somente com dígitos.
    var cep = $(this).val().replace(/\D/g, '');

    //Verifica se campo cep possui valor informado.
    if (cep != "") {

        //Expressão regular para validar o CEP.
        var validacep = /^[0-9]{8}$/;

        //Valida o formato do CEP.
        if (validacep.test(cep)) {

            //Preenche os campos com "..." enquanto consulta webservice.
            $("#address").val("...");
            $("#district").val("...");
            $("#city").val("...");
            $("#uf").val("...");
            $("#ibge").val("...");

            //Consulta o webservice viacep.com.br/
            $.getJSON("https://viacep.com.br/ws/" + cep + "/json/?callback=?", function (dados) {

                if (!("erro" in dados)) {
                    //Atualiza os campos com os valores da consulta.
                    $("#address").val(dados.logradouro);
                    $("#district").val(dados.bairro);
                    $("#city").val(dados.localidade);
                    $("#uf").val(dados.uf);
                    $("#ibge").val(dados.ibge);
                } //end if.
                else {
                    //CEP pesquisado não foi encontrado.
                    limpa_formulário_cep();
                    alert("CEP não encontrado.");
                }
            });
        } //end if.
        else {
            //cep é inválido.
            limpa_formulário_cep();
            alert("Formato de CEP inválido.");
        }
    } //end if.
    else {
        //cep sem valor, limpa formulário.
        limpa_formulário_cep();
    }
});