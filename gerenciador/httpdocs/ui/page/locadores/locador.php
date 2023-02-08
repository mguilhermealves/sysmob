<?php 

if (!isset($info["idx"])) {
    include(constant("cRootServer") . "ui/page/locadores/create.php");
} else {
    include(constant("cRootServer") . "ui/page/locadores/editar.php");
}