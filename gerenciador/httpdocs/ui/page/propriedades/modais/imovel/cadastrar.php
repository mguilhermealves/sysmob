<div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Informações Adicionais</h5>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="box box-primary">
                            <div class="box-body">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="finalidade">Finalidade:</label>
                                        <select class="form-control" id="finalidade" name="finalidade">
                                            <option value="0">Selecione</option>
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
                                        <label for="estado_imovel">Estado do Imóvel:</label>
                                        <input type="text" class="form-control" id="estado_imovel" name="estado_imovel" value="<?php print(isset($data["estado_imovel"]) ? $data["estado_imovel"] : "0") ?>">

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
                                        <textarea type="text" class="form-control textarea" id="descritivo_imovel" name="descritivo_imovel" value="<?php print(isset($data["descritivo_imovel"]) ? $data["descritivo_imovel"] : "") ?>"> </textarea>
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