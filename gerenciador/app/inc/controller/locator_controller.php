<?php

class locator_controller
{
    public static function data4select($key = "idx", $filters = array(), $field = "name")
    {
        $filed_name = ltrim(rtrim(preg_replace("/.+ as (.+)$/", "$1", $field)));
        $locator = new locator_model();
        $locator->set_field(array($key, $field));
        $locator->set_filter($filters);
        $locator->set_order(array($filed_name));
        $locator->load_data();
        $locator->set_order(array($field . " asc "));
        $out = array();
        foreach ($locator->data as $value) {
            $out[$value[$key]] = $value[$field];
        }
        return $out;
    }

    private function filter($info)
    {
        $done = array();
        $filter = array(" active = 'yes'");

        if (isset($info["get"]["filter_cpf"]) && !empty($info["get"]["filter_cpf"])) {
            $done["filter_cpf"] = $info["get"]["filter_cpf"];
            $filter["filter_cpf"] = " cpf like '%" . $info["get"]["filter_cpf"] . "%' ";
        }

        return array($done, $filter);
    }

    public function display($info)
    {
        if (!site_controller::check_login()) {
            basic_redir($GLOBALS["home_url"]);
        }

        $paginate = isset($info["get"]["paginate"]) ? $info["get"]["paginate"] : 20;
        $ordenation = isset($info["get"]["ordenation"]) ? preg_replace("/-/", " ", $info["get"]["ordenation"]) : 'nome_completo asc';
        list($done, $filter) = $this->filter($info);

        $locadores = new locator_model();

        $locadores->set_order(array(" nome_completo asc "));
        if ($info["format"] == ".html") {
            $locadores->set_paginate(array((int)$info["sr"] > $paginate ? (int)$info["sr"] : 0, $paginate));
        } else {
            $locadores->set_paginate(array(0, 900000));
        }
        $locadores->set_filter($filter);

        $locadores->load_data();
        $data_locadores = $locadores->data;
        $total = $locadores->con->result($locadores->con->select(" ifnull( count( idx ) , 0 ) as s ", " locator ", " where " . implode(" and ", $filter)), "s", 0);

        // print_pre($data, true);

        switch ($info["format"]) {
            case ".json":
                $t = array("total" => 3);
                header('Content-type: application/json');
                echo json_encode(
                    array(
                        "total" => array_merge(array("total" => array_sum($t)), $t), "row" => $data_locadores
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
                include(constant("cRootServer") . "ui/page/locators.php");
                include(constant("cRootServer") . "ui/common/footer.inc.php");
                include(constant("cRootServer") . "ui/common/foot.inc.php");
        }
    }

    public function form($info)
    {
        if (!site_controller::check_login()) {
            basic_redir($GLOBALS["home_url"]);
        }

        $locador = new locator_model();
        $locador->load_data();
        $data_locador = $locador->data;

        include(constant("cRootServer") . "ui/common/header.inc.php");
        include(constant("cRootServer") . "ui/common/head.inc.php");
        include(constant("cRootServer") . "ui/page/locator.php");
        include(constant("cRootServer") . "ui/common/footer.inc.php");
        include(constant("cRootServer") . "ui/common/foot.inc.php");
    }
}
