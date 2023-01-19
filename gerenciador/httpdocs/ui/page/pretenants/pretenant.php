<?php switch ($_SESSION[constant("cAppKey")]["credential"]["profiles_attach"][0]["slug"]) {
    case "master":
    case "administrador":
        if (!isset($info["idx"])) {
            // Criando o Locatario - Etapa 1:
            include(constant("cRootServer") . "ui/page/pretenants/steps/step_1.php");
        } else {
            switch ($data["pretenants_status_attach"][0]["idx"]) {
                case "1":
                    include(constant("cRootServer") . "ui/page/pretenants/steps/step_2.php");
                    break;
                case "2":
                    include(constant("cRootServer") . "ui/page/pretenants/steps/step_3.php");
            }
        }
        break;
}
