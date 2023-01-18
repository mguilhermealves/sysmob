$(function () {
  
});


$("#type").change(function () {
    var type = $(this).val();

    if (type == 'cpf') {
        $("#cpf").css( 'display', 'block' );
        $("#cnpj").css( 'display', 'none' );
    } else {
        $("#cnpj").css( 'display', 'block' );
        $("#cpf").css( 'display', 'none' );
    }

    console.log(type);
})