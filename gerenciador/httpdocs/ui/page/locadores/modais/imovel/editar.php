<div class="modal fade in reveal-modal" id="editar_<?php print($additionalproperty["idx"]) ?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <input type="hidden" name="idx" value="<?php print($additionalproperty["idx"]) ?>" />
    <input type="hidden" name="locators_id" value="<?php print($data["idx"]) ?>" />

    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Editar Informações Adicionais</h5>
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
                                        <input type="text" class="form-control cep" id="cep" name="cep" value="<?php print(isset($additionalproperty["cep"]) ? $additionalproperty["cep"] : "") ?>">
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="endereco">Endereço: </label>
                                        <input type="text" class="form-control endereco" id="endereco" name="endereco" value="<?php print(isset($additionalproperty["endereco"]) ? $additionalproperty["endereco"] : "") ?>" readonly>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="numero">Número: </label>
                                        <input type="text" class="form-control numero" id="numero" name="numero" value="<?php print(isset($additionalproperty["numero"]) ? $additionalproperty["numero"] : "") ?>">
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="complemento">Complemento: </label>
                                        <input type="text" class="form-control complemento" id="complemento" name="complemento" value="<?php print(isset($additionalproperty["complemento"]) ? $additionalproperty["complemento"] : "") ?>">
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="bairro">Bairro: </label>
                                        <input type="text" class="form-control bairro" id="bairro" name="bairro" value="<?php print(isset($additionalproperty["bairro"]) ? $additionalproperty["bairro"] : "") ?>" readonly>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="cidade">Cidade: </label>
                                        <input type="text" class="form-control cidade" id="cidade" name="cidade" value="<?php print(isset($additionalproperty["cidade"]) ? $additionalproperty["cidade"] : "") ?>" readonly>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="uf">Estado: </label>
                                        <select class="form-control uf" id="uf" name="uf" readonly>
                                            <option value="" <?php print(!isset($additionalproperty["uf"]) || $additionalproperty["uf"] == "" ? ' selected="selected"' : '') ?>>Selecione</option>
                                            <?php
                                            foreach ($GLOBALS["ufbr_lists"] as $k => $v) {
                                                printf('<option %s value="%s">%s</option>', isset($additionalproperty["uf"]) && $k == $additionalproperty["uf"] ? ' selected' : '', $k, $v);
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
                                                printf('<option %s value="%s">%s</option>', isset($additionalproperty["objetivo"]) && $k == $additionalproperty["objetivo"] ? ' selected' : '', $k, $v);
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
                                                printf('<option %s value="%s">%s</option>', isset($additionalproperty["finalidade"]) && $k == $additionalproperty["finalidade"] ? ' selected' : '', $k, $v);
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
                                                printf('<option %s value="%s">%s</option>', isset($additionalproperty["tipo_imovel"]) && $k == $additionalproperty["tipo_imovel"] ? ' selected' : '', $k, $v);
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
                                            <input type="text" class="form-control" aria-describedby="basic-addon1" id="area_util" name="area_util" value="<?php print(isset($additionalproperty["area_util"]) ? $additionalproperty["area_util"] : "0") ?>">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="area_total">Área Total:</label>
                                        <div class="input-group">
                                            <span class="input-group-addon" id="basic-addon1">m2</span>
                                            <input type="text" class="form-control" aria-describedby="basic-addon1" id="area_total" name="area_total" value="<?php print(isset($additionalproperty["area_total"]) ? $additionalproperty["area_total"] : "0") ?>">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="qtd_dormitorios">Quantidade de Dormitórios: </label>
                                        <input type="number" min="0" max="10" class="form-control" id="qtd_dormitorios" name="qtd_dormitorios" value="<?php print(isset($additionalproperty["qtd_dormitorios"]) ? $additionalproperty["qtd_dormitorios"] : "0") ?>">
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="qtd_suites">Quantidade de Suites:</label>
                                        <input type="number" min="0" max="10" class="form-control" id="qtd_suites" name="qtd_suites" value="<?php print(isset($additionalproperty["qtd_suites"]) ? $additionalproperty["qtd_suites"] : "0") ?>">

                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="qtd_sala_estar">Quantidade de Sala de Estar: </label>
                                        <input type="number" min="0" max="10" class="form-control" id="qtd_sala_estar" name="qtd_sala_estar" value="<?php print(isset($additionalproperty["qtd_sala_estar"]) ? $additionalproperty["qtd_sala_estar"] : "0") ?>">

                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="qtd_sala_jantar">Quantidade de Sala de Jantar: </label>
                                        <input type="number" min="0" max="10" class="form-control" id="qtd_sala_jantar" name="qtd_sala_jantar" value="<?php print(isset($additionalproperty["qtd_sala_jantar"]) ? $additionalproperty["qtd_sala_jantar"] : "0") ?>">

                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="qtd_copa">Quantidade de Copa:</label>
                                        <input type="number" min="0" max="10" class="form-control" id="qtd_copa" name="qtd_copa" value="<?php print(isset($additionalproperty["qtd_copa"]) ? $additionalproperty["qtd_copa"] : "0") ?>">

                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="qtd_cozinha">Quantidade de Cozinha: </label>
                                        <input type="number" min="0" max="10" class="form-control" id="qtd_cozinha" name="qtd_cozinha" value="<?php print(isset($additionalproperty["qtd_cozinha"]) ? $additionalproperty["qtd_cozinha"] : "0") ?>">

                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="qtd_banheiro">Quantidade de Banheiro: </label>
                                        <input type="number" min="0" max="10" class="form-control" id="qtd_banheiro" name="qtd_banheiro" value="<?php print(isset($additionalproperty["qtd_banheiro"]) ? $additionalproperty["qtd_banheiro"] : "0") ?>">

                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="qtd_vaga">Quantidade de Vagas:</label>
                                        <input type="number" min="0" max="10" class="form-control" id="qtd_vaga" name="qtd_vaga" value="<?php print(isset($additionalproperty["qtd_vaga"]) ? $additionalproperty["qtd_vaga"] : "0") ?>">

                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="estado_imovel">Estado do Imóvel:</label>
                                        <input type="text" class="form-control" id="estado_imovel" name="estado_imovel" value="<?php print(isset($additionalproperty["estado_imovel"]) ? $additionalproperty["estado_imovel"] : "0") ?>">

                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="vlr_aluguel">Valor do Aluguel:</label>
                                        <input type="text" class="form-control" id="vlr_aluguel" name="vlr_aluguel" value="<?php print(isset($additionalproperty["vlr_aluguel"]) ? $additionalproperty["vlr_aluguel"] : "") ?>">
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="vlr_iptu">Valor do IPTU:</label>
                                        <input type="text" class="form-control" id="vlr_iptu" name="vlr_iptu" value="<?php print(isset($additionalproperty["vlr_iptu"]) ? $additionalproperty["vlr_iptu"] : "") ?>">

                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="vlr_condominio">Valor do Condominio:</label>
                                        <input type="text" class="form-control" id="vlr_condominio" name="vlr_condominio" value="<?php print(isset($additionalproperty["vlr_condominio"]) ? $additionalproperty["vlr_condominio"] : "") ?>">

                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="descritivo_imovel">Descritivo: </label>
                                        <textarea type="text" class="form-control" id="descritivo_imovel" name="descritivo_imovel" rows="5"><?php print(isset($additionalproperty["descritivo_imovel"]) ? $additionalproperty["descritivo_imovel"] : "") ?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer horizontal-center">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="bi bi-x-lg"></i> Fechar</button>
                <button type="button" class="btn btn-primary" id="btn-add"><i class="bi bi-save"></i> Salvar</button>
            </div>
        </div>
    </div>
</div>