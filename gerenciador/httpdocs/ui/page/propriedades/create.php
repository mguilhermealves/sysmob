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
                        <li class="active"><a href="#dados-locador">Dados do Locador</a></li>
                        <li><a href="#endereco-locador">Endereço do Imóvel</a></li>
                        <li class="disabled"><a href="#imoveis-informacoes">Informações do Imóvel</a></li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="dados-locador">
                            <div class="box box-primary">
                                <div class="box-body">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="clients_id">Codigo do Cliente: </label>
                                            <input type="text" class="form-control" id="clients_id" name="clients_id">
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="clients_name">Razão Social: </label>
                                            <input type="text" class="form-control" id="clients_name" name="clients_name">
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="clients_cnpj">CNPJ: </label>
                                            <input type="text" class="form-control" id="clients_cnpj" name="clients_cnpj">
                                        </div>
                                    </div>
                                </div>
                            </div>

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
                            </div>

                            <div class="box box-primary">
                                <div class="box-footer">
                                    <div class="col-lg-12 horizontal-center">
                                        <a class="btn btn-primary" onclick="nextTab('endereco-locador')"><i class="bi bi-arrow-right-circle"></i> Próximo</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="endereco-locador">
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
                            </div>

                            <div class="box box-primary">
                                <div class="box-footer">
                                    <div class="col-lg-12 horizontal-center">
                                        <a class="btn btn-secondary" onclick="nextTab('dados-locador')"><i class="bi bi-arrow-left-circle"></i> Anterior</a>
                                        <button type="submit" name="btn_save" class="btn btn-primary">Cadastrar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- Modais -->
<?php include(constant("cRootServer") . "ui/page/propriedades/modais/imovel/cadastrar.php"); ?>