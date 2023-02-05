<!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#endereco" aria-controls="endereco" role="tab" data-toggle="tab">Endereço do Imóvel</a></li>
    <li role="presentation"><a href="#imoveis-informacoes" aria-controls="imoveis-informacoes" role="tab" data-toggle="tab">Informações do Imóvel</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="endereco">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Endereço do Imóvel</h3>
            </div>

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

                <div class="col-lg-12">
                    <a class="btn btn-primary btnNext">Next</a>
                </div>
            </div>
        </div>
    </div>

    <div role="tabpanel" class="tab-pane" id="imoveis-informacoes">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Informações do Imóvel</h3>
            </div>

            <div class="box-body">
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="objetivo">Objetivo: </label>
                        <select class="form-control" id="objetivo" name="objetivo">
                            <option value="">Selecione</option>
                            <?php
                            foreach ($GLOBALS["civil_status_list"] as $k => $v) {
                                printf('<option %s value="%s">%s</option>', isset($data["objetivo"]) && $k == $data["objetivo"] ? ' selected' : '', $k, $v);
                            }
                            ?>
                        </select>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="finalidade">Finalidade: </label>
                        <select class="form-control" id="finalidade" name="finalidade">
                            <option value="">Selecione</option>
                            <?php
                            foreach ($GLOBALS["civil_status_list"] as $k => $v) {
                                printf('<option %s value="%s">%s</option>', isset($data["finalidade"]) && $k == $data["finalidade"] ? ' selected' : '', $k, $v);
                            }
                            ?>
                        </select>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="tipo_imovel">Tipo Imóvel: </label>
                        <select class="form-control" id="tipo_imovel" name="tipo_imovel">
                            <option value="">Selecione</option>
                            <?php
                            foreach ($GLOBALS["civil_status_list"] as $k => $v) {
                                printf('<option %s value="%s">%s</option>', isset($data["tipo_imovel"]) && $k == $data["tipo_imovel"] ? ' selected' : '', $k, $v);
                            }
                            ?>
                        </select>
                    </div>
                </div>

                <div class="col-lg-12 horizontal-right">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modelId">Adicionar Imóvel</button>
                </div>

                <div class="col-lg-12">
                    <table class="table table-striped table-inverse table-responsive">
                        <thead class="thead-inverse">
                            <tr>
                                <th>#</th>
                                <th>Tipo Imovel</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td scope="row">1</td>
                                <td>Casa 1</td>
                            </tr>
                            <tr>
                                <td scope="row">2</td>
                                <td>Casa 2</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="col-lg-12">
                    <a class="btn btn-primary btnNext">Next</a>
                    <a class="btn btn-primary btnPrevious">Previous</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Ação</h3>
    </div>

    <div class="tab-content">
        <div class="tab-pane active" id="tab1">
            <a class="btn btn-primary btnNext">Next</a>
        </div>
        <div class="tab-pane" id="tab2">
            <a class="btn btn-primary btnNext">Next</a>
            <a class="btn btn-primary btnPrevious">Previous</a>
        </div>
        <div class="tab-pane" id="tab3">
            <a class="btn btn-primary btnPrevious">Previous</a>
        </div>
    </div>

    <!-- <div class="box-footer text-center">
        <button type="submit" name="btn_save" class="btn btn-primary btn-sm">Salvar e Próxima Etapa</button>
    </div> -->
</div>