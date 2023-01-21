<section class="content-header">
    <h1>
        <?php print(constant("cTitle")) ?>
        <small><?php print($form["title"] . " - Etapa 3") ?></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li><a href="<?php print($GLOBALS["orders_url"]) ?>"><?php print($pages); ?> </a></li>
        <li class="active"><?php print($page) ?></li>
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

                    <input type="hidden" name="pretenants_status_id" value="3">

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
                            <h3 class="box-title">Informações financeiras do locatário</h3>
                        </div>

                        <div class="box-body">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="typeofregime">Tipo de regime: </label>
                                    <select name="typeofregime" select="selected" class="form-control" id="typeofregime">
                                        <option value="">Selecione</option>
                                        <option value="clt">CLT</option>
                                        <option value="pj">PJ</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="company">Empresa / Instituição: </label>
                                    <input type="text" class="form-control" id="company" name="company" value="<?php print(isset($data["pretenants_attach"][0]) ? $data["pretenants_attach"][0]["company"] : "") ?>">
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="wage">Renda mensal - R$: </label>
                                    <input type="text" class="form-control" id="wage" name="wage" value="<?php print(isset($data["pretenants_attach"][0]) ? $data["pretenants_attach"][0]["wage"] : "" ) ?>">
                                </div>
                            </div>

                            <div class="div col-lg-4">
                                <div class="form-group">
                                    <label for="postalcode">CEP:</label>
                                    <input type="text" class="form-control" name="cepcompany" id="postalcode" value="<?php print(isset($data["pretenants_attach"][0]) ? $data["pretenants_attach"][0]["cepcompay"] :"") ?>">
                                </div>
                            </div>
                            <div class="div col-lg-4">
                                <div class="form-group">
                                    <label for="">Endereço:</label>
                                    <input type="text" class="form-control" name="addresscompany" id="address" Value="<?php print(isset($data["pretenants_attach"][0]) ? $data["pretenants_attach"][0]["addresscompany"] : "") ?>">
                                </div>
                            </div>
                            <div class="div col-lg-4">
                                <div class="form-group">
                                    <label for="">Número:</label>
                                    <input type="text" class="form-control" name="numbercompany" id="number" value="<?php print(isset($data["pretenants_attach"][0]) ? $data["pretenants_attach"][0]["numercompany"] : "") ?>">
                                </div>
                            </div>

                            <div class="div col-lg-4">
                                <div class="form-group">
                                    <label for="">Complemento</label>
                                    <input type="text" class="form-control" name="complementcompany" id="complement" Value="<?php print(isset($data["pretenants_attach"][0]) ? $data["pretenants_attach"][0]["complementcompany"] : "") ?>">
                                </div>
                            </div>
                            <div class="div col-lg-4">
                                <div class="form-group">
                                    <label for="">Bairro:</label>
                                    <input type="text" class="form-control" name="neighborhoodcompany" id="district" Value="<?php print(isset($data["pretenants_attach"][0]) ? $data["pretenants_attach"][0]["neighborhoodcompany"] : "") ?>">
                                </div>
                            </div>
                            <div class="div col-lg-4">
                                <div class="form-group">
                                    <label for="">Cidade:</label>
                                    <input type="text" class="form-control" name="citycompany" id="city" Value="<?php print(isset($data["pretenants_attach"][0]) ? $data["pretenants_attach"][0]["citycompany"] : "") ?>">
                                </div>
                            </div>

                            <div class="div col-lg-4">
                                <div class="form-group">
                                    <label for="uf">UF:</label>
                                    <input type="text" class="form-control" name="ufcompany" id="uf" value="<?php print(isset($data["pretenants_attach"][0]) ? $data["pretenants_attach"][0]["ufcompany"] : "") ?>">
                                </div>
                            </div>
                            <div class="div col-lg-4">
                                <div class="form-group">
                                    <label for="phonecompany">Telefone comercial:</label>
                                    <input type="text" class="form-control" name="phonecompany" id="phonecompany" value="<?php print(isset($data["pretenants_attach"][0]) ? $data["pretenants_attach"][0]["phonecompany"] : "") ?>">
                                </div>
                            </div>
                            <div class="div col-lg-4">
                                <div class="form-group">
                                    <label for="emailcompany">E-mail comercial</label>
                                    <input type="text" class="form-control" name="emailcompany" id="emailcompany" value="<?php print(isset($data["pretenants_attach"][0]) ? $data["pretenants_attach"][0]["emailcompany"] : "") ?>">
                                </div>
                            </div>

                            <div class="div col-lg-4">
                                <div class="form-group">
                                    <label for="profession">Profissão</label>
                                    <input type="text" class="form-control" name="profession" id="profession" value="<?php print(isset($data["pretenants_attach"][0]) ? $data["pretenants_attach"][0]["profission"] : "") ?>">
                                </div>
                            </div>
                            <div class="div col-lg-4">
                                <div class="form-group">
                                    <label for="office">Cargo / Função:</label>
                                    <input type="text" class="form-control" name="office" id="office" value="<?php print(isset($data["pretenants_attach"][0]) ? $data["pretenants_attach"][0]["office"] : "") ?>">
                                </div>
                            </div>
                            <div class="div col-lg-4">
                                <div class="form-group">
                                    <label for="admissioncompany">Data de admissão:</label>
                                    <input type="date" class="form-control" name="admissioncompany" id="admissioncompany" value="<?php print(isset($data["pretenants_attach"][0]) ? $data["pretenants_attach"][0]["admissioncompany"] :"") ?>">
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Informações financeiras do locatário</h3>
                        </div>

                        <div class="box-body">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="othersrents">Possui outras fontes de renda?</label>
                                    <select name="othersrents" select="seleceted" class="form-control" id="othersrents">
                                        <option id="select" selected value="select">Selecione</option>
                                        <option value="yes">Sim</option>
                                        <option value="no">Não</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row box-body" id="selectYes" style="display: none;">

                                <div class="col-lg-8">
                                    <div class="form-group">
                                        <label for="origin">Descreva a origem</label>
                                        <input type="text" name="origin" id="origin" class="form-control" value="<?php print(isset($data["pretenants_attach"][0]) ? $data["pretenants_attach"][0]["origin"] : "") ?>">
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="totalothersrents">Total (Outras) Rendas(s):</label>
                                        <input type="text" name="totalothersrents" id="totalothersrents" class="form-control" value="<?php print(isset($data["pretenants_attach"][0]) ? $data["pretenants_attach"][0]["totalothersrents"] : "") ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php if($data["prespouses_attach"][0]["is_show_financer"] == 'yes') { ?>

                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Outras fontes de renda (conjugê)</h3>
                        </div>

                        <div class="box-body">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="othersrents_conjuge">Possui outras fontes de renda?</label>
                                    <select name="othersrents_conjuge" select="seleceted" class="form-control" id="othersrents_conjuge">
                                        <option id="select" selected value="select">Selecione</option>
                                        <option id="yes_conjuge" value="yes_conjuge">Sim</option>
                                        <option id="no_conjuge" value="no_conjuge">Não</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row box-body" id="selectYes_conjuge" style="display: none;">

                                <div class="col-lg-8">
                                    <div class="form-group">
                                        <label for="origin_conjuge">Descreva a origem</label>
                                        <input type="text" name="origin_conjuge" id="origin_conjuge" class="form-control" value="<?php print(isset($data["pretenants_attach"][0]) ? $data["origin_conjuge"] : "") ?>">
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="totalothersrents_conjuge">Total (Outras) Rendas(s):</label>
                                        <input type="text" name="totalothersrents_conjuge" id="totalothersrents_conjuge" class="form-control" value="<?php print(isset($data["pretenants_attach"][0]) ? $data["pretenants_attach"][0]["totalothersrents_conjuge"] : "") ?>">
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <?php } ?>

                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Informações complementares</h3>
                        </div>

                        <div class="box-body">
                            <textarea class="form-control" name="aditionalinformations" id="aditionalinformations" rows="10"><?php print(isset($data["pretenants_attach"][0]) ? $data["pretenants_attach"][0]["aditionalinformation"] : "") ?></textarea>
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
        document.getElementById('othersrents').addEventListener('change', function() {
            var style = this.value == 'yes' ? 'block' : 'none';
            document.getElementById('selectYes').style.display = style;
        });
        document.getElementById('othersrents_conjuge').addEventListener('change', function() {
            var style = this.value == 'yes_conjuge' ? 'block' : 'none';
            document.getElementById('selectYes_conjuge').style.display = style;
        });
    }

   

</script>