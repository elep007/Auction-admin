<?php


class Admob_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function getAdmob()
    {
        $query = $this->db->select('*')
                    ->from('anas_admob')                    
                    ->get();
        if ($query->num_rows()>0) {
            return $query->result_array();
        }
        else
            return false;
    }  
}
