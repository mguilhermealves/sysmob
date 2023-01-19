<?php 
class pretenants_status_model extends DOLModel{
	protected $field = array( " idx " , " created_at " , " created_by " , " modified_at " , "modified_by " , " name " , " description " , " position ") ;
	protected $filter = array( " active = 'yes' " ) ;
	function __construct( $bd = false  ) {
		return parent::__construct( "pretenants_status" , $bd );
	}
} 
?>