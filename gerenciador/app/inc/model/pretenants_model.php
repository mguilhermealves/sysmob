<?php 
class pretenants_model extends DOLModel{
	protected $field = array( " idx " , " created_at " , " created_by " , " modified_at " , "modified_by " , " first_name " , " last_name " , " cpf_cnpj " , " rg " , " nacionality " , " genre " , " civil_status " , " mail ", " phone " , " celphone " , " postalcode " , " address " , " number ", " complement " , " district ", " city " , " uf " , " accept_at " ) ;
	protected $filter = array( " active = 'yes' " ) ;
	function __construct( $bd = false  ) {
		return parent::__construct( "pretenants" , $bd );
	}
} 
?>