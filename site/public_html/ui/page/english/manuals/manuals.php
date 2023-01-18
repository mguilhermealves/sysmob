<main class="container-fluid">
    <section class="banners-products">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 banners-image-products">
                    <label id="texto-banners-products">
                        PRODUCTS
                        <br>
                        Manuals and Videos
                    </label>
                </div>
            </div>
        </div>
    </section>

    <section class="banners-products">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <?php foreach ($data as $k => $v) {
                    ?>
                        <div class="row margin-top-80 margin-bottom-80 padding-40 border-black">
                            <div class="col-12 col-sm-4 col-lg-4 col-xs-4 vertical-middle horizontal-center ">
                                <img class="img-fluid" src="<?php printf("%s%s", constant("cFrontend"), $v["manual_img"]); ?>">
                            </div>

                            <div class="col-12 col-sm-4 col-lg-4 col-xs-4 vertical-middle horizontal-center">
                                <div class="row">
                                    <div class="col-12 xs-margin-top-50">
                                        <h1 id="title-custom-products" class="xs-horizontal-center xs-margin-bottom-50"><?php print($v["name"]) ?></h1>
                                        <a name="" id="" class="btn btn-primary btn-custom-product" href="/<?php print(unserialize($v["manual_pdf"])) ?>" role="button" download> Download</a>
                                    </div>
                                    <div class="col-12 margin-top-40 xs-margin-top-50">
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-primary btn-custom-product" data-toggle="modal" data-target="#videoManual_<?php print($v['idx']) ?>">Assistir o vídeo</button>

                                        <!-- Modal Video -->
                                        <div class="modal fade" id="videoManual_<?php print($v['idx']) ?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-body">
                                                        <div class="container-fluid">
                                                            <div class="row">
                                                                <div class="col-lg-12 text-center">
                                                                    <iframe src="<?php print($v["video"]) ?>" width="100%" height="400" frameborder="0" controls></iframe>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-sm-4 col-lg-4 col-xs-4 vertical-middle horizontal-center xs-margin-top-50">
                                <p>
                                    <?php print($v["description_ingles"]) ?>
                                </p>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>
</main>