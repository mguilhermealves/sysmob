<?php
class menus_controller
{
	public static function data4select($key = "idx", $filters = array(), $field = "name")
	{
		$filed_name = ltrim(rtrim(preg_replace("/.+ as (.+)$/", "$1", $field)));
		$boiler = new menus_model();
		$boiler->set_field(array($key, $field));
		$boiler->set_filter($filters);
		$boiler->set_order(array($filed_name));
		$boiler->load_data();
		$boiler->set_order( array( $field . " asc " ) );
        $out = array();
		foreach( $boiler->data as $value ){
			$out[ $value[ $key ] ] = $value[ $field ] ;
		}
		return $out;
	}
	private function filter($info)
	{
		$done = array();
		$filter = array(" active = 'yes' ");
		if (isset($info["get"]["filter_name"]) && !empty($info["get"]["filter_name"])) {
			$done["filter_name"] = $info["get"]["filter_name"];
			$filter["filter_name"] = " name like '%" . $info["get"]["filter_name"] . "%' ";
		}
		if (isset($info["get"]["filter_profile"]) && !empty($info["get"]["filter_profile"])) {
			$done["filter_profile"] = $info["get"]["filter_profile"];
			$filter["filter_profile"] = " idx in ( select menus_profiles.menus_id from menus_profiles where menus_profiles.active = 'yes' and menus_profiles.profiles_id = '" . $info["get"]["filter_profile"] . "' ) ";
		}
		return array($done, $filter);
	}
	public function form($info)
	{
		if (!site_controller::check_login()) {
			basic_redir($GLOBALS["home_url"]);
		}
		$page = "Menus";
        $data = array();
        $form = array(
            "title" => "Cadastrar Menu"
            , "url" => $GLOBALS["newmenu_url"] 
        );
        $info["get"]["done"] =  set_url( $GLOBALS["menus_url"] , $info["get"] );
        if( isset( $info["idx"] ) && (int)$info["idx"] > 0 ){
            $boiler = new menus_model();
            $boiler->set_filter( array( " idx = '" . $info["idx"] . "'" ) ) ;
            $boiler->load_data();
            $boiler->set_paginate( array(1) ) ;
            $boiler->attach( array("profiles", "urls")) ;
            $data = current( $boiler->data ) ;
            $form["title"] = "Editar Menu";
            $form["url"] = sprintf( $GLOBALS["menu_url"] , $info["idx"] ) ;
        }

		// print_pre($data, true);
		$page = 'menus';
		include(constant("cRootServer") . "ui/common/header.inc.php");
		include(constant("cRootServer") . "ui/common/head.inc.php");
		include(constant("cRootServer") . "ui/page/menu.php");
		include(constant("cRootServer") . "ui/common/footer.inc.php");
		print("<script>");
		print('$("button[name=\'btn_back\']").bind("click", function(){');
		print(' document.location = "' . $form["done"] . '" ');
		print('})' . "\n");
		print("</script>");
		include(constant("cRootServer") . "ui/common/foot.inc.php");
	}
	public function display($info)
	{
		if (!site_controller::check_login()) {
			basic_redir($GLOBALS["home_url"]);
		}
		$paginate = isset($info["get"]["paginate"]) ? $info["get"]["paginate"] : 20;
		$sidebar_color = "rgba(132, 132, 132, 1)";
		list($done, $filter) = $this->filter($info);
		$boiler = new menus_model();
		$boiler->set_order(array(" position asc "));
		if ($info["format"] == ".html") {
			$boiler->set_paginate(array((int)$info["sr"] > $paginate ? (int)$info["sr"] : 0, $paginate));
		} else {
			$boiler->set_paginate(array(0, 900000));
		}
		$boiler->set_filter($filter);

		$boiler->load_data();
		$boiler->attach(array("profiles", "urls"));


		$data = $boiler->data;
		$menus_parents = menus_controller::data4select("idx", array(" idx > 0 "));
		$menus_parents["-1"] = "--- Raiz ---";
		$total = $boiler->con->result($boiler->con->select(" ifnull( count( idx ) , 0 ) as s ", " menus ", " where " . implode(" and ", $filter)), "s", 0);

		// print_pre($menus_parents, true);

		switch ($info["format"]) {
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
				$page = 'menus';

				$form = array(
					"done" => rawurlencode(!empty($done) ? set_url($GLOBALS["menus_url"], $done) : $GLOBALS["menus_url"]), "pattern" => array(
						"new" => $GLOBALS["newmenu_url"], "action" => $GLOBALS["menu_url"], "search" => !empty($info["get"]) ? set_url($GLOBALS["menus_url"], $info["get"]) : $GLOBALS["menus_url"]
					)
				);
				include(constant("cRootServer") . "ui/common/header.inc.php");
				include(constant("cRootServer") . "ui/common/head.inc.php");


				include(constant("cRootServer") . "ui/page/menus.php");

				include(constant("cRootServer") . "ui/common/footer.inc.php");
				include(constant("cRootServer") . "ui/common/list_actions.php");
				include(constant("cRootServer") . "ui/common/foot.inc.php");
				break;
		}
	}
	public function save($info)
	{
		if (!site_controller::check_login()) {
			basic_redir($GLOBALS["home_url"]);
		}
		$boiler = new menus_model();
		if (isset($info["idx"]) && (int)$info["idx"] > 0) {
			$boiler->set_filter(array(" idx = '" . $info["idx"] . "' "));
		} 

		$boiler->populate($info["post"]);
		$boiler->save();

		if( !isset( $info["idx"] ) ){
            $info["idx"] = $boiler->con->insert_id;
        }

		$boiler->save_attach($info, array("profiles", "urls"));

		if (isset($info["post"]["done"]) && !empty($info["post"]["done"])) {
			basic_redir($info["post"]["done"]);
		} else {
			basic_redir($GLOBALS["menus_url"]);
		}
	}
	public function remove($info)
	{
		if (!site_controller::check_login()) {
			basic_redir($GLOBALS["home_url"]);
		}
		$boiler = new menus_model();
		if (isset($info["idx"]) && (int)$info["idx"] > 0) {
			$boiler->set_filter(array(" idx = '" . $info["idx"] . "' "));
			$boiler->remove();
		}
		if (isset($info["post"]["done"]) && !empty($info["post"]["done"])) {
			basic_redir($info["post"]["done"]);
		} else {
			basic_redir($GLOBALS["menus_url"]);
		}
	}
}
