<?php 

class locator_model extends DOLModel
{
    protected $field = array ("idx", "nome_completo", "cpf", "rg", "nacionalidade", "genero", "estado_civil", "mail", "telefone", "celular");
    protected $filter = array("active = 'yes' ");
    function __construct($bd = false)
    {
        parent::__construct("locator", $bd);
    }
}