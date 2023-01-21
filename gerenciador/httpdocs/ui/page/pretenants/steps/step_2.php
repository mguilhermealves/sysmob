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

                    <input type="hidden" name="pretenants_status_id" value="2">

                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Dados do Locatário</h3>
                        </div>

                        <div class="box-body">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="postalcode">Nome: </label>
                                    <input type="text" disabled class="form-control" id="name" name="name" value="<?php print ($data["first_name"]) . " de " . $data["last_name"] ?>">
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="cpf">CPF: </label>
                                    <input type="text" disabled class="form-control" id="cpf" name="cpf" value="<?php print($data["cpf"]) ?>">
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="celphone">Celular: </label>
                                    <input type="text" disabled class="form-control" id="celphone" name="celphone" value="<?php print(isset($data["celphone"]) ? $data["celphone"] : $data["phone"]) ?>">
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
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="patrimonio">Tipo do patrimonio</label>
                                    <select name="patrimonio" class="form-control" id="patrimonio">
                                        <option value="selecionar">Selecionar</option>
                                        <option value="imovel">Imóvel</option>
                                        <option value="auto">Veículo</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="box-body" id="selectYes" style="display: none;">
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="tipoimovel">Tipo do Imovel</label>
                                    <select name="tipoimovel" class="form-control" id="tipoimovel">
                                        <option value="selecione">Selecione</option>
                                        <option value="casa">Casa</option>
                                        <option value="apartamento">Apartamento</option>
                                        <option value="terreno">Terreno</option>
                                        <option value="galpao">Galpão</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="city">Cidade</label>
                                    <input type="text" name="cityimovel" id="cityimovel" class="form-control" value="">
                                </div>
                            </div>

                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="ufimovel">Estado</label>
                                    <input type="text" name="ufimovel" id="ufimovel" class="form-control" value="">
                                </div>
                            </div>

                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="onus">Possui onus?</label>
                                    <select name="onus" class="form-control" id="onus">
                                        <option value="selecione">Selecione</option>
                                        <option value="yes">Sim</option>
                                        <option value="no">Não</option>
                                    </select>
                                </div>
                            </div>

                        </div>

                        <div class="box-body" id="selectYes" style="display: none;">
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="tipoimovel">Marca</label>
                                    <input type="text" name="marca" id="marca" class="form-control" value="">
                                </div>
                            </div>

                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="modelauto">Modelo</label>
                                    <input type="text" name="modelauto" id="modelauto" class="form-control" value="">
                                </div>
                            </div>

                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="yearauto">Ano</label>
                                    <input type="text" name="yearauto" id="yearauto" class="form-control" value="">
                                </div>
                            </div>

                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="onus">Possui onus?</label>
                                    <select name="onus" class="form-control" id="onus">
                                        <option value="selecione">Selecione</option>
                                        <option value="yes">Sim</option>
                                        <option value="no">Não</option>
                                    </select>
                                </div>
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
                                    <label for="">Login Cadastro:</label>
                                    <input type="text" disabled class="form-control" name="" id="" value="<?php print($_SESSION[constant("cAppKey")]["credential"]["first_name"]) ?>">

                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="">Data Cadastro</label>
                                    <input type="text" disabled class="form-control" name="" id="" value="<?php ?>">

                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="">Data Ultima ALteração</label>
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

<script>
        window.onload = function() {
        document.getElementById('patrimonio').addEventListener('change', function() {
            var style = this.value == 'imovel' ? 'block' : 'none';
            document.getElementById('selectYes').style.display = style;
        });
    }
</script>