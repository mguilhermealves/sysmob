<?php
class commonobjectives_controller
{
	public static function data4select($key = "idx", $filters = array(" active = 'yes' "), $field = "name")
	{
		$commonobjectives = new commonobjectives_model();
		$commonobjectives->set_field(array($key, $field));
		$commonobjectives->set_order(array(" name asc "));
		$commonobjectives->set_filter($filters);
		$commonobjectives->load_data();
		$out = array();
		foreach ($commonobjectives->data as $value) {
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
