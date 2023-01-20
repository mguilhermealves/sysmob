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
                                    <select name="typeofregime" class="form-control" id="typeofregime">
                                        <option value="">Selecione</option>
                                        <option value="clt">CLT</option>
                                        <option value="pj">PJ</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="company">Empresa / Instituição: </label>
                                    <input type="text" class="form-control" id="company" name="company" value="<?php print(isset($data["company"]) ? $data["company"] : "") ?>">
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="wage">Renda mensal - R$: </label>
                                    <input type="text" class="form-control" id="wage" name="wage" value="<?php print(isset($data["wage"]) ? $data["wage"] : $data["phone"]) ?>">
                                </div>
                            </div>

                            <div class="div col-lg-4">
                                <div class="form-group">
                                    <label for="">CEP:</label>
                                    <input type="text" class="form-control" name="" id="">
                                </div>
                            </div>
                            <div class="div col-lg-4">
                                <div class="form-group">
                                    <label for="">Endereço:</label>
                                    <input type="text" class="form-control" name="" id="">
                                </div>
                            </div>
                            <div class="div col-lg-4">
                                <div class="form-group">
                                    <label for="">Número:</label>
                                    <input type="text" class="form-control" name="" id="">
                                </div>
                            </div>

                            <div class="div col-lg-4">
                                <div class="form-group">
                                    <label for="">Complemento</label>
                                    <input type="text" class="form-control" name="" id="">
                                </div>
                            </div>
                            <div class="div col-lg-4">
                                <div class="form-group">
                                    <label for="">Bairro:</label>
                                    <input type="text" class="form-control" name="" id="">
                                </div>
                            </div>
                            <div class="div col-lg-4">
                                <div class="form-group">
                                    <label for="">Cidade:</label>
                                    <input type="text" class="form-control" name="" id="">
                                </div>
                            </div>

                            <div class="div col-lg-4">
                                <div class="form-group">
                                    <label for="">UF:</label>
                                    <input type="text" class="form-control" name="" id="">
                                </div>
                            </div>
                            <div class="div col-lg-4">
                                <div class="form-group">
                                    <label for="">Telefone comercial:</label>
                                    <input type="text" class="form-control" name="" id="">
                                </div>
                            </div>
                            <div class="div col-lg-4">
                                <div class="form-group">
                                    <label for="">E-mail comercial</label>
                                    <input type="text" class="form-control" name="" id="">
                                </div>
                            </div>

                            <div class="div col-lg-4">
                                <div class="form-group">
                                    <label for="">Profissão</label>
                                    <input type="text" class="form-control" name="" id="">
                                </div>
                            </div>
                            <div class="div col-lg-4">
                                <div class="form-group">
                                    <label for="">Cargo / Função:</label>
                                    <input type="text" class="form-control" name="" id="">
                                </div>
                            </div>
                            <div class="div col-lg-4">
                                <div class="form-group">
                                    <label for="">Data de admissão:</label>
                                    <input type="date" class="form-control" name="" id="">
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
                                    <select name="othersrents" class="form-control" id="othersrents">
                                        <option value="yes">Sim</option>
                                        <option value="no">Não</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-8">
                                <div class="form-group">
                                    <label for="origin">Descreva a origem</label>
                                    <input type="text" name="origin" id="origin" class="form-control" value="<?php print(isset($data["origin"]) ? $data["origin"] : "") ?>">
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="totalothersrents">Total (Outras) Rendas(s):</label>
                                    <input type="text" name="totalothersrents" id="totalothersrents" class="form-control" value="<?php print(isset($data["totalothersrents"]) ? $data["totalothersrents"] : "") ?>">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Outras fontes de renda (conjugê)</h3>
                        </div>

                        <div class="box-body">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="othersrents[conjuge]">Possui outras fontes de renda?</label>
                                    <select name="othersrents[conjuge]" class="form-control" id="othersrents[conjuge]">
                                        <option value="yes">Sim</option>
                                        <option value="no">Não</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-8">
                                <div class="form-group">
                                    <label for="origin[conjuge]">Descreva a origem</label>
                                    <input type="text" name="origin[conjuge]" id="origin[conjuge]" class="form-control" value="<?php print(isset($data["origin"]) ? $data["origin"] : "") ?>">
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="totalothersrents[conjuge]">Total (Outras) Rendas(s):</label>
                                    <input type="text" name="totalothersrents[conjuge]" id="totalothersrents[conjuge]" class="form-control" value="<?php print(isset($data["totalothersrents"]) ? $data["totalothersrents"] : "") ?>">
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Informações complementares</h3>
                        </div>

                        <div class="box-body">
                            <textarea class="form-control" name="aditionalinformations" id="aditionalinformations" rows="10"></textarea>
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