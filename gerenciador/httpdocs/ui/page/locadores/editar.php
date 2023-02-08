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
                                            <label for="nome">Nome: </label>
                                            <input type="text" class="form-control" id="nome" name="nome" value="<?php print(isset($data["nome"]) ? $data["nome"] : "") ?>">
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="sobrenome">Sobrenome: </label>
                                            <input type="text" class="form-control" id="sobrenome" name="sobrenome" value="<?php print(isset($data["sobrenome"]) ? $data["sobrenome"] : "") ?>">
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="cpf">CPF/CNPJ: </label>
                                            <input type="text" class="form-control" id="cpf" name="cpf" value="<?php print(isset($data["cpf"]) ? $data["cpf"] : "") ?>">
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="rg">RG: </label>
                                            <input type="text" class="form-control" id="rg" name="rg" value="<?php print(isset($data["rg"]) ? $data["rg"] : "") ?>">
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="genero">Genero: </label>
                                            <select class="form-control" id="genero" name="genero">
                                                <?php
                                                foreach ($GLOBALS["genre_lists"] as $k => $v) {
                                                    printf('<option %s value="%s">%s</option>', isset($data["genero"]) && $k == $data["genero"] ? ' selected' : '', $k, $v);
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="nacionalidade">Nacionalidade: </label>
                                            <input type="text" class="form-control" id="nacionalidade" name="nacionalidade" value="<?php print(isset($data["nacionalidade"]) ? $data["nacionalidade"] : "") ?>">
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="telefone">Telefone: </label>
                                            <input type="text" class="form-control telefone" name="telefone" value="<?php print(isset($data["telefone"]) ? $data["telefone"] : "") ?>">
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="celular">Celular: </label>
                                            <input type="text" class="form-control celular" name="celular" value="<?php print(isset($data["celular"]) ? $data["celular"] : "") ?>">
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="mail">E-mail: </label>
                                            <input type="mail" class="form-control" id="mail" name="mail" value="<?php print(isset($data["mail"]) ? $data["mail"] : "") ?>">
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="estado_civil">Estado Civil: </label>
                                            <select class="form-control" id="estado_civil" name="estado_civil">
                                                <?php
                                                foreach ($GLOBALS["civil_status_list"] as $k => $v) {
                                                    printf('<option %s value="%s">%s</option>', isset($data["estado_civil"]) && $k == $data["estado_civil"] ? ' selected' : '', $k, $v);
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="box box-primary" id="is_married">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Dados do Conjuge</h3>
                                </div>

                                <div class="box-body">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="spouse_first_name">Nome: </label>
                                            <input type="text" class="form-control" id="spouse_first_name" name="spouse[first_name]" value="<?php print(isset($data["prespouses_attach"]) ? $data["prespouses_attach"][0]["first_name"] : "") ?>">
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="spouse_last_name">Sobrenome: </label>
                                            <input type="text" class="form-control" id="spouse_last_name" name="spouse[last_name]" value="<?php print(isset($data["prespouses_attach"]) ? $data["prespouses_attach"][0]["last_name"] : "") ?>">
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="spouse_cpf">CPF: </label>
                                            <input type="text" class="form-control" id="spouse_cpf" name="spouse[cpf]" value="<?php print(isset($data["prespouses_attach"]) ? $data["prespouses_attach"][0]["cpf"] : "") ?>">
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="spouse_nacionality">Nacionalidade: </label>
                                            <input type="text" class="form-control" id="spouse_nacionality" name="spouse[nacionality]" value="<?php print(isset($data["prespouses_attach"]) ? $data["prespouses_attach"][0]["nacionality"] : "") ?>">
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="spouse_celphone">Celular: </label>
                                            <input type="text" class="form-control celphone" id="spouse_celphone" name="spouse[celphone]" value="<?php print(isset($data["prespouses_attach"]) ? $data["prespouses_attach"][0]["celphone"] : "") ?>">
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="spouse_is_show_financer">Incluir Informações Financeiras do Conjugê? </label>
                                            <select class="form-control" id="spouse_is_show_financer" name="spouse[is_show_financer]">
                                                <option value="">Selecione</option>
                                                <?php
                                                foreach ($GLOBALS["yes_no_lists"] as $k => $v) {
                                                    printf('<option %s value="%s">%s</option>', isset($data["prespouses_attach"]) && $k == $data["prespouses_attach"][0]["is_show_financer"] ? ' selected' : '', $k, $v);
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="box box-primary">
                                <div class="box-footer">
                                    <div class="col-lg-12 horizontal-center">
                                        <a class="btn btn-primary" onclick="nextTab('imoveis')"><i class="bi bi-arrow-right-circle"></i> Próximo</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane" id="imoveis">
                            <div class="box box-primary">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Adicionar Imóvel</h3>
                                </div>

                                <div class="box-body">
                                    <div class="col-lg-12 horizontal-right">
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#cadastrar_imovel">Adicionar Imóvel</button>
                                    </div>

                                    <div class="col-lg-12 margin-top-20">
                                        <h3 class="horizontal-center margin-bottom-50">Lista de Imóveis</h3>

                                        <table class="table table-striped table-inverse table-responsive" id="table-additionalproperties">
                                            <thead class="thead-inverse">
                                                <tr>
                                                    <th>Código do Imóvel</th>
                                                    <th>Tipo Imóvel</th>
                                                    <th>Objetivo</th>
                                                    <th>Finalidade</th>
                                                    <th>Endereço</th>
                                                    <th>Status</th>
                                                    <th>Ação</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if (isset($data["additionalproperties_attach"][0])) {
                                                    $endereçoCompleto = "";
                                                    foreach ($data["additionalproperties_attach"] as $k => $additionalproperty) {
                                                        if (empty($info["post"]["complemento"])) {
                                                            $endereçoCompleto = $additionalproperty["endereco"] . ", N° " . $additionalproperty["numero"] . ", " . $additionalproperty["bairro"] . ", " . $additionalproperty["cidade"] . " - " . $additionalproperty["uf"];
                                                        } else {
                                                            $endereçoCompleto = $additionalproperty["endereco"]  . ", N° " . $additionalproperty["numero"] . ", " . $additionalproperty["complemento"] . ", " . $additionalproperty["bairro"] . ", " . $additionalproperty["cidade"] . " - " . $additionalproperty["uf"];
                                                        }
                                                ?>
                                                        <tr id="row_<?php print($additionalproperty["idx"]) ?>">
                                                            <td scope="row"><?php print($additionalproperty["idx"]) ?></td>
                                                            <td><?php print($additionalproperty["tipo_imovel"]) ?></td>
                                                            <td><?php print($additionalproperty["objetivo"]) ?></td>
                                                            <td><?php print($additionalproperty["finalidade"]) ?></td>
                                                            <td><?php print($endereçoCompleto) ?></td>
                                                            <td><?php print($GLOBALS["status_propriedade"][$additionalproperty["status"]]) ?></td>
                                                            <td>
                                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editar_<?php print($additionalproperty["idx"]) ?>">Editar</button>
                                                                <button type="button" title="Excluir Imóvel Adicional" class="btn btn-danger btn-remover-list" data-id="<?php print($additionalproperty["idx"]) ?>" data-model="additionalproperties">Excluir</a>
                                                            </td>
                                                        </tr>
                                                        <?php include(constant("cRootServer") . "ui/page/locadores/modais/imovel/editar.php"); ?>
                                                <?php }
                                                } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="box box-primary">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Informações Complementares</h3>
                                </div>

                                <div class="box-body">
                                    <div class="col-lg-12 margin-top-20">
                                        <?php
                                        $inputs = array(
                                            'academia' => ' Academia',
                                            'area-de-servico' => ' Área de Serviço',
                                            'ar-condicionado' => ' Ar Condicionado',
                                            'auditorio' => ' Áuditório',
                                            'churrasqueira' => ' Churrasqueira',
                                            'edicula' => ' Edicula',
                                            'escritorio' => ' Escritório',
                                        );

                                        foreach ($inputs as $k => $input) {
                                            print('<div class="form-check">');
                                            print('<input class="form-check-input" type="checkbox" value="' . $k . '" id="' . $k . '">');
                                            print('<label class="form-check-label" for="' . $k . '">');
                                            print($input);
                                            print('</label>');
                                            print('</div>');
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>

                            <div class="box box-primary">
                                <div class="box-footer">
                                    <div class="col-lg-12 horizontal-center">
                                        <a class="btn btn-secondary" onclick="nextTab('endereco')"><i class="bi bi-arrow-left-circle"></i> Anterior</a>
                                        <button type="submit" name="btn_save" class="btn btn-primary">Cadastrar</button>
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
<?php include(constant("cRootServer") . "ui/page/locadores/modais/imovel/cadastrar.php"); ?>