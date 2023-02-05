jQuery(function () {

    lightbox.init();

    $('body').on(function (event) {
        if (event.keyCode == '13') {
            return false;
        }
    });

    $('.nav-tabs a, .bt_nav_menu').click(function (e) {
        e.preventDefault();
        // $(this).tab('show');
    })

    $("#locators_id").autocomplete({
        serviceUrl: 'locadores.autocomplete?autcomplete_field=locators_id',
        autoFocus: true,
        minChars: 1,
        deferRequestBy: 5,
        noCache: true,
        onSelect: function (sugestion) {
            $("#locators_id").val(sugestion.data.idx);
            $("#locators_name").val(sugestion.data.name);
            $("#locators_cpf").val(sugestion.data.cnpj);
            $("#clients_name_search").val(sugestion.data.name);
            $("#companies_name_search").val(sugestion.data.companies_attach[0].name);
            $("#companies_id_search").val(sugestion.data.companies_attach[0].idx);
        }
    });

    $("#locators_name").autocomplete({
        serviceUrl: 'locadores.autocomplete?autcomplete_field=locators_name',
        autoFocus: true,
        minChars: 3,
        deferRequestBy: 5,
        noCache: true,
        onSelect: function (sugestion) {
            $("#clients_id").val(sugestion.data.idx);
            $("#locators_name").val(sugestion.data.name);
            $("#locators_cpf").val(sugestion.data.cnpj);
            $("#clients_name_search").val(sugestion.data.name);
            $("#companies_name_search").val(sugestion.data.companies_attach[0].name);
            $("#companies_id_search").val(sugestion.data.companies_attach[0].idx);
        }
    });

    $("#locators_cpf").autocomplete({
        serviceUrl: 'locadores.autocomplete?autcomplete_field=locators_cpf',
        autoFocus: true,
        minChars: 3,
        deferRequestBy: 5,
        noCache: true,
        onSelect: function (sugestion) {
            $("#locators_id").val(sugestion.data.idx);
            $("#locators_name").val(sugestion.data.name);
            $("#locators_cpf").val(sugestion.data.cnpj);
            $("#clients_name_search").val(sugestion.data.name);
            $("#companies_name_search").val(sugestion.data.companies_attach[0].name);
            $("#companies_id_search").val(sugestion.data.companies_attach[0].idx);
        }
    });
});

var StepIndex = "endereco";
function nextTab(step) {

    $('.nav-tabs li.active').removeClass('active');
    $('.tab-content .tab-pane.active').removeClass('in');
    setTimeout(function () {
        $('.tab-content .tab-pane.active').removeClass('active');

        $('.nav-tabs li a[href="#' + step + '"]').parent().addClass('active');
        $('.tab-content #' + step + '.tab-pane').addClass('active').addClass('in');
    }, 150);
    StepIndex = step;
}

$('.btnNext').click(function () {
    $('.nav-tabs > .active').next('li').find('a').trigger('click');
});

$('.btnPrevious').click(function () {
    $('.nav-tabs > .active').prev('li').find('a').trigger('click');
});

/* CONSULTA CEP */
$("#cep").change(function () {

    //Nova variável "cep" somente com dígitos.
    var cep = $(this).val().replace(/\D/g, '');

    //Verifica se campo cep possui valor informado.
    if (cep != "") {

        //Expressão regular para validar o CEP.
        var validacep = /^[0-9]{8}$/;

        //Valida o formato do CEP.
        if (validacep.test(cep)) {

            //Preenche os campos com "..." enquanto consulta webservice.
            $("#endereco").val("...");
            $("#bairro").val("...");
            $("#cidade").val("...");
            $("#estado").val("...");

            //Consulta o webservice viacep.com.br/
            $.getJSON("https://viacep.com.br/ws/" + cep + "/json/?callback=?", function (dados) {

                if (!("erro" in dados)) {
                    //Atualiza os campos com os valores da consulta.
                    $("#endereco").val(dados.logradouro);
                    $("#bairro").val(dados.bairro);
                    $("#cidade").val(dados.localidade);
                    $("#estado").val(dados.uf);
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

function limpa_formulário_cep() {
    //Limpa valores do formulário de cep.
    $('rua').val("");
    $('bairro').val("");
    $('cidade').val("");
    $('uf').val("");
}