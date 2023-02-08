<div class="modal fade reveal-modal" id="cadastrar_imovel" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true" data-action="/cadastrar_imovel_adicional" data-table="#table-additionalproperties">

    <input type="hidden" name="idx" value="0" />

    <input type="hidden" name="locators_id" value="<?php print($data["idx"]) ?>" />

    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Adicionar Informações Adicionais</h5>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title">Endereço</h3>
                            </div>

                            <div class="box-body">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="cep">Cep: </label>
                                        <input type="text" class="form-control cep" id="cep" name="cep" value="<?php print(isset($data["cep"]) ? $data["cep"] : "") ?>">
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="endereco">Endereço: </label>
                                        <input type="text" class="form-control endereco" id="endereco" name="endereco" value="<?php print(isset($data["endereco"]) ? $data["endereco"] : "") ?>" readonly>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="numero">Número: </label>
                                        <input type="text" class="form-control numero" id="numero" name="numero" value="<?php print(isset($data["numero"]) ? $data["numero"] : "") ?>">
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="complemento">Complemento: </label>
                                        <input type="text" class="form-control complemento" id="complemento" name="complemento" value="<?php print(isset($data["complemento"]) ? $data["complemento"] : "") ?>">
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="bairro">Bairro: </label>
                                        <input type="text" class="form-control bairro" id="bairro" name="bairro" value="<?php print(isset($data["bairro"]) ? $data["bairro"] : "") ?>" readonly>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="cidade">Cidade: </label>
                                        <input type="text" class="form-control cidade" id="cidade" name="cidade" value="<?php print(isset($data["cidade"]) ? $data["cidade"] : "") ?>" readonly>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="uf">Estado: </label>
                                        <select class="form-control uf" id="uf" name="uf" readonly>
                                            <option value="" <?php print(!isset($data["uf"]) || $data["uf"] == "" ? ' selected="selected"' : '') ?>>Selecione</option>
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
                            <div class="box-body">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="objetivo">Objetivo: </label>
                                        <select class="form-control" id="objetivo" name="objetivo">
                                            <option value="">Selecione</option>
                                            <?php
                                            foreach (commonobjectives_controller::data4select("slug", array("active = 'yes'"), "name") as $k => $v) {
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
                                            foreach (commonfinalities_controller::data4select("slug", array("active = 'yes'"), "name") as $k => $v) {
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
                                            foreach (commontypeproperties_controller::data4select("slug", array("active = 'yes'"), "name") as $k => $v) {
                                                printf('<option %s value="%s">%s</option>', isset($data["tipo_imovel"]) && $k == $data["tipo_imovel"] ? ' selected' : '', $k, $v);
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="area_util">Área Util / Construida: </label>
                                        <div class="input-group">
                                            <span class="input-group-addon" id="basic-addon1">m2</span>
                                            <input type="text" class="form-control" aria-describedby="basic-addon1" id="area_util" name="area_util" value="<?php print(isset($data["area_util"]) ? $data["area_util"] : "0") ?>">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="area_total">Área Total:</label>
                                        <div class="input-group">
                                            <span class="input-group-addon" id="basic-addon1">m2</span>
                                            <input type="text" class="form-control" aria-describedby="basic-addon1" id="area_total" name="area_total" value="<?php print(isset($data["area_total"]) ? $data["area_total"] : "0") ?>">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="qtd_dormitorios">Quantidade de Dormitórios: </label>
                                        <input type="number" min="0" max="10" class="form-control" id="qtd_dormitorios" name="qtd_dormitorios" value="<?php print(isset($data["qtd_dormitorios"]) ? $data["qtd_dormitorios"] : "0") ?>">
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="qtd_suites">Quantidade de Suites:</label>
                                        <input type="number" min="0" max="10" class="form-control" id="qtd_suites" name="qtd_suites" value="<?php print(isset($data["qtd_suites"]) ? $data["qtd_suites"] : "0") ?>">

                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="qtd_sala_estar">Quantidade de Sala de Estar: </label>
                                        <input type="number" min="0" max="10" class="form-control" id="qtd_sala_estar" name="qtd_sala_estar" value="<?php print(isset($data["qtd_sala_estar"]) ? $data["qtd_sala_estar"] : "0") ?>">

                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="qtd_sala_jantar">Quantidade de Sala de Jantar: </label>
                                        <input type="number" min="0" max="10" class="form-control" id="qtd_sala_jantar" name="qtd_sala_jantar" value="<?php print(isset($data["qtd_sala_jantar"]) ? $data["qtd_sala_jantar"] : "0") ?>">

                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="qtd_copa">Quantidade de Copa:</label>
                                        <input type="number" min="0" max="10" class="form-control" id="qtd_copa" name="qtd_copa" value="<?php print(isset($data["qtd_copa"]) ? $data["qtd_copa"] : "0") ?>">

                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="qtd_cozinha">Quantidade de Cozinha: </label>
                                        <input type="number" min="0" max="10" class="form-control" id="qtd_cozinha" name="qtd_cozinha" value="<?php print(isset($data["qtd_cozinha"]) ? $data["qtd_cozinha"] : "0") ?>">

                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="qtd_banheiro">Quantidade de Banheiro: </label>
                                        <input type="number" min="0" max="10" class="form-control" id="qtd_banheiro" name="qtd_banheiro" value="<?php print(isset($data["qtd_banheiro"]) ? $data["qtd_banheiro"] : "0") ?>">

                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="qtd_vaga">Quantidade de Vagas:</label>
                                        <input type="number" min="0" max="10" class="form-control" id="qtd_vaga" name="qtd_vaga" value="<?php print(isset($data["qtd_vaga"]) ? $data["qtd_vaga"] : "0") ?>">
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="estado_imovel">Estado do Imóvel: </label>
                                        <select class="form-control" id="estado_imovel" name="estado_imovel">
                                            <option value="" <?php print(!isset($data["estado_imovel"]) || $data["estado_imovel"] == "" ? ' selected="selected"' : '') ?>>Selecione</option>
                                            <?php
                                            foreach ($GLOBALS["estado_imovel_lists"] as $k => $v) {
                                                printf('<option %s value="%s">%s</option>', isset($data["estado_imovel"]) && $k == $data["estado_imovel"] ? ' selected' : '', $k, $v);
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="vlr_aluguel">Valor do Aluguel:</label>
                                        <input type="text" class="form-control" id="vlr_aluguel" name="vlr_aluguel" value="<?php print(isset($data["vlr_aluguel"]) ? $data["vlr_aluguel"] : "") ?>" required>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="vlr_iptu">Valor do IPTU:</label>
                                        <input type="text" class="form-control" id="vlr_iptu" name="vlr_iptu" value="<?php print(isset($data["vlr_iptu"]) ? $data["vlr_iptu"] : "") ?>">

                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="vlr_condominio">Valor do Condominio:</label>
                                        <input type="text" class="form-control" id="vlr_condominio" name="vlr_condominio" value="<?php print(isset($data["vlr_condominio"]) ? $data["vlr_condominio"] : "") ?>">

                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="descritivo_imovel">Descritivo: </label>
                                        <textarea type="text" class="form-control" id="descritivo_imovel" name="descritivo_imovel" rows="5"><?php print(isset($data["descritivo_imovel"]) ? $data["descritivo_imovel"] : "") ?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer horizontal-center">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="bi bi-x-lg"></i> Fechar</button>
                <button type="button" class="btn btn-primary save-form-modal"><i class="bi bi-save"></i> Salvar</button>
            </div>
        </div>
    </div>
</div>