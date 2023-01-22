<div class="modal fade reveal-modal" id="patrimony_modal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true" data-action="/cadastrar_patrimonio" data-table="#table-patrimonies">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="box-header">
                    <h3 class="box-title">Adicionar Patrimonio</h3>
                </div>
            </div>

            <input type="hidden" name="pretenants_id" value="<?php print($data["idx"]) ?>">

            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="box box-primary">
                            <div class="box-body">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="type_patrimony">Tipo do Patrimônio</label>
                                        <select class="form-control type_patrimony" name="type_patrimony">
                                            <?php
                                            foreach ($GLOBALS["typepatrimonies_lists"] as $k => $v) {
                                                printf('<option value="%s"%s>%s</option>' . "\n", $k, isset($pretenantspatrimonies["type_patrimony"]) && $pretenantspatrimonies["type_patrimony"] == $k  ? ' selected="selected"' : '', $v);
                                            }
                                            ?>
                                        </select>
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
                                        <input type="text" name="city_imovel" id="city_imovel" class="form-control" value="">
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="uf_imovel">Estado</label>
                                        <input type="text" name="uf_imovel" id="uf_imovel" class="form-control" value="">
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
                                        <input type="text" name="tipo_auto" id="tipo_auto" class="form-control" value="">
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="modelo_auto">Modelo</label>
                                        <input type="text" name="modelo_auto" id="modelo_auto" class="form-control" value="">
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="ano_auto">Ano</label>
                                        <input type="text" name="ano_auto" id="ano_auto" class="form-control" value="">
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
                <button type="button" class="btn btn-secondary close-modal" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary btn-save save-form-modal" id="btn-save" name="btn_save">Salvar</button>
            </div>
        </div>
    </div>
</div>

<style>
    .modal-header {
        padding: 15px;
        border-bottom: none
    }
</style>