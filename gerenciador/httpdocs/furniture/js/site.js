$(".save-form-modal").click(function () {

    var form = $(this).parents('.reveal-modal');

    var temp = $("#" + form.attr('id')).find("select:disabled,textarea:disabled,input:disabled");

    $.each(temp, function (i, v) {
        $(v).attr("disabled", false);
    });

    var data = $("#" + form.attr('id')).find("select,textarea,input").serializeJSON();

    $.each(temp, function (i, v) {
        $(v).attr("disabled", true);
    });

    $.ajax({
        method: "POST",
        url: form.data("action"),
        data: {
            data: data,
            btn_save: true
        },
        beforeSend: function () {
        },
        success: function (data) {

            var data = JSON.parse(data);

            $('.reveal-modal').modal('hide');

            if ($("#row_" + data.idx).length) {
                $("#row_" + data.idx).remove();
            }

            $(form.data("table") + " tbody").append(data.html);

            $("#" + form.attr('id') + " :input:visible").each(function () {
                $(this).val('');
            });
        }
    });
});


$(".btn-remover-list").click(function () {
    var model = $(this).data("model");
    var id = $(this).data("id");
    var table = $(this).parents("table");

    $.ajax({
        method: "POST",
        url: "/remover-list",
        data: {
            model: model,
            id: id,
            btn_remove: true
        },
        beforeSend: function () {
        },
        success: function (data) {
            $("#row_" + id).fadeOut();
        }
    });
});