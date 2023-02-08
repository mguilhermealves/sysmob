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
            <a id="btn_add" class="btn btn-primary btn-block" title="Adicionar Propriedade" href="<?php print($form["pattern"]["new"]) ?>"><i class="bi bi-plus-circle"></i> Adicionar</a>
        </div>

        <div class="col-lg-12 margin-top-50">
            <?php html_notification_print(); ?>

            <table class="table table-striped table-inverse table-responsive" id="locators-table">
                <thead class="thead-inverse">
                    <tr>
                        <th>Código da Locatário</th>
                        <th>Nome </th>
                        <th>Documento</th>
                        <th>E-mail</th>
                        <th>Telefone</th>
                        <th>Celular</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($total > 0) {
                        foreach ($data as $v) { ?>
                            <tr>
                                <td scope="row"><?php print($v["idx"]); ?></td>
                                <td><?php print($v["nome"] . " " . $v["sobrenome"]); ?></td>
                                <td><?php print($v["cpf"]); ?></td>
                                <td><?php print($v["mail"]); ?></td>
                                <td><?php print(isset($v["telefone"]) ? $v["telefone"] : "-"); ?></td>
                                <td><?php print(isset($v["celular"]) ? $v["celular"] : "-"); ?></td>
                                <td>
                                    <a type="button" class="btn btn-primary" href="<?php print(set_url(sprintf($form["pattern"]["action"], $v["idx"]), array("done" => urlencode($form["pattern"]["search"])))) ?>"><i class="bi bi-pencil-square"></i> Editar</a>
                                </td>
                            </tr>
                        <?php
                        }
                    } else {
                        ?>
                        <tr>
                            <td colspan="7">
                                <p class="alert alert-warning text-center">Nenhum locatário encontrado...</p>
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