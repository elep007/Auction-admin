<?php


class Food_model extends CI_Model
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

    public function getFoodsInfo()
    {       
        $this->db->select('f.*, r.name AS resname')
            ->from('anas_food as f')            
            ->join('anas_restaurant as r', 'f.restaurantid=r.id');
        $query = $this->db->get();

        if ($query->num_rows()>0) {
            return $query->result_array();
        }
        else
            return false;
        
    }

    public function getGroup()
    {
        $this->db->select('*');
        $this->db->order_by('id', 'ASC');
        $result = $this->db->get('anas_restaurant');
        if ($result->num_rows()>0)
            return $result->result_array();
        else
            return false;
    }


    public function getFood($id=0)
    {
        $this->db->select('*');
        $this->db->from('anas_food');        

        if ($id!=0)
            $this->db->where('id', $id);

        $query = $this->db->get();

        if ($query->num_rows()>0) {
            return $query->row_array();
        }
        else
            return false;
    }

    public function delete($id)
    {
        $this->db->where('foodid', $id);
        $this->db->delete('anas_coupon');

        $this->db->where('foodid', $id);
        $this->db->delete('anas_coupon_history');

        $this->db->where('foodid', $id);
        $this->db->delete('anas_favorite');  

        $this->db->where('id', $id);
        $this->db->delete('anas_food');

        if ($this->db->affected_rows())
            return "success";
        else
            return "fail";
    }

     public function insert($post)
    {
        
        $foodname=trim($post['name']);
        $resid=$post['resid'];
        $description=$post['description'];
        $ndescription=$post['ndescription'];
        
        $foodimg = "image/food/".$resid.$foodname.".jpg";   

        $this->db->select('*');
        $this->db->from('anas_food');
        $this->db->where('name', $foodname)->where('restaurantid', $resid);
        $query = $this->db->get();

        if ($query->num_rows()>0)
        {
            return "already";
        }

        $data = array(
            'name' => $foodname,
            'restaurantid' => $resid,
            'description' => $description,
            'needdescription' => $ndescription,
            'image' => $foodimg     
        );

        $this->db->insert('anas_food', $data);

        if ($this->db->affected_rows())
            return "ok";
        else
            return "fail";
    }

    public function update($id, $post)
    {               
        $foodname=trim($post['name']);
        $resid=$post['resid'];
        $description=$post['description'];
        $ndescription=$post['ndescription'];
        $foodimg = "image/food/".$resid.$foodname.".jpg";
        $data = array(
            'name' => $foodname,
            'restaurantid' => $resid,
            'description' => $description,
            'needdescription' => $ndescription,
            'image' => $foodimg     
        );

        $this->db->where('id', $id);
        $this->db->update('anas_food', $data);

        return "ok";
    }
}
