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

		return array($done, $filter);
	}

	public function display($info)
	{
		if (!site_controller::check_login()) {
			basic_redir($GLOBALS["home_url"]);
		}

		list($done, $filter) = $this->filter($info);

		$properties = new properties_model();

		$properties->set_filter($filter);
		list($total, $data) = $properties->return_data();

		switch ($info["format"]) {
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
