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

        <!-- Button trigger modal -->
        <form class="col-lg-12 mb-4" id="frm_filter" method="GET" action="<?php print($form["pattern"]["search"]) ?>">
            <input type="hidden" name="paginate" id="paginate" value="<?php print($paginate) ?>">
            <input type="hidden" name="ordenation" id="ordenation" value="<?php print($ordenation) ?>">
            <input type="hidden" name="sr" id="sr" value="<?php print($info["sr"]) ?>">
            <div class="row">
                <div class="col-lg-12">
                    <p class="h6 text-blue">Filtros de Busca:</p>
                    <hr>
                </div>

                <div class="col-sm-12 col-lg-4">
                    <div class="form-group">
                        <label for="filter_name">Nome:</label>
                        <input type="text" id="filter_name" class="form-control" name="filter_name" value="<?php print(isset($info["get"]["filter_name"]) ? $info["get"]["filter_name"] : "") ?>" class="form-control" placeholder="Digite o Nome">
                    </div>
                </div>

                <div class="col-sm-12 col-lg-8">

                </div>

                <div class="col-sm-12 col-lg-2">
                    <label for="btn_export">&nbsp;</label>
                    <button id="btn_export" type="submit" class="btn btn-primary btn-block btn-sm"><i class="bi bi-file-excel"></i> Exportar</button>
                </div>

                <div class="col-sm-12 col-lg-2">
                    <label for="btn_search">&nbsp;</label>
                    <button id="btn_search" type="submit" class="btn btn-primary btn-block btn-sm"><i class="bi bi-search"></i> Pesquisar</button>
                </div>
                <div class="col-sm-12 col-lg-2">
                    <label for="btn_add">&nbsp;</label>
                    <a id="btn_add" class="btn btn-primary btn-block btn-sm" title="Adicionar Propriedade" href="<?php print($form["pattern"]["new"]) ?>"><i class="bi bi-plus-circle"></i> Cadastrar</a>
                </div>
            </div>
            <hr>
        </form>
        <!-- Container Begin -->
        <div class="col-lg-12">
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