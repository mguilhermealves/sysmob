<?php 
class additionalproperties_model extends DOLModel{
	protected $field = array( " idx " , " created_at " , " created_by " , " modified_at " , "modified_by " , " removed_at " , " removed_by " , " objetivo ", " tipo_imovel ", " finalidade ", " area_util ", " area_total ", " qtd_dormitorios ", " qtd_suites ", " qtd_sala_estar ", " qtd_sala_jantar ", " qtd_copa ", " qtd_cozinha ", " qtd_banheiro ", " qtd_copa ", " estado_imovel ", " vlr_aluguel ", " vlr_iptu ", " vlr_condominio ", " descritivo_imovel ") ;
	protected $filter = array( " active = 'yes' " ) ;
	function __construct( $bd = false  ) {
		return parent::__construct( "additionalproperties" , $bd );
	}
} 
?>