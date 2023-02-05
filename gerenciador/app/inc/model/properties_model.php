<?php
class properties_model extends DOLModel
{
	protected $field = array(" idx ", " created_at ", " created_by ", " modified_at ", "modified_by ", " removed_at ", " removed_by ", "cep", " endereco ", " numero ", " complemento ", " bairro ", " cidade ", " estado ");
	protected $filter = array(" active = 'yes' ");
	function __construct($bd = false)
	{
		return parent::__construct("properties", $bd);
	}
}
