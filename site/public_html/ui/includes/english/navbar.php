<nav class="navbar navbar-expand-lg nav-black padding-left-80 xs-padding-left-0">
    <a href="/home" class="navbar-brand padding-left-40 xs-padding-left-0">
        <img class="img-fluid" src="<?php printf("%s%s", constant("cFurniture"), "images/logo-branca.png") ?>" style="max-width: 100px; margin:0 auto; float:none">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse">
        <span class="fa fa-bars"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mx-auto">
            <li class="nav-item active margin-right-40">
                <a class="nav-link nav-link-custom" href="/home">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item margin-right-40">
                <a class="nav-link nav-link-custom" href="<?php print($GLOBALS["products_url"]) ?>">Products</a>
            </li>
            <li class="nav-item margin-right-40">
                <a class="nav-link nav-link-custom" href="<?php print($GLOBALS["certifications_url"]) ?>">Certifications</a>
            </li>
            <li class="nav-item margin-right-40">
                <a class="nav-link nav-link-custom" href="<?php print($GLOBALS["contact_url"]) ?>">Contact</a>
            </li>
        </ul>
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active margin-left-40 xs-margin-left-0">
                <a class="nav-link nav-link-custom" href="/">Portuguese <span class="sr-only">(current)</span></a>
            </li>
        </ul>
    </div>
</nav>