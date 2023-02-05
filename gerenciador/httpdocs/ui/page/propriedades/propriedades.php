<section class="content-header">
    <h1>
        Dashboard
        <small>Painel de Controle</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Propriedades</li>
    </ol>
</section>

<section class="content">
    <div class="row">
        <div class="col-lg-2 horizontal-right">
            <label for="btn_add">&nbsp;</label>
            <a id="btn_add" class="btn btn-primary btn-block btn-sm" title="Adicionar Propriedade" href="<?php print($form["pattern"]["new"]) ?>"><i class="bi bi-plus-circle"></i> Adicionar</a>
        </div>
        
        <div class="col-lg-12 margin-top-50">
            <?php html_notification_print(); ?>

            <table class="table table-striped table-inverse table-hover" id="properties-table">
                <thead class="thead-inverse">
                    <tr>
                        <th>Código da Propriedade</th>
                        <th>CEP </th>
                        <th>Endereço</th>
                        <th>Número</th>
                        <th>Bairro</th>
                        <th>Cidade</th>
                        <th>Estado</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</section>

<script>
    //export
    window.setTimeout(function() {
        jQuery("#btn_export").on("click", function() {
            jQuery("#frm_filter").prop({
                "action": "<?php print(set_url($GLOBALS["products_url"] . ".xls", $info["get"])) ?>"
            }).submit();
        })
    }, 1000);

    //filter
    window.setTimeout(function() {
        jQuery("#btn_search").on("click", function() {
            jQuery("#frm_filter").prop({
                "action": "<?php print(set_url($GLOBALS["products_url"])) ?>"
            }).submit();
        })
    }, 1000);
</script>

<style>
    .card-header {
        cursor: pointer;
    }

    .card-header .fa-chevron-up {
        display: none;
    }

    .card-header.collapsed .fa-chevron-up {
        display: inline-block;
    }

    .card-header.collapsed .fa-chevron-down {
        display: none;
    }

    .text-blue {
        color: blue !important;
    }
</style>