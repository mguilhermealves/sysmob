<section class="content-header">
    <h1>
        <?php print(constant("cTitle")) ?>
        <small><?php print($form["title"] . " - Etapa 2") ?></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li><a href="<?php print($GLOBALS["orders_url"]) ?>"><?php print($pages); ?> </a></li>
        <li class="active"><?php print($page); ?></li>
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

                    <input type="hidden" name="pretenantsstatus_id" value="2">

                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Dados do Locatário</h3>
                        </div>

                        <div class="box-body">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="postalcode">Nome: </label>
                                    <input type="text" class="form-control" value="<?php print ($data["first_name"]) . " " . $data["last_name"] ?>" disabled>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="cpf">CPF: </label>
                                    <input type="text" class="form-control" value="<?php print($data["cpf_cnpj"]) ?>" disabled>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="celphone">Celular: </label>
                                    <input type="text" class="form-control" id="celphone" name="celphone" value="<?php print(isset($data["celphone"]) ? $data["celphone"] : $data["phone"]) ?>" disabled>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Endereço Residencial</h3>
                        </div>

                        <div class="box-body">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="postalcode">Cep: </label>
                                    <input type="text" class="form-control" id="postalcode" name="postalcode" value="<?php print(isset($data["postalcode"]) ? $data["postalcode"] : "") ?>">
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="address">Endereço: </label>
                                    <input type="text" class="form-control" id="address" name="address" value="<?php print(isset($data["address"]) ? $data["address"] : "") ?>">
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="number">Número: </label>
                                    <input type="text" class="form-control" id="number" name="number" value="<?php print(isset($data["number"]) ? $data["number"] : "") ?>">
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="complement">Complemento: </label>
                                    <input type="text" class="form-control" id="complement" name="complement" value="<?php print(isset($data["complement"]) ? $data["complement"] : "") ?>">
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="district">Bairro: </label>
                                    <input type="text" class="form-control" id="district" name="district" value="<?php print(isset($data["district"]) ? $data["district"] : "") ?>">
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="city">Cidade: </label>
                                    <input type="text" class="form-control" id="city" name="city" value="<?php print(isset($data["city"]) ? $data["city"] : "") ?>">
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="uf">Estado: </label>
                                    <select class="form-control" id="uf" name="uf">
                                        <option value="">Selecione</option>
                                        <?php
                                        foreach ($GLOBALS["ufbr_lists"] as $k => $v) {
                                            printf('<option %s value="%s">%s</option>', isset($data["uf"]) && $k == $data["uf"] ? ' selected' : '', $k, $v);
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Referencia Pessoal</h3>
                        </div>

                        <div class="box-body">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="full_name">Nome: </label>
                                    <input type="text" class="form-control" id="full_name" name="personalreference[full_name]" value="<?php print(isset($data["personalreference_attach"][0]) ? $data["personalreference_attach"][0]["full_name"] : "") ?>">
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="celphone">Celular: </label>
                                    <input type="text" class="form-control" id="celphone" name="personalreference[celphone]" value="<?php print(isset($data["personalreference_attach"][0]) ? $data["personalreference_attach"][0]["celphone"] : "") ?>">
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="type_relation">Grau de Relacionamento: </label>
                                    <select class="form-control" id="type_relation" name="personalreference[type_relation]">
                                        <option value="">Selecione</option>
                                        <?php
                                        foreach ($GLOBALS["type_relation_lists"] as $k => $v) {
                                            printf('<option %s value="%s">%s</option>', isset($data["personalreference_attach"]) && $k == $data["personalreference_attach"][0]["idx"] ? ' selected' : '', $k, $v);
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Patrimonio</h3>
                        </div>

                        <div class="box-body">
                            <div class="col-lg-12 text-right">
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#patrimony_modal">Adicionar Patrimonio</button>
                            </div>
                        </div>

                        <div class="box-body">
                            <div class="col-lg-12">
                                <table class="table table-striped table-inverse table-responsive" id="table-patrimonies">
                                    <thead class="thead-inverse">
                                        <tr>
                                            <th>Id</th>
                                            <th>Tipo</th>
                                            <th>Ação</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (isset($data["pretenantspatrimonies_attach"][0])) {
                                            foreach ($data["pretenantspatrimonies_attach"] as $k => $pretenantspatrimonies) {
                                        ?>
                                                <tr id="row_<?php print($pretenantspatrimonies["idx"]) ?>">
                                                    <td scope="row"><?php print($pretenantspatrimonies["idx"]) ?></td>
                                                    <td><?php print($pretenantspatrimonies["type_patrimony"]) ?></td>
                                                    <td>
                                                        <button type="button" class="btn btn-info edit_modal" title="Editar Patrimonio" data-toggle="modal" data-target="#editpatrimony_modal_<?php print($pretenantspatrimonies["idx"]) ?>">
                                                            <i class="bi bi-pencil-square"></i> Visualizar
                                                        </button>
                                                        <button type="button" class="btn btn-danger btn-remover-list" data-id="<?php print($pretenantspatrimonies["idx"]) ?>" data-model="pretenantspatrimonies">
                                                            <i class="bi bi-trash"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                                <?php include(constant("cRootServer") . "ui/page/pretenants/modals/edit_patrimony.php"); ?>
                                        <?php }
                                        } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Informações de registro do cadastro</h3>
                        </div>

                        <div class="box-body">
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="">Cadastrado por:</label>
                                    <input type="text" disabled class="form-control" name="" id="" value="<?php print($data["usersCreated_attach"][0]["first_name"] . " " . $data["usersCreated_attach"][0]["last_name"]) ?>">

                                </div>
                            </div>

                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="">Data do Cadastro</label>
                                    <input type="text" disabled class="form-control" name="" id="" value="<?php print($data["created_at"]) ?>">
                                </div>
                            </div>

                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="">Data Ultima Alteração</label>
                                    <input type="text" disabled class="form-control" name="" id="" value="<?php ?>">
                                </div>
                            </div>

                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="">Status Cadastro</label>
                                    <input type="text" disabled class="form-control" name="" id="" value="<?php ?>">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Ação</h3>
                        </div>

                        <div class="box-footer text-center">
                            <button type="submit" name="btn_save" class="btn btn-primary btn-sm"><?php print(isset($data["idx"]) ? "Salvar" : "Cadastrar") ?></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>


<!-- Modals -->
<?php include(constant("cRootServer") . "ui/page/pretenants/modals/add_patrimony.php"); ?>