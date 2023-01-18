<?php 
class prespouses_model extends DOLModel{
	protected $field = array( " idx " , " created_at " , " created_by " , " modified_at " , "modified_by " , " first_name " , " last_name " , " cpf " , " rg ", " nacionality ", " celphone ", " is_show_financer ") ;
	protected $filter = array( " active = 'yes' " ) ;
	function __construct( $bd = false  ) {
		return parent::__construct( "prespouses" , $bd );
	}
} 
?>