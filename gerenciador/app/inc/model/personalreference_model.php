<?php 
class personalreference_model extends DOLModel{
	protected $field = array( " idx " , " created_at " , " created_by " , " modified_at " , "modified_by " , " full_name " , " celphone " , " type_relation ") ;
	protected $filter = array( " active = 'yes' " ) ;
	function __construct( $bd = false  ) {
		return parent::__construct( "personalreference" , $bd );
	}
} 
?>