<?php 

class pretenantsFinances_model extends DOLModel
{
    protected $field = array (" idx " , " created_at " , " created_by " , " modified_at ", " modified_by ", " removed_at ", " removed_by ", " active ", " typeofregime ", " company ", " wage ", " cepcompany ", " numbercompany ", " addresscompany ", " complementcompany ", " neighborhoodcompany ", " citycompany ", " ufcompany ", " phonecompany ", " emailcompany ", " profession ", " office ", " othersrents ", " origin ", " totalothersrents ", " othersrents_conjuge ", " origin_conjuge ", " totalothersrents_conjuge ", " aditionalinformations ", " admissioncompany ");
    protected $filter = array (" active = 'yes' ");
    function __construct($bd = false)
    {
        return parent::__construct("pretenantsFinances", $bd);
    }
}