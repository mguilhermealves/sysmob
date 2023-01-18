<section class="content-header">
    <h1>
        Dashboard
        <small>Painel de Controle</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Usuários</li>
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

                <div class="col-sm-12 col-lg-3">
                    <div class="form-group">
                        <label for="filter_name">Nome:</label>
                        <input type="text" id="filter_name" class="form-control" name="filter_name" value="<?php print(isset($info["get"]["filter_name"]) ? $info["get"]["filter_name"] : "") ?>" class="form-control" placeholder="Digite o Nome">
                    </div>
                </div>

                <div class="col-sm-10 col-lg-2">
                    <label for="btn_export">&nbsp;</label>
                    <button id="btn_export" type="submit" class="btn btn-primary btn-block btn-sm"><i class="bi bi-file-excel"></i> Exportar</button>
                </div>

                <div class="col-sm-12 col-lg-2">
                    <label for="btn_search">&nbsp;</label>
                    <button id="btn_search" type="submit" class="btn btn-primary btn-block btn-sm"><i class="bi bi-search"></i> Pesquisar</button>
                </div>
                <div class="col-sm-12 col-lg-2">
                    <label for="btn_add">&nbsp;</label>
                    <a id="btn_add" class="btn btn-primary btn-block btn-sm" title="Adicionar" href="<?php print($form["pattern"]["new"]) ?>"><i class="bi bi-plus-circle"></i> Novo
                        Usuário</a>
                </div>
            </div>

            <hr>
        </form>
        <!-- Container Begin -->
        <div class="col-lg-12 margin-top-45" style="overflow: auto;">
            <?php html_notification_print(); ?>

            <table id="example2" class="table table-striped table-inverse table-hover">
                <thead class="thead-inverse">
                    <tr>
                        <th>Codigo</th>
                        <th>Nome</th>
                        <th>CPF</th>
                        <th>E-mail</th>
                        <th>Perfil</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($total > 0) {
                        foreach ($data as $v) { ?>
                            <tr>
                                <td><?php print($v["idx"]); ?></td>
                                <td><?php print($v["first_name"] . " " . $v["last_name"]); ?></td>
                                <td><?php print($v["cpf"]); ?></td>
                                <td><?php print($v["mail"]); ?></td>
                                <td><?php print($v["profiles_attach"][0]["name"]); ?></td>
                                <th>
                                    <a type="button" class="btn btn-primary btn-sm" href="<?php print(set_url(sprintf($form["pattern"]["action"], $v["idx"]), array("done" => urlencode($form["pattern"]["search"])))) ?>"><i class="bi bi-pencil-square"></i> Editar</a>
                                </th>
                            </tr>
                        <?php
                        }
                    } else {
                        ?>
                        <tr>
                            <td colspan="6">
                                <p class="alert alert-danger text-center">Nenhum usuário encontrado...</p>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</section>

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