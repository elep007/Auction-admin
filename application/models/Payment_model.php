<?php


class Payment_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function getTransaction()
    {       
        $this->db->select('*')
            ->from('auction_transaction')
            ->order_by('id', 'DESC');
        $query = $this->db->get();

        if ($query->num_rows()>0) {
            return $query->result_array();
        }
        else
            return false;
        
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('auction_transaction');

        if ($this->db->affected_rows())
            return "success";
        else
            return "fail";
    }
}
