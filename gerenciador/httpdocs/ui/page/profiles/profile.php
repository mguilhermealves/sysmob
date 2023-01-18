<section class="content-header">
    <h1>
        <?php print(constant("cTitle")) ?>
        <small><?php print($form["title"]) ?></small>
    </h1>

    <ol class="breadcrumb">
        <li>
            <a href="/"><i class="fa fa-dashboard"></i> Inicio</a>
        </li>
        <li>
            <a href="<?php print($form["pages"]["url"]) ?>"><?php print($form["pages"]["name"]); ?> </a>
        </li>
        <li class="active">
            <?php print($form["page"]["name"]); ?>
        </li>
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

                    <div class="box box-primary">
                        <div class="box-body">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="name">Nome:</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Ex: 00000-000" value="<?php print(isset($data["name"]) ? $data["name"] : "") ?>">
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="address">Endereço:</label>
                                    <textarea id="editor1" class="textarea" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12 text-right">
                        <button type="submit" name="btn_save" class="btn btn-primary btn-sm"><?php print(isset($data["idx"]) ? "Salvar" : "Cadastrar") ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>