<?php
class users_controller
{
	public static function data4select($key = "idx", $filters = array(), $field = "name")
	{
		$filed_name = ltrim(rtrim(preg_replace("/.+ as (.+)$/", "$1", $field)));
		$users = new users_model();
		$users->set_field(array($key, $field));
		$users->set_filter($filters);
		$users->set_order(array($filed_name));
		$users->load_data();
		$out = array_column($users->data, $filed_name, $key);
		return $out;
	}

	private function filter($info)
	{
		$done = array();
		$filter = array(" active = 'yes' ", " idx in ( select users_profiles.users_id from users_profiles where users_profiles.active = 'yes' and users_profiles.profiles_id in (1, 2) ) ");

		if (!in_array($_SESSION[constant("cAppKey")]["credential"]["profiles_attach"][0]["idx"], array(1, 2)) && !in_array($_SESSION[constant("cAppKey")]["credential"]["profiles_attach"][0]["slug"], array('master'))) {
			$profiles_id = array_keys(profiles_controller::data4select("idx", array($_SESSION[constant("cAppKey")]["credential"]["profiles_attach"][0]["idx"] . " in ( idx, parent ) ")));
			$filter["filter_profiles"] = " idx in ( select users_profiles.trails_id from users_profiles where users_profiles.active = 'yes' and users_profiles.profiles_id in ( '" . implode("','", $profiles_id) . "') ) ";
		}

		if (isset($info["get"]["filter_profile"]) && !empty($info["get"]["filter_profile"])) {
			$done["filter_profile"] = $info["get"]["filter_profile"];
			$filter["filter_profile"] = " idx in ( select users_profiles.users_id from users_profiles where users_profiles.active = 'yes' and users_profiles.profiles_id = '" . $info["get"]["filter_profile"] . "' ) ";
		}

		if (isset($info["get"]["q_name"]) && !empty($info["get"]["q_name"])) {
			$filter["filter_q"] = " concat_ws(' ', first_name, last_name ) like '%" . $info["get"]["q_name"] . "%' ";
		}

		if (isset($info["get"]["q_mail"]) && !empty($info["get"]["q_mail"])) {
			$filter["filter_q"] = " mail like '%" . $info["get"]["q_mail"] . "%' ";
		}
		if (isset($info["get"]["q_cpf"]) && !empty($info["get"]["q_cpf"])) {
			$filter["filter_q"] = " cpf like '%" . $info["get"]["q_cpf"] . "%' ";
		}
		if (isset($info["get"]["filter_first_name"]) && !empty($info["get"]["filter_first_name"])) {
			$done["filter_first_name"] = $info["get"]["filter_first_name"];
			$filter["filter_first_name"] = " first_name like '%" . $info["get"]["filter_first_name"] . "%' ";
		}
		if (isset($info["get"]["filter_last_name"]) && !empty($info["get"]["filter_last_name"])) {
			$done["filter_last_name"] = $info["get"]["filter_last_name"];
			$filter["filter_last_name"] = " last_name like '%" . $info["get"]["filter_last_name"] . "%' ";
		}
		if (isset($info["get"]["filter_cpf"]) && !empty($info["get"]["filter_cpf"])) {
			$done["filter_cpf"] = $info["get"]["filter_cpf"];
			$filter["filter_cpf"] = " replace(replace(cpf , '.',''),'-','') = '" . preg_replace("/[^0-9]+?/", "", $info["get"]["filter_cpf"]) . "' ";
		}

		if (isset($info["get"]["filter_mail"]) && !empty($info["get"]["filter_mail"])) {
			$done["filter_mail"] = $info["get"]["filter_mail"];
			$filter["filter_mail"] = " mail like '%" . $info["get"]["filter_mail"] . "%' ";
		}
		return array($done, $filter);
	}

	public function display($info)
	{

		if (!site_controller::check_login()) {
			basic_redir($GLOBALS["home_url"]);
		}
		$paginate = isset($info["get"]["paginate"]) && (int)$info["get"]["paginate"] > 20 ? $info["get"]["paginate"] : 20;
		$ordenation = isset($info["get"]["ordenation"]) ? preg_replace("/-/", " ", $info["get"]["ordenation"]) : 'first_name asc';

		if (isset($info["get"]["query"]) && strlen(addslashes($info["get"]["query"]))) {
			$query = preg_replace("/\[+?|\]+?/", "", toUtf8($info["get"]["query"]));
			$query = preg_replace("/\s+?|\t+?|\n+?/", " ", $query);
			$query = preg_replace("/^ | $/", "", $query);
			$query = preg_replace("/([A-z0-9\ \-\_])+?/", "$1", $query);

			if (empty($query)) {
				$query = " ";
			}

			switch ($info["get"]["autcomplete_field"]) {
				case "cpf":
					$query = preg_replace("/\D+?/im", "", $query);
					$info["get"]["q_cpf"] = $query;
					break;
				case "name":
					$info["get"]["q_name"] = $query;
					break;
				case "mail":
					$info["get"]["q_mail"] = $query;
					break;
			}
		}

		list($done, $filter) = $this->filter($info);
		
		$users = new users_model();
		$users->set_filter($filter);
		$users->set_order(array($ordenation));
		$users->load_data();
		$users->attach(array("profiles"), false, null, array("idx", "name"));
		$data = $users->data;

		$profiles_lists = profiles_controller::data4select("idx", array(" idx in (1, 2) "), "name");

		switch ($info["format"]) {
			case ".autocomplete":
				$out = array(
					"query" => isset($cod_cliente) ? $cod_cliente : "", "suggestions" => array(),
				);
				foreach ($data as $key => $value) {
					$out["suggestions"][] = array(
						"data" => $value, "value" => sprintf("%s %s (%s) ", $value["first_name"], $value["last_name"], $value["mail"])
					);
				}

				header('Content-type: application/json');
				echo json_encode($out);
				break;
			case ".json":
				$t = array();
				foreach (array("yes", "no") as $k) {
					$t[$k] = 0;
				}

				foreach (array_column($users->con->results($users->con->select(" count( idx ) as q , enabled ", " users ", " where " . implode(" and ", $filter))), "q", "enabled") as $k => $v) {
					$t[$k] = (int)$v;
				}

				header('Content-type: application/json');
				echo json_encode(
					array(
						"total" => array_merge(array("total" => array_sum($t)), $t), "row" => $data, "profiles" => $profiles_lists
					)
				);
				break;
			default:
				$page = 'users';

				$p = array();
				foreach ($profiles_lists as $k => $v) {
					$p[$k] = 0;
				}

				foreach (array_column($users->con->results($users->con->select(" count( users_id ) as q, profiles_id ", " users_profiles ", " where active = 'yes' and users_id in ( select idx from users where " . implode(" and ", $filter) . ") group by profiles_id ")), "q", "profiles_id") as $k => $v) {
					$p[$k] = $v;
				}

				$form = array(
					"done" => rawurlencode(!empty($done) ? set_url($GLOBALS["users_url"], $done) : $GLOBALS["users_url"]), "pattern" => array(
						"new" => $GLOBALS["newuser_url"], "action" => $GLOBALS["user_url"], "search" => !empty($info["get"]) ? set_url($GLOBALS["users_url"], $info["get"]) : $GLOBALS["users_url"]
					)
				);

				$dash["profiles"] = array();
				foreach ($profiles_lists as $k => $v) {
					$dash["profiles"][$k] = array("name" => $v, "total" => $p[$k]);
				}

				$dash["users"] = array_column($users->con->results($users->con->select(" count( idx ) as q , enabled ", " users ", " where " . implode(" and ", $filter) . " group by enabled ")), "q", "enabled");
				$dash["users"]["total"] = array_sum($dash["users"]);

				$total = $users->con->result($users->con->select(" ifnull( count( idx ) , 0 ) as s ", " users ", " where " . implode(" and ", $filter)), "s", 0);

				$t = array();
				foreach (array("yes", "no") as $k) {
					$t[$k] = 0;
				}

				foreach (array_column($users->con->results($users->con->select(" count( idx ) as q , enabled ", " users ", " where " . implode(" and ", $filter))), "q", "enabled") as $k => $v) {
					$t[$k] = (int)$v;
				}

				$form = array(
					"done" => isset($info["get"]["done"]) ? $info["get"]["done"] : set_url($GLOBALS["users_url"], $info["get"]), "pattern" => array(
						"new" => $GLOBALS["newuser_url"],
						"action" => $GLOBALS["user_url"],
						"search" => !empty($info["get"]) ? set_url($GLOBALS["users_url"], $info["get"]) : $GLOBALS["users_url"]
					)
				);

				include(constant("cRootServer") . "ui/common/header.inc.php");
				include(constant("cRootServer") . "ui/common/head.inc.php");
				include(constant("cRootServer") . "ui/page/users/users.php");
				include(constant("cRootServer") . "ui/common/footer.inc.php");
				print('<script>' . "\n");
				print('    data_users_json = {' . "\n");
				print('        url: "' . $GLOBALS["users_url"] . '.json"' . "\n");
				print('        , url_edit: "' . $GLOBALS["user_url"] . '"' . "\n");
				print('        , out_data: ' . json_encode(array("total" => array("total" => $total))) . "\n");
				print('        , template: ""' . "\n");
				print('        , page: ' . (isset($info["sr"]) && (int)$info["sr"] > 1 ? $info["sr"] : 1) . "\n");
				print('    }' . "\n");
				include(constant("cRootServer") . "furniture/js/add/users.js");
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
			$users = new users_model();
			$users->set_filter(array(" idx = '" . $info["idx"] . "' "));
			$users->load_data();
			$users->attach(array("profiles", "tokens"));
			$data = current($users->data);

			$form = array(
				"title" => "Cadastrar Usuário",
				"url" => sprintf($GLOBALS["newuser_url"], $info["idx"])
			);
		} else {
			$data = array(
				"avatar" => constant("cFrontend_USER") . "favicon.jpg", "created_at" => date("Y-m-d H:i:s"), "userCreated_attach" => array(array("first_name" => $_SESSION[constant("cAppKey")]["credential"]["profiles_attach"][0]["name"] . " - " .  $_SESSION[constant("cAppKey")]["credential"]["first_name"]))
			);
			foreach (array("cpf", "mail ", "name ", "first_name ", "last_name", "login", "password", "external_id", "enabled") as $k) {
				$data[$k] = !isset($data[$k]) ? "" : $data[$k];
			}
			$form = array(
				"title" => "Editar Usuário",
				"url" => $GLOBALS["user_url"]
			);
		}


		if (isset($data["tokens_attach"][0])) {
			$data["tokens_name"] = $data["tokens_attach"][0]["name"];
			$data["tokens_id"] = $data["tokens_attach"][0]["idx"];
		} else {
			$data["tokens_name"] = md5(date("YmdHis") . $_SESSION[constant("cAppKey")]["credential"]["idx"]);
			$data["tokens_id"] = 0;
			if (isset($info["idx"]) && (int)$info["idx"] > 0) {
				$tokens = new tokens_model();
				$tokens->populate(array("name" => $data["tokens_name"]));
				$tokens->save();
				$data["tokens_id"] = $tokens->con->insert_id;
				$tokens->save_attach(array("idx" => $data["tokens_id"], "post" => array("users_id" => (int)$info["idx"])), array("users"), true);
			}
		}

		$data["tk_pwd"] = sprintf($GLOBALS["tkpwd_url"], $data["tokens_name"]);

		$profiles_lists = profiles_controller::data4select("idx", array(" idx in (3, 4, 5, 6) "), "name");

		$pages = 'Usuários';
		$page = 'Usuário';

		include(constant("cRootServer") . "ui/common/header.inc.php");
		include(constant("cRootServer") . "ui/common/head.inc.php");
		include(constant("cRootServer") . "ui/page/users/user.php");
		include(constant("cRootServer") . "ui/common/footer.inc.php");
		print("<script>");
		print('$("button[name=\'btn_back\']").bind("click", function(){');
		print(' document.location = "' . (isset($info["get"]["done"]) ? $info["get"]["done"] : $GLOBALS["users_url"]) . '" ');
		print('})' . "\n");
		include(constant("cRootServer") . "furniture/js/users/user.js");
		print("</script>");
		include(constant("cRootServer") . "ui/common/foot.inc.php");
	}

	public function save($info)
	{
		if (!site_controller::check_login()) {
			basic_redir($GLOBALS["home_url"]);
		}

		// if ((int)$info["post"]["tokens_id"] == 0) {
		// 	$tokens = new tokens_model();
		// 	$tokens->populate(array("name" => $info["post"]["tokens_name"]));
		// 	$tokens->save();
		// 	$info["post"]["tokens_id"] = $tokens->con->insert_id;
		// }

		$users = new users_model();

		$info["post"]["cpf"] = preg_replace("/[^0-9]+?/", "", $info["post"]["cpf"]);
		$info["post"]["postalcode"] = preg_replace("/[^0-9]+?/", "", $info["post"]["postalcode"]);

		if (isset($info["post"]["password"])) {
			$info["post"]["password"] = md5($info["post"]["password"]);
		}

		if (isset($info["idx"]) && (int)$info["idx"] > 0) {
			$users->set_filter(array(" idx = '" . $info["idx"] . "' "));
		}

		$users->populate($info["post"]);
		$users->save();
		if (!isset($info["idx"]) || (int)$info["idx"] == 0) {
			$info["idx"] = $users->con->insert_id;
		}

		$users->save_attach($info, array("profiles", "tokens", "companies"));

		if (isset($info["post"]["done"]) && !empty($info["post"]["done"])) {
			basic_redir($info["post"]["done"]);
		} else {
			basic_redir($GLOBALS["users_url"]);
		}
	}
}
