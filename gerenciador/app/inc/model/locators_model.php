<?php

class locators_model extends DOLModel
{
    protected $field = array("idx", "nome", "sobrenome", "cpf", "rg", "nacionalidade", "genero", "estado_civil", "mail", "telefone", "celular");
    protected $filter = array("active = 'yes' ");
    function __construct($bd = false)
    {
        parent::__construct("locators", $bd);
    }
}
