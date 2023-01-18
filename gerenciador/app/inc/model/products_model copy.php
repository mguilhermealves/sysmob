<?php 
class products_model extends DOLModel{
	protected $field = array( " idx " , " created_at " , " created_by " , " modified_at " , "modified_by " , " title " , " slug " , " sub_title " , " images " , " value ", " description " ) ;
	protected $filter = array( " active = 'yes' " ) ;
	function __construct( $bd = false  ) {
		return parent::__construct( "products" , $bd );
	}
} 
?>