<?php
class pretenantspatrimonies_controller
{
	public static function data4select($key = "idx", $filters = array(" active = 'yes' "), $field = "")
	{
		$pretenantspatrimonies = new pretenantspatrimonies_model();
		$pretenantspatrimonies->set_field(array($key, $field));
		$pretenantspatrimonies->set_order(array(" idx desc "));
		$pretenantspatrimonies->set_filter($filters);
		$pretenantspatrimonies->load_data();
		$out = array();
		foreach ($pretenantspatrimonies->data as $value) {
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

		$pretenantspatrimony = new pretenantspatrimonies_model();

		if (isset($info["post"]["idx"]) && (int)$info["post"]["idx"] > 0) {
			$info["idx"] = $info["post"]["idx"];
			$pretenantspatrimony->set_filter(array(" idx = '" . $info["idx"] . "' "));
		}

		$pretenantspatrimony->populate($info["post"]);
		$pretenantspatrimony->save();

		if (!isset($info["idx"]) || (int)$info["idx"] == 0) {
			$info["idx"] = $pretenantspatrimony->con->insert_id;
		}

		$pretenantspatrimony->save_attach($info, array("pretenants"), true);

		$html = '<tr id="row_' . $info["idx"] . '">';
		$html .= '<td>' . $info["idx"] . '</td>';
		$html .= '<td>' . $info["post"]["type_patrimony"] . '</td>';
		$html .= '<td><button type="button" class="btn btn-danger btn-remover-list" data-id="' . $info["idx"] . '" data-model="pretenantspatrimonies" onclick="remover_list(this)"><i class="bi bi-trash"></i></button></td>';
		$html .= '</tr>';

		$response = array(
			"idx" => $info["idx"],
			"html" => $html,
		);

		print(json_encode($response));
	}

	public function remove($info)
	{
		//
	}
}
