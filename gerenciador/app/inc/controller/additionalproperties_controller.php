<?php
class additionalproperties_controller
{
	public static function data4select($key = "idx", $filters = array(" active = 'yes' "), $field = "name")
	{
		$boiler = new additionalproperties_model();
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
		//
	}

	public function display($info)
	{
		//
	}

	public function form($info)
	{
		//
	}

	public function save($info)
	{
		if (!site_controller::check_login()) {
			basic_redir($GLOBALS["home_url"]);
		}

		$info["post"] = current($info["post"]);

		$additionalproperty = new additionalproperties_model();

		if (isset($info["idx"]) && (int)$info["idx"] > 0) {
			$info["idx"] = $info["post"]["idx"];
			$additionalproperty->set_filter(array(" idx = '" . $info["idx"] . "' "));

			$info["post"]["modified_at"] = date("Y-m-d H:i:s");
		}

		$additionalproperty->populate($info["post"]);
		$additionalproperty->save();

		if (!isset($info["idx"]) || (int)$info["idx"] == 0) {
			$info["idx"] = $additionalproperty->con->insert_id;
		}

		$additionalproperty->save_attach($info, array("properties"));

		$html = '<tr id="row_' . $info["idx"] . '">';
		$html .= '<td>' . $info["idx"] . '</td>';
		$html .= '<td>' . $info["post"]["tipo_imovel"] . '</td>';
		$html .= '<td>' . $info["post"]["objetivo"] . '</td>';
		$html .= '<td>' . $info["post"]["finalidade"] . '</td>';
		$html .= '<td>' . '<button type="button" class="btn btn-danger btn-remover-list" data-id="' . $info["idx"] . '" data-model="additionalproperties" onclick="remover_list(this)"><i class="bi bi-trash"></i></button>' . '</td>';
		$html .= '</tr>';

		$response = array(
			"idx" => $info["idx"],
			"html" => $html,
		);

		print(json_encode($response));
	}
}
