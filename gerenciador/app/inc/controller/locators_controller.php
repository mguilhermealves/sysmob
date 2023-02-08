<?php
class locators_controller
{
	public static function data4select($key = "idx", $filters = array(" active = 'yes' "), $field = "name")
	{
		$boiler = new locators_model();
		$boiler->set_field(array($key, $field));
		$boiler->set_order(array(" idx desc "));
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

		$properties = new locators_model();

		$properties->set_filter($filter);
		list($total, $data) = $properties->return_data();

		switch ($info["format"]) {
			default:
				$page = 'Locadores';

				$form = array(
					"done" => rawurlencode(!empty($done) ? set_url($GLOBALS["locators_url"], $done) : $GLOBALS["locators_url"]), "pattern" => array(
						"new" => $GLOBALS["newlocator_url"],
						"action" => $GLOBALS["locator_url"],
						"search" => !empty($info["get"]) ? set_url($GLOBALS["locators_url"], $info["get"]) : $GLOBALS["locators_url"]
					)
				);

				include(constant("cRootServer") . "ui/common/header.inc.php");
				include(constant("cRootServer") . "ui/common/head.inc.php");
				include(constant("cRootServer") . "ui/page/locadores/locadores.php");
				include(constant("cRootServer") . "ui/common/footer.inc.php");
				print('<script>' . "\n");
				include(constant("cRootServer") . "furniture/js/locadores/locadores.js");
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
			$property = new locators_model();
			$property->set_filter(array(" idx = '" . $info["idx"] . "' "));
			$property->load_data();
			$property->attach(array("additionalproperties"), true);
			$property->join("usersCreated", "users", array("idx" => "created_by"), null);
			$data = current($property->data);

			$form = array(
				"title" => "Editar Locador",
				"url" => sprintf($GLOBALS["locator_url"], $info["idx"])
			);
		} else {
			$data = array();
			$form = array(
				"title" => "Cadastrar Locador",
				"url" => $GLOBALS["newlocator_url"]
			);
		}

		$pages = array(
			"page" => array(
				"name" => "Locador"
			),
			"pages" => array(
				"url" => $GLOBALS["locators_url"],
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

	public function save($info)
	{
		if (!site_controller::check_login()) {
			basic_redir($GLOBALS["home_url"]);
		}

		$property = new locators_model();

		if (isset($info["idx"]) && (int)$info["idx"] > 0) {
			$property->set_filter(array(" idx = '" . $info["idx"] . "' "));

			$info["post"]["modified_at"] = date("Y-m-d H:i:s");
		}

		$property->populate($info["post"]);
		$property->save();

		if (!isset($info["idx"]) || (int)$info["idx"] == 0) {
			$info["idx"] = $property->con->insert_id;
		}

		if($info["post"]["estado_civil"] == 'married') {
			$spouse = new prespouses_model();
			$spouse->populate($info["post"]["spouse"]);
			$spouse->save();

			$info["post"]["spouses_id"] = $spouse->con->insert_id;

			$property->save_attach($info, array("spouses"));
		}

		if (isset($info["post"]["done"]) && !empty($info["post"]["done"])) {
			basic_redir($info["post"]["done"]);
		} else {
			basic_redir(sprintf($GLOBALS["locator_url"], $info["idx"]));
		}
	}

	public function remove($info)
	{
		if (!site_controller::check_login()) {
			basic_redir($GLOBALS["home_url"]);
		}

		if (isset($info["idx"])) {
			$property = new locators_model();

			$property->set_filter(array(" idx = '" . $info["idx"] . "' "));

			$property->remove();
		}

		basic_redir($GLOBALS["locators_url"]);
	}
}
