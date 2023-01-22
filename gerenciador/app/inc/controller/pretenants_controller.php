<?php
class pretenants_controller
{
	public static function data4select($key = "idx", $filters = array(" active = 'yes' "), $field = "name")
	{
		$product = new pretenants_model();
		$product->set_field(array($key, $field));
		$product->set_order(array(" name asc "));
		$product->set_filter($filters);
		$product->load_data();
		$out = array();
		foreach ($product->data as $value) {
			$out[$value[$key]] = $value[$field];
		}
		return $out;
	}

	private function filter($info)
	{
		$done = array();
		$filter = array(" active = 'yes' ");
		// if (!in_array($_SESSION[constant("cAppKey")]["credential"]["profiles_attach"][0]["idx"], array(1, 2)) && !in_array($_SESSION[constant("cAppKey")]["credential"]["profiles_attach"][0]["slug"], array('adm-premier', 'gestor-hsol'))) {
		// 	//$done["filter_profiles"] = $info["get"]["filter_profiles"];
		// 	$profiles_id = array_keys(profiles_controller::data4select("idx", array($_SESSION[constant("cAppKey")]["credential"]["profiles_attach"][0]["idx"] . " in ( idx, parent ) ")));
		// 	$filter["filter_profiles"] = " idx in ( select trails_profiles.trails_id from trails_profiles where trails_profiles.active = 'yes' and trails_profiles.profiles_id in ( '" . implode("','", $profiles_id) . "') ) ";
		// } else {
		// 	if (isset($info["get"]["filter_profiles"]) && !empty($info["get"]["filter_profiles"])) {
		// 		$done["filter_profiles"] = $info["get"]["filter_profiles"];
		// 		$filter["filter_profiles"] = " idx in ( select trails_profiles.trails_id from trails_profiles where trails_profiles.active = 'yes' and trails_profiles.profiles_id = '" . $info["get"]["filter_profiles"] . "' ) ";
		// 	}
		// }

		if (isset($info["get"]["paginate"]) && !empty($info["get"]["paginate"])) {
			$done["paginate"] = $info["get"]["paginate"];
		}
		if (isset($info["get"]["sr"]) && !empty($info["get"]["sr"])) {
			$done["sr"] = $info["get"]["sr"];
		}
		if (isset($info["get"]["ordenation"]) && !empty($info["get"]["ordenation"])) {
			$done["ordenation"] = $info["get"]["ordenation"];
		}
		if (isset($info["get"]["filter_id"]) && !empty($info["get"]["filter_id"])) {
			$done["filter_id"] = $info["get"]["filter_id"];
			$filter["filter_id"] = " idx like '%" . $info["get"]["filter_id"] . "%' ";
		}

		if (isset($info["get"]["filter_title"]) && !empty($info["get"]["filter_title"])) {
			$done["filter_title"] = $info["get"]["filter_title"];
			$filter["filter_title"] = " trail_title like '%" . $info["get"]["filter_title"] . "%' ";
		}

		if (isset($info["get"]["filter_name"]) && !empty($info["get"]["filter_name"])) {
			$done["filter_name"] = $info["get"]["filter_name"];
			$filter["filter_name"] = " trail_title like '%" . $info["get"]["filter_name"] . "%' ";
		}
		if (isset($info["get"]["filter_trail_status"]) && !empty($info["get"]["filter_trail_status"])) {
			$done["filter_trail_status"] = $info["get"]["filter_trail_status"];
			$filter["filter_trail_status"] = " trail_status = '" . $info["get"]["filter_trail_status"] . "' ";
		}
		return array($done, $filter);
	}

	public function display($info)
	{
		if (!site_controller::check_login()) {
			basic_redir($GLOBALS["home_url"]);
		}

		$paginate = isset($info["get"]["paginate"]) && (int)$info["get"]["paginate"] > 20 ? $info["get"]["paginate"] : 20;
		$ordenation = isset($info["get"]["ordenation"]) ? preg_replace("/-/", " ", $info["get"]["ordenation"]) : 'idx asc';

		list($done, $filter) = $this->filter($info);

		$pretenants = new pretenants_model();

		if ($info["format"] != ".json") {
			$pretenants->set_paginate(array($info["sr"], $paginate));
		} else {
			$pretenants->set_paginate(array(0, 900000));
		}

		$pretenants->set_filter($filter);
		$pretenants->set_order(array($ordenation));
		list($total, $data) = $pretenants->return_data();

		switch ($info["format"]) {
			case ".json":
				header('Content-type: application/json');
				echo json_encode(
					array(
						"total" => array("total" => $total), "row" => $data
					)
				);
				break;
			default:
				$page = 'Pré Locatarios';

				$form = array(
					"done" => rawurlencode(!empty($done) ? set_url($GLOBALS["pretenants_url"], $done) : $GLOBALS["pretenants_url"]), "pattern" => array(
						"new" => $GLOBALS["newpretenant_url"],
						"action" => $GLOBALS["pretenant_url"],
						"search" => !empty($info["get"]) ? set_url($GLOBALS["pretenants_url"], $info["get"]) : $GLOBALS["pretenants_url"]
					)
				);

				$ordenation_id = 'idx-asc';
				$ordenation_id_ordenation = 'fa fa-sort';
				$ordenation_name = 'name-asc';
				$ordenation_name_ordenation = 'fa fa-sort';
				switch ($ordenation) {
					case 'idx asc':
						$ordenation_id = 'idx-desc';
						$ordenation_id_ordenation = 'fa fa-sort-up';
						break;
					case 'idx desc':
						$ordenation_id = 'idx-asc';
						$ordenation_id_ordenation = 'fa fa-sort-down';
						break;
					case 'nome asc':
						$ordenation_name = 'nome-desc';
						$ordenation_name_ordenation = 'fa fa-sort-up';
						break;
					case 'nome desc':
						$ordenation_name = 'nome-asc';
						$ordenation_name_ordenation = 'fa fa-sort-down';
						break;
				}

				include(constant("cRootServer") . "ui/common/header.inc.php");
				include(constant("cRootServer") . "ui/common/head.inc.php");
				include(constant("cRootServer") . "ui/page/pretenants/pretenants.php");
				include(constant("cRootServer") . "ui/common/footer.inc.php");
				include(constant("cRootServer") . "ui/common/list_actions.php");
				print('<script>' . "\n");
				include(constant("cRootServer") . "furniture/js/pretenants/pretenants.js");
				print('</script>' . "\n");
				include(constant("cRootServer") . "ui/common/foot.inc.php");
				break;
		}
	}

	public function form($info)
	{
		if (!site_controller::check_login()) {
			basic_redir($GLOBALS["home_url"]);
		}

		if (isset($info["idx"])) {
			$pretenant = new pretenants_model();
			$pretenant->set_filter(array(" idx = '" . $info["idx"] . "' "));
			$pretenant->load_data();
			$pretenant->attach(array("prespouses", "pretenantsstatus", "personalreference", "pretenantsFinances", "pretenantspatrimonies"), null, "and active = 'yes'");
			$pretenant->join("usersCreated", "users", array("idx" => "created_by"), null);
			$data = current($pretenant->data);

			$form = array(
				"title" => "Editar Pré Locatário",
				"url" => sprintf($GLOBALS["pretenant_url"], $info["idx"])
			);
		} else {
			$data = array();
			$form = array(
				"title" => "Cadastrar Pré Locatário",
				"url" => $GLOBALS["newpretenant_url"]
			);
		}

		$pages = 'Pré Locatarios';
		$page = 'Pré Locatario';

		include(constant("cRootServer") . "ui/common/header.inc.php");
		include(constant("cRootServer") . "ui/common/head.inc.php");
		include(constant("cRootServer") . "ui/page/pretenants/pretenant.php");
		include(constant("cRootServer") . "ui/common/footer.inc.php");
		print("<script>");
		print('$("button[name=\'btn_back\']").bind("click", function(){');
		print(' document.location = "' . (isset($info["get"]["done"]) ? $info["get"]["done"] : $GLOBALS["pretenants_url"]) . '" ');
		print('})' . "\n");
		include(constant("cRootServer") . "furniture/js/pretenants/pretenant.js");
		print('</script>' . "\n");
		include(constant("cRootServer") . "ui/common/foot.inc.php");
	}

	public function save($info)
	{
		if (!site_controller::check_login()) {
			basic_redir($GLOBALS["home_url"]);
		}

		$pretenant = new pretenants_model();

		// print_pre($info, true);

		// $str = str_replace('.', '', $info["post"]["value"]); // remove o ponto
		// $info["post"]["value"] = str_replace(',', '.', $str);

		if ($info["post"]["pretenantsstatus_id"] == 1) {
			$pretenant->populate($info["post"]);
			$pretenant->save();

			$info["idx"] = $pretenant->con->insert_id;

			if ($info["post"]["civil_status"] == "married") {
				$spouse = new prespouses_model();
				$spouse->populate($info["post"]["spouse"]);
				$spouse->save();
	
				$info["post"]["prespouses_id"] = $spouse->con->insert_id;
	
				$pretenant->save_attach($info, array("prespouses"));
			}

			$pretenant->save_attach($info, array("pretenantsstatus"));
		} else if ($info["post"]["pretenantsstatus_id"] == 2) {
			$pretenant->set_filter(array(" idx = '" . $info["idx"] . "' "));

			$pretenant->populate($info["post"]);
			$pretenant->save();

			$personalreference = new personalreference_model();
			$personalreference->populate($info["post"]["personalreference"]);
			$personalreference->save();

			$info["post"]["personalreference_id"] = $personalreference->con->insert_id;

			$pretenant->save_attach($info, array("pretenantsstatus", "personalreference"));

		} else if ($info["post"]["pretenantsstatus_id"] == 3) {
			$pretenant->set_filter(array(" idx = '" . $info["idx"] . "' "));

			$pretenant->populate($info["post"]);
			$pretenant->save();

			$pretenantsFinances = new pretenantsFinances_model();
			$pretenantsFinances->populate($info["post"]);
			$pretenantsFinances->save();

			
			$info["post"]["pretenantsFinances_id"] = $pretenantsFinances->con->insert_id;
			$pretenant->save_attach($info, array("pretenants_status","pretenantsFinances"));
		
		} else {
			$pretenant->set_filter(array(" idx = '" . $info["idx"] . "' "));

			$pretenant->populate($info["post"]);
			$pretenant->save();

			$pretenant->save_attach($info, array("pretenantsstatus", "pretenantsFinances", "personalreference"));
		}

		basic_redir(sprintf($GLOBALS["pretenant_url"], $info["idx"]));
	}

	public function remove($info)
	{
		if (!site_controller::check_login()) {
			basic_redir($GLOBALS["home_url"]);
		}

		print_pre($info, true);

		if (isset($info["idx"])) {
			$product = new pretenants_model();

			$product->set_filter(array(" idx = '" . $info["idx"] . "' "));

			$product->remove();
		}

		basic_redir($GLOBALS["pretenants_url"]);
	}
}
