<?php
class commontypeproperties_controller
{
	public static function data4select($key = "idx", $filters = array(" active = 'yes' "), $field = "name")
	{
		$commontypeproperties = new commontypeproperties_model();
		$commontypeproperties->set_field(array($key, $field));
		$commontypeproperties->set_order(array(" name asc "));
		$commontypeproperties->set_filter($filters);
		$commontypeproperties->load_data();
		$out = array();
		foreach ($commontypeproperties->data as $value) {
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
