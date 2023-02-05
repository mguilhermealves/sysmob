<?php
class properties_controller
{
	public static function data4select($key = "idx", $filters = array(" active = 'yes' "), $field = "name")
	{
		$boiler = new properties_model();
		$boiler->set_field(array($key, $field));
		$boiler->set_order(array(" name asc "));
		$boiler->set_filter($filters);
		$boiler->load_data();
		$out = array();
		foreach ($boiler->data as $value) {
			$out[$value[$key]] = $value[$field];
		}
		return $out;
	}

	private function filter($info)
	{
		$done = array();
		$filter = array(" active = 'yes' ");

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

		$properties = new properties_model();

		if ($info["format"] != ".json") {
			$properties->set_paginate(array($info["sr"], $paginate));
		} else {
			$properties->set_paginate(array(0, 900000));
		}

		$properties->set_filter($filter);
		$properties->set_order(array($ordenation));
		list($total, $data) = $properties->return_data();

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
				$page = 'Propriedades';

				$form = array(
					"done" => rawurlencode(!empty($done) ? set_url($GLOBALS["properties_url"], $done) : $GLOBALS["properties_url"]), "pattern" => array(
						"new" => $GLOBALS["newproperty_url"],
						"action" => $GLOBALS["property_url"],
						"search" => !empty($info["get"]) ? set_url($GLOBALS["properties_url"], $info["get"]) : $GLOBALS["properties_url"]
					)
				);

				$rowDataTables = [];
				foreach ($data as $v) {
					$rowDataTables[] = array(
						$v["idx"],
						$v["cep"],
						$v["endereco"],
						$v["numero"],
						$v["bairro"],
						$v["cidade"],
						$v["estado"]
					);
				}

				include(constant("cRootServer") . "ui/common/header.inc.php");
				include(constant("cRootServer") . "ui/common/head.inc.php");
				include(constant("cRootServer") . "ui/page/propriedades/propriedades.php");
				include(constant("cRootServer") . "ui/common/footer.inc.php");
				include(constant("cRootServer") . "ui/common/list_actions.php");
				print('<script>' . "\n");
				include(constant("cRootServer") . "furniture/js/propriedades/propriedades.js");
				print('var properties_datatable = ' . json_encode($rowDataTables));
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
			$property = new properties_model();
			$property->set_filter(array(" idx = '" . $info["idx"] . "' "));
			$property->load_data();
			$property->attach(array("additionalproperties"), true);
			$property->join("usersCreated", "users", array("idx" => "created_by"), null);
			$data = current($property->data);

			$form = array(
				"title" => "Editar Propriedade",
				"url" => sprintf($GLOBALS["property_url"], $info["idx"])
			);
		} else {
			$data = array();
			$form = array(
				"title" => "Cadastrar Propriedade",
				"url" => $GLOBALS["newproperty_url"]
			);
		}

		$pages = array(
			"page" => array(
				"name" => "Propriedade"
			),
			"pages" => array(
				"url" => $GLOBALS["properties_url"],
				"name" => "Propriedades"
			)
		);

		include(constant("cRootServer") . "ui/common/header.inc.php");
		include(constant("cRootServer") . "ui/common/head.inc.php");
		include(constant("cRootServer") . "ui/page/propriedades/propriedade.php");
		include(constant("cRootServer") . "ui/common/footer.inc.php");
		print("<script>");
		print('$("button[name=\'btn_back\']").bind("click", function(){');
		print(' document.location = "' . (isset($info["get"]["done"]) ? $info["get"]["done"] : $GLOBALS["properties_url"]) . '" ');
		print('})' . "\n");
		include(constant("cRootServer") . "furniture/js/propriedades/propriedade.js");
		print('</script>' . "\n");
		include(constant("cRootServer") . "ui/common/foot.inc.php");
	}

	public function save($info)
	{
		if (!site_controller::check_login()) {
			basic_redir($GLOBALS["home_url"]);
		}

		$property = new properties_model();

		if (isset($info["idx"]) && (int)$info["idx"] > 0) {
			$property->set_filter(array(" idx = '" . $info["idx"] . "' "));

			$info["post"]["modified_at"] = date("Y-m-d H:i:s");
		}

		$property->populate($info["post"]);
		$property->save();

		if (!isset($info["idx"]) || (int)$info["idx"] == 0) {
			$info["idx"] = $property->con->insert_id;
		}

		if (isset($info["post"]["done"]) && !empty($info["post"]["done"])) {
			basic_redir($info["post"]["done"]);
		} else {
			basic_redir(sprintf($GLOBALS["property_url"], $info["idx"]));
		}
	}

	public function remove($info)
	{
		if (!site_controller::check_login()) {
			basic_redir($GLOBALS["home_url"]);
		}

		if (isset($info["idx"])) {
			$property = new properties_model();

			$property->set_filter(array(" idx = '" . $info["idx"] . "' "));

			$property->remove();
		}

		basic_redir($GLOBALS["properties_url"]);
	}
}
