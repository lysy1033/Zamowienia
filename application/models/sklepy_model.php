<?php

class Sklepy_model extends CI_Model 
{

    function __construct() 
    {
        parent::__construct();
    }

    public function pobierz_sklepy() 
    {
        $r = $this->db->get('sklepy');
        $r = $r->result();
        if ($r) 
        {
            return $r;
        }
        else 
        {
            return false;
        }
    }

}