<section class="content-header">
    <h1>
        <?php print(constant("cTitle")) ?>
        <small><?php print($form["title"]) ?></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li><a href="<?php print($pages["pages"]["url"]) ?>"><?php print($pages["pages"]["name"]); ?> </a></li>
        <li class="active"><?php print($pages["page"]["name"]); ?></li>
    </ol>
</section>

<section class="content">
    <div class="row">
        <div class="container-fluid">
            <div class="box-body">
                <form action="<?php print($form["url"]) ?>" method="post" enctype="multipart/form-data">
                    <?php
                    if (isset($info["get"]["done"]) && !empty($info["get"]["done"])) {
                    ?>
                        <input type="hidden" id="done" name="done" value="<?php print($info["get"]["done"]) ?>">
                    <?php
                    }
                    ?>

                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#endereco">Endereço</a></li>
                        <li><a href="#imoveis">Imóveis</a></li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="endereco">
                            <div class="box box-primary">
                                <div class="box-body">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="cep">CEP: </label>
                                            <input type="text" class="form-control" id="cep" name="cep" value="<?php print(isset($data["cep"]) ? $data["cep"] : "") ?>">
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="endereco">Endereço: </label>
                                            <input type="text" class="form-control" id="endereco" name="endereco" value="<?php print(isset($data["endereco"]) ? $data["endereco"] : "") ?>" readonly>
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="numero">Número: </label>
                                            <input type="text" class="form-control" id="numero" name="numero" value="<?php print(isset($data["numero"]) ? $data["numero"] : "") ?>">
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="complemento">Complemento: </label>
                                            <input type="text" class="form-control" id="complemento" name="complemento" value="<?php print(isset($data["complemento"]) ? $data["complemento"] : "") ?>">
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="bairro">Bairro: </label>
                                            <input type="text" class="form-control" id="bairro" name="bairro" value="<?php print(isset($data["bairro"]) ? $data["bairro"] : "") ?>" readonly>
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="cidade">Cidade: </label>
                                            <input type="text" class="form-control" id="cidade" name="cidade" value="<?php print(isset($data["cidade"]) ? $data["cidade"] : "") ?>" readonly>
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="estado">Cidade: </label>
                                            <input type="text" class="form-control" id="estado" name="estado" value="<?php print(isset($data["estado"]) ? $data["estado"] : "") ?>" readonly>
                                        </div>
                                    </div>
                                </div>

                                <div class="box-footer">
                                    <div class="col-lg-12 horizontal-center">
                                        <a class="btn btn-primary" onclick="nextTab('imoveis')"><i class="bi bi-arrow-right-circle"></i> Próximo</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane" id="imoveis">
                            <div class="box box-primary">
                                <div class="box-body">
                                    <div class="col-lg-12 horizontal-right">
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#cadastrar_imovel">Adicionar Imóvel</button>
                                    </div>

                                    <div class="col-lg-12 margin-top-20">
                                        <h3 class="horizontal-center margin-15">Lista de Imóveis</h3>

                                        <table class="table table-striped table-inverse table-responsive" id="table-additionalproperties">
                                            <thead class="thead-inverse">
                                                <tr>
                                                    <th>Código do Imóvel</th>
                                                    <th>Tipo Imovel</th>
                                                    <th>Objetivo</th>
                                                    <th>Finalidade</th>
                                                    <th>Ação</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if (isset($data["additionalproperties_attach"][0])) {
                                                    foreach ($data["additionalproperties_attach"] as $k => $additionalproperty) {
                                                ?>
                                                        <tr id="row_<?php print($additionalproperty["idx"]) ?>">
                                                            <td scope="row">1</td>
                                                            <td>Casa Terrea</td>
                                                            <td>Locação</td>
                                                            <td>Residencial</td>
                                                            <td>
                                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editar_<?php print($additionalproperty["idx"]) ?>">Editar</button>
                                                                <button type="button" title="Excluir Imóvel Adicional" class="btn btn-danger btn-remover-list" data-id="<?php print($additionalproperty["idx"]) ?>" data-model="additionalproperties">Excluir</a>
                                                            </td>
                                                        </tr>
                                                        <?php include(constant("cRootServer") . "ui/page/propriedades/modais/imovel/editar.php"); ?>
                                                <?php }
                                                } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <div class="box-footer">
                                    <div class="col-lg-12 horizontal-center">
                                        <a class="btn btn-secondary" onclick="nextTab('endereco')"><i class="bi bi-arrow-left-circle"></i> Anterior</a>
                                        <a class="btn btn-primary" onclick="nextTab('imoveis')"><i class="bi bi-arrow-right-circle"></i> Próximo</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Historico</h3>
                        </div>

                        <div class="box-body">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="">Cadastrado por:</label>
                                    <input type="text" disabled class="form-control" name="" id="" value="<?php print($data["usersCreated_attach"][0]["first_name"] . " " . $data["usersCreated_attach"][0]["last_name"]) ?>">

                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="">Data do Cadastro</label>
                                    <input type="text" disabled class="form-control" name="" id="" value="<?php print(preg_replace("/^(....).(..).(..).+$/", "$3/$2/$1", $data["created_at"])) ?>">
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="">Data Ultima Alteração</label>
                                    <input type="text" disabled class="form-control" name="" id="" value="<?php ?>">
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- <div class="col-sm-12 text-right">
                        <button type="submit" name="btn_save" class="btn btn-primary btn-sm"><?php print(isset($data["idx"]) ? "Salvar" : "Cadastrar") ?></button>
                    </div> -->
                </form>
            </div>
        </div>
    </div>
</section>

<!-- Modais -->
<?php include(constant("cRootServer") . "ui/page/propriedades/modais/imovel/cadastrar.php"); ?>