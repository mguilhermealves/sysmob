<!-- small box -->
<div class="col-lg-6 col-xs-6">
    <div class="small-box bg-aqua">
        <div class="inner">
            <h3><?php print(count($data_manuals)) ?></h3>

            <p>Total de Manuais (Ativos)</p>
        </div>
        <div class="icon">
            <i class="bi bi-file-pdf"></i>
        </div>
        <a href="<?php print($GLOBALS["manuals_url"]); ?>" class="small-box-footer">Mais Informações <i class="fa fa-arrow-circle-right"></i></a>
    </div>
</div>
<!-- ./col -->