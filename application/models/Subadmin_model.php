<?php


class Subadmin_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
   
    public function getFoodNumber()
    {        
        $result = $this->db->get('anas_food');
        return $result->num_rows();
    }

    public function getAdminInfo()
    {       
        $this->db->select('*')
            ->from('anas_admin')            
            ->where('role', 'user');
        $query = $this->db->get();

        if ($query->num_rows()>0) {
            return $query->result_array();
        }
        else
            return false;
        
    }

    public function select($id)
    {        
        $data = array(
            'allow_status' => "1"
        );

        $this->db->where('id', $id);
        $this->db->update('anas_admin', $data);
        return "success";
    }
    public function unselect($id)
    {        
        $data = array(
            'allow_status' => "0"
        );
        $this->db->where('id', $id);
        $this->db->update('anas_admin', $data);
        return "success";
    }
}
