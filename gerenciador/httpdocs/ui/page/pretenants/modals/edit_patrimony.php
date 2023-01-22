<div id="editpatrimony_modal_<?php print($pretenantspatrimonies["idx"]) ?>" class="modal fade reveal-modal" data-action="/cadastrar_patrimonio" data-table="#table-patrimonies" id="formModal" data-modal="#editorderspayment" data-reveal aria-labelledby="modalTitle" data-modal="#editpatrimony_modal_<?php print($pretenantspatrimonies["idx"]) ?>" aria-hidden="true" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="box-header">
                    <h3 class="box-title">Editar Patrimonio</h3>
                </div>
            </div>

            <input type="hidden" name="idx" value="<?php print($pretenantspatrimonies["idx"]) ?>" />
            <input type="hidden" name="pretenants_id" value="<?php print($data["idx"]) ?>">

            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="box box-primary">
                            <div class="box-body">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="type_patrimony">Tipo do Patrimônio</label>
                                        <input type="text" name="type_patrimony" class="form-control type_patrimony" value="<?php print($pretenantspatrimonies["type_patrimony"]) ?>" disabled>
                                    </div>
                                </div>
                            </div>

                            <div class="box-body imovel" style="display:none;">
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="tipo_imovel">Tipo do Imovel</label>
                                        <select class="form-control" id="tipo_imovel" name="tipo_imovel">
                                            <option value="">Selecione</option>
                                            <option value="Casa">Casa</option>
                                            <option value="Apartamento">Apartamento</option>
                                            <option value="Terreno">Terreno</option>
                                            <option value="Galpao">Galpão</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="city_imovel">Cidade</label>
                                        <input type="text" name="city_imovel" id="city_imovel" class="form-control" value="<?php print($pretenantspatrimonies["city_imovel"]) ?>">
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="uf_imovel">Estado</label>
                                        <input type="text" name="uf_imovel" id="uf_imovel" class="form-control" value="<?php print($pretenantspatrimonies["uf_imovel"]) ?>">
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="onus">Possui onus?</label>
                                        <select name="onus" class="form-control" id="onus">
                                            <option value="">Selecione</option>
                                            <option value="yes">Sim</option>
                                            <option value="no">Não</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="box-body auto" style="display:none;">
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="tipo_auto">Marca</label>
                                        <input type="text" name="tipo_auto" id="tipo_auto" class="form-control" value="<?php print($pretenantspatrimonies["tipo_auto"]) ?>">
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="modelo_auto">Modelo</label>
                                        <input type="text" name="modelo_auto" id="modelo_auto" class="form-control" value="<?php print($pretenantspatrimonies["modelo_auto"]) ?>">
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="ano_auto">Ano</label>
                                        <input type="text" name="ano_auto" id="ano_auto" class="form-control" value="<?php print($pretenantspatrimonies["ano_auto"]) ?>">
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
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary btn-save save-form-modal" id="btn-save" name="btn_save">Salvar</button>
            </div>
        </div>
    </div>
</div>