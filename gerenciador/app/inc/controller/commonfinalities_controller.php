<?php
class commonfinalities_controller
{
	public static function data4select($key = "idx", $filters = array(" active = 'yes' "), $field = "name")
	{
		$commonfinalities = new commonfinalities_model();
		$commonfinalities->set_field(array($key, $field));
		$commonfinalities->set_order(array(" name asc "));
		$commonfinalities->set_filter($filters);
		$commonfinalities->load_data();
		$out = array();
		foreach ($commonfinalities->data as $value) {
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
