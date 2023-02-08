jQuery(function () {

    // lightbox.init();

    $('body').on(function (event) {
        if (event.keyCode == '13') {
            return false;
        }
    });

    $('.nav-tabs a, .bt_nav_menu').click(function (e) {
        e.preventDefault();
        // $(this).tab('show');
    })

    $("#is_married").hide();

    $('#table-additionalproperties').DataTable({
        pageLength: 10,
        language: {
            processing: "Processando...",
            search: "Pesquisar: ",
            lengthMenu: "_MENU_ resultados por página",
            info: "Mostrando de _START_ até _END_ de _TOTAL_ registros",
            infoEmpty: "Mostrando 0 até 0 de 0 registros",
            infoFiltered: "(Filtrados de _MAX_ registros)",
            infoPostFix: "",
            loadingRecords: "Processando...",
            zeroRecords: "Nenhum registro encontrado",
            emptyTable: "Nenhum registro encontrado",
            paginate: {
                first: "Primeiro",
                previous: "Anterior",
                next: "Próximo",
                last: "Último"
            },
            aria: {
                sortAscending: ": Ordenar colunas de forma ascendente",
                sortDescending: ": Ordenar colunas de forma descendente"
            }
        },
        order: [[0, "desc"]],
        lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "Tudo"]]
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

$("#estado_civil").change(function () {
    var estado_civil = $(this).val();

    if (estado_civil == 'married') {
        $("#is_married").show();
    } else {
        $("#is_married").hide();

        $('#spouse_first_name').val('');
        $('#spouse_last_name').val('');
        $('#spouse_cpf').val('');
        $('#spouse_nacionality').val('');
        $('#spouse_celphone').val('');
        $('#spouse_is_show_financer').val('');
    }
})

/* CONSULTA CEP */
$(".cep").change(function () {

    //Nova variável "cep" somente com dígitos.
    var cep = $(this).val().replace(/\D/g, '');

    //Verifica se campo cep possui valor informado.
    if (cep != "") {

        //Expressão regular para validar o CEP.
        var validacep = /^[0-9]{8}$/;

        //Valida o formato do CEP.
        if (validacep.test(cep)) {

            //Preenche os campos com "..." enquanto consulta webservice.
            $(".endereco").val("...");
            $(".bairro").val("...");
            $(".cidade").val("...");
            $(".estado").val("...");

            //Consulta o webservice viacep.com.br/
            $.getJSON("https://viacep.com.br/ws/" + cep + "/json/?callback=?", function (dados) {
                if (!("erro" in dados)) {
                    //Atualiza os campos com os valores da consulta.
                    $(".endereco").val(dados.logradouro);
                    $(".bairro").val(dados.bairro);
                    $(".cidade").val(dados.localidade);
                    $(".estado").val(dados.uf);
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
    $('.endereco').val("");
    $('.bairro').val("");
    $('.cidade').val("");
    $('.uf').val("");
}