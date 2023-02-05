<?php

class locators_controller
{
    public static function data4select($key = "idx", $filters = array(), $field = "concat_ws(' ', first_name, last_name) as name")
    {
        $locators = new locators_model();
        $locators->set_field(array($key, $field));
        $locators->set_filter($filters);
        $locators->set_order(array(" idx desc "));
        $locators->load_data();
        $out = array();
        foreach ($locators->data as $value) {
            $out[$value[$key]] = $value[preg_replace("/^.+ as (.+)$/", "$1", $field)];
        }
        return $out;
    }

    private function filter($info)
    {
        $done = array();
        $filter = array(" active = 'yes'");

        if (isset($info["get"]["filter_cpf"]) && !empty($info["get"]["filter_cpf"])) {
            $done["filter_cpf"] = $info["get"]["filter_cpf"];
            $filter["filter_cpf"] = " documento like '%" . $info["get"]["filter_cpf"] . "%' ";
        }

        if (isset($info["get"]["q_idx"]) && !empty($info["get"]["q_idx"])) {
            $filter["filter_q"] = " idx = " . $info["get"]["q_idx"] . " ";
        }

        if (isset($info["get"]["q_name"]) && !empty($info["get"]["q_name"])) {
            $filter["filter_q"] = " name like '%" . $info["get"]["q_name"] . "%' ";
        }

        if (isset($info["get"]["q_cpf"]) && !empty($info["get"]["q_cnpj"])) {
            $filter["filter_q"] = " documento like '%" . $info["get"]["q_cnpj"] . "%' ";
        }

        return array($done, $filter);
    }

    public function display($info)
    {
        if (!site_controller::check_login()) {
            basic_redir($GLOBALS["home_url"]);
        }

        $paginate = isset($info["get"]["paginate"]) ? $info["get"]["paginate"] : 20;

        if (isset($info["get"]["query"]) && strlen(addslashes($info["get"]["query"]))) {
            $query = preg_replace("/\[+?|\]+?/", "", toUtf8($info["get"]["query"]));
            $query = preg_replace("/\s+?|\t+?|\n+?/", " ", $query);
            $query = preg_replace("/^ | $/", "", $query);
            $query = preg_replace("/([A-z0-9\ \-\_])+?/", "$1", $query);

            if (empty($query)) {
                $query = " ";
            }

            switch ($info["get"]["autcomplete_field"]) {
                case "locators_id":
                    $query = preg_replace("/\D+?/im", "", $query);
                    $info["get"]["q_idx"] = $query;
                    break;
                case "locators_name":
                    $info["get"]["q_name"] = $query;
                    break;
                case "locators_cpf":
                    $info["get"]["q_cpf"] = $query;
                    break;
            }
        }

        $ordenation = isset($info["get"]["ordenation"]) ? preg_replace("/-/", " ", $info["get"]["ordenation"]) : 'idx desc';

        list($done, $filter) = $this->filter($info);

        $locadores = new locators_model();

        if ($info["format"] == ".html") {
            $locadores->set_paginate(array((int)$info["sr"] > $paginate ? (int)$info["sr"] : 0, $paginate));
        } else {
            $locadores->set_paginate(array(0, 900000));
        }

        $locadores->set_filter($filter);

        $locadores->load_data();

        $data = $locadores->data;

        $total = $locadores->con->result($locadores->con->select(" ifnull( count( idx ) , 0 ) as s ", " locators ", " where " . implode(" and ", $filter)), "s", 0);

        switch ($info["format"]) {
            case ".autocomplete":
                $out = array(
                    "query" => isset($cod_cliente) ? $cod_cliente : "", "suggestions" => array(),
                );

                foreach ($data as $value) {
                    $out["suggestions"][] = array(
                        "data" => $value,
                        "value" => sprintf("%s (%s) ", $value["name"], $value["cnpj"])
                    );
                }

                header('Content-type: application/json');
                echo json_encode($out);
                break;
            case ".json":
                $t = array("total" => 3);
                header('Content-type: application/json');
                echo json_encode(
                    array(
                        "total" => array_merge(array("total" => array_sum($t)), $t), "row" => $data
                    )
                );
                break;
            default:
                $page = 'Lista de Locadores';

                $form = array(
                    "done" => rawurlencode(!empty($done) ? set_url($GLOBALS["locators_url"], $done) : $GLOBALS["locators_url"]), "pattern" => array(
                        "new" => $GLOBALS["newlocator_url"], "action" => $GLOBALS["locator_url"], "search" => !empty($info["get"]) ? set_url($GLOBALS["locators_url"], $info["get"]) : $GLOBALS["locators_url"]
                    )
                );

                $ordenation_nome_completo = 'idx-asc';
                $ordenation_nome_completo_ordenation = 'fa fa-sort';
                $ordenation_cpf = 'name-asc';
                $ordenation_cpf_ordenation = 'fa fa-sort';
                switch ($ordenation) {
                    case 'idx asc':
                        $ordenation_nome_completo = 'idx-desc';
                        $ordenation_nome_completo_ordenation = 'fa fa-sort-up';
                        break;
                    case 'idx desc':
                        $ordenation_nome_completo = 'idx-asc';
                        $ordenation_nome_completo_ordenation = 'fa fa-sort-down';
                        break;
                    case 'nome asc':
                        $ordenation_cpf = 'nome-desc';
                        $ordenation_cpf_ordenation = 'fa fa-sort-up';
                        break;
                    case 'nome desc':
                        $ordenation_cpf = 'nome-asc';
                        $ordenation_cpf_ordenation = 'fa fa-sort-down';
                        break;
                }

                include(constant("cRootServer") . "ui/common/header.inc.php");
                include(constant("cRootServer") . "ui/common/head.inc.php");
                include(constant("cRootServer") . "ui/page/locadores/locadores.php");
                include(constant("cRootServer") . "ui/common/footer.inc.php");
                print('<script>' . "\n");
				print('    data_locadores_json = {' . "\n");
				print('        url: "' . $GLOBALS["locators_url"] . '.json"' . "\n");
				print('        , data: ' . json_encode($done) . "\n");
				print('        , action: "' . set_url($GLOBALS["locator_url"], array("done" => rawurlencode($form["done"]))) . '"' . "\n");
				print('        , template: ""' . "\n");
				print('        , page: 1' . "\n");
				print('    }' . "\n");
				include(constant("cRootServer") . "furniture/js/propriedades/propriedades.js");
				print('</script>' . "\n");
                include(constant("cRootServer") . "ui/common/foot.inc.php");
        }
    }

    public function form($info)
    {
        if (!site_controller::check_login()) {
            basic_redir($GLOBALS["home_url"]);
        }

        if (!site_controller::check_login()) {
            basic_redir($GLOBALS["home_url"]);
        }

        if (isset($info["idx"])) {
            $locador = new locators_model();
            $locador->set_filter(array(" idx = '" . $info["idx"] . "' "));
            $locador->load_data();
            $data = current($locador->data);

            $form = array(
                "title" => "Editar Locador",
                "url" => sprintf($GLOBALS["property_url"], $info["idx"])
            );
        } else {
            $data = array();
            $form = array(
                "title" => "Cadastrar Locador",
                "url" => $GLOBALS["newproperty_url"]
            );
        }

        $pages = array(
            "page" => array(
                "name" => "Locador"
            ),
            "pages" => array(
                "url" => $GLOBALS["properties_url"],
                "name" => "Locadores"
            )
        );

        include(constant("cRootServer") . "ui/common/header.inc.php");
        include(constant("cRootServer") . "ui/common/head.inc.php");
        include(constant("cRootServer") . "ui/page/locadores/locador.php");
        include(constant("cRootServer") . "ui/common/footer.inc.php");
        print("<script>");
        print('$("button[name=\'btn_back\']").bind("click", function(){');
        print(' document.location = "' . (isset($info["get"]["done"]) ? $info["get"]["done"] : $GLOBALS["locators_url"]) . '" ');
        print('})' . "\n");
        include(constant("cRootServer") . "furniture/js/locadores/locador.js");
        print('</script>' . "\n");
        include(constant("cRootServer") . "ui/common/foot.inc.php");
    }
}
