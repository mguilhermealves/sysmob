<section class="content-header">
    <h1>
        <?php print(constant("cTitle")) ?>
        <small><?php print($form["title"] . " - Etapa 1") ?></small>
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

                    <input type="hidden" name="pretenants_status_id" value="1">

                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Dados do Locátario</h3>
                        </div>

                        <div class="box-body">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="first_name">Nome: </label>
                                    <input type="text" class="form-control" id="first_name" name="first_name" value="<?php print(isset($data["first_name"]) ? $data["first_name"] : "") ?>">
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="last_name">Sobrenome: </label>
                                    <input type="text" class="form-control" id="last_name" name="last_name" value="<?php print(isset($data["last_name"]) ? $data["last_name"] : "") ?>">
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="type">Tipo: </label>
                                    <select class="form-control" id="type" name="type">
                                        <option value="">Selecione</option>
                                        <?php
                                        foreach ($GLOBALS["type_tenants_lists"] as $k => $v) {
                                            printf('<option %s value="%s">%s</option>', isset($data["type"]) && $k == $data["type"] ? ' selected' : '', $k, $v);
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-4" id="cpf" style="display: none;">
                                <div class="form-group">
                                    <label for="cpf">CPF: </label>
                                    <input type="text" class="form-control" name="cpf" value="<?php print(isset($data["cpf"]) ? $data["cpf"] : "") ?>">
                                </div>
                            </div>

                            <div class="col-lg-4" id="cnpj" style="display: none;">
                                <div class="form-group">
                                    <label for="cnpj">CNPJ: </label>
                                    <input type="text" class="form-control" name="cnpj" value="<?php print(isset($data["cnpj"]) ? $data["cnpj"] : "") ?>">
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
                                    <label for="genre">Genero: </label>
                                    <select class="form-control" id="genre" name="genre">
                                        <option value="">Selecione</option>
                                        <?php
                                        foreach ($GLOBALS["genre_lists"] as $k => $v) {
                                            printf('<option %s value="%s">%s</option>', isset($data["genre"]) && $k == $data["genre"] ? ' selected' : '', $k, $v);
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="nacionality">Nacionalidade: </label>
                                    <input type="text" class="form-control" id="nacionality" name="nacionality" value="<?php print(isset($data["nacionality"]) ? $data["nacionality"] : "") ?>">
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="phone">Telefone: </label>
                                    <input type="text" class="form-control" id="phone" name="phone" value="<?php print(isset($data["phone"]) ? $data["phone"] : "") ?>">
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="cellphone">Celular: </label>
                                    <input type="text" class="form-control" id="cellphone" name="cellphone" value="<?php print(isset($data["cellphone"]) ? $data["cellphone"] : "") ?>">
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
                                    <label for="civil_status">Estado Civil: </label>
                                    <select class="form-control" id="civil_status" name="civil_status">
                                        <option value="">Selecione</option>
                                        <?php
                                        foreach ($GLOBALS["civil_status_list"] as $k => $v) {
                                            printf('<option %s value="%s">%s</option>', isset($data["civil_status"]) && $k == $data["civil_status"] ? ' selected' : '', $k, $v);
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Dados do Conjuge</h3>
                        </div>

                        <div class="box-body">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="first_name">Nome: </label>
                                    <input type="text" class="form-control" id="first_name" name="spouse[first_name]" value="<?php print(isset($data["prespouses_attach"]) ? $data["prespouses_attach"][0]["first_name"] : "") ?>">
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="last_name">Sobrenome: </label>
                                    <input type="text" class="form-control" id="last_name" name="spouse[last_name]" value="<?php print(isset($data["prespouses_attach"]) ? $data["prespouses_attach"][0]["last_name"] : "") ?>">
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="cpf">CPF: </label>
                                    <input type="text" class="form-control" name="spouse[cpf]" value="<?php print(isset($data["prespouses_attach"]) ? $data["prespouses_attach"][0]["cpf"] : "") ?>">
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="nacionality">Nacionalidade: </label>
                                    <input type="text" class="form-control" id="nacionality" name="spouse[nacionality]" value="<?php print(isset($data["prespouses_attach"]) ? $data["prespouses_attach"][0]["nacionality"] : "") ?>">
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="celphone">Celular: </label>
                                    <input type="text" class="form-control" id="celphone" name="spouse[celphone]" value="<?php print(isset($data["prespouses_attach"]) ? $data["prespouses_attach"][0]["celphone"] : "") ?>">
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="is_show_financer">Incluir Informações Financeiras do Conjugê? </label>
                                    <select class="form-control" id="is_show_financer" name="spouse[is_show_financer]">
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