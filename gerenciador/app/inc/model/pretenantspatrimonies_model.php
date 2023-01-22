<?php 
class pretenantspatrimonies_model extends DOLModel{
	protected $field = array( " idx " , " created_at " , " created_by " , " modified_at " , "modified_by ", " type_patrimony ", " tipo_imovel " , " city_imovel ", " uf_imovel ", " tipo_auto ", " modelo_auto " , " ano_auto ", " onus ") ;
	protected $filter = array( " active = 'yes' " ) ;
	function __construct( $bd = false  ) {
		return parent::__construct( "pretenantspatrimonies" , $bd );
	}
} 
?>