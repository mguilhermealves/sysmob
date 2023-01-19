<?php
class pretenants_status_controller
{
	public static function data4select($key = "idx", $filters = array(" active = 'yes' "), $field = "")
	{
		$pretenants_status = new pretenants_status_model();
		$pretenants_status->set_field(array($key, $field));
		$pretenants_status->set_order(array(" idx desc "));
		$pretenants_status->set_filter($filters);
		$pretenants_status->load_data();
		$out = array();
		foreach ($pretenants_status->data as $value) {
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
		//
	}

	public function remove($info)
	{
		//
	}
}
