<?php

class locators_model extends DOLModel
{
    protected $field = array(" idx ", " created_at ", " created_by ", " modified_at ", "modified_by ", "nome", "sobrenome", "cpf", "rg", "nacionalidade", "genero", "estado_civil", "mail", "telefone", "celular");
    protected $filter = array("active = 'yes' ");
    function __construct($bd = false)
    {
        parent::__construct("locators", $bd);
    }
}
