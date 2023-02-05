<?php 

if (!isset($info["idx"])) {
    include(constant("cRootServer") . "ui/page/propriedades/create.php");
} else {
    include(constant("cRootServer") . "ui/page/propriedades/editar.php");
}