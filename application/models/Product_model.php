<?php


class Product_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    public function getTotalProductNumber()
    {        
        $result = $this->db->get('product');
        return $result->num_rows();
    }

    public function getCurrentProductNumber()
    {
        $temp=new dateTime();
        $curtime=$temp->format('Y/m/d H:i:s');

        $this->db->select('*')
            ->from('product')
            ->where('endtime >',$curtime);
        $result = $this->db->get();

        return $result->num_rows();
    }

    public function getProductsInfo()
    {       
        $this->db->select('p.*, c.name AS cat_name')
            ->from('product as p')
            ->join('category as c', 'p.catid=c.id')
            ->order_by('p.id','DESC');
        $query = $this->db->get();

        if ($query->num_rows()>0) {
            return $query->result_array();
        }
        else
            return false;
        
    }

    public function getCurrentAuctions()
    {
        $temp=new dateTime();
        $curtime=$temp->format('Y/m/d H:i:s');

        $this->db->select('p.*, c.name AS cat_name')
            ->from('product as p')
            ->join('category as c', 'p.catid=c.id')
            ->where('endtime >',$curtime)
            ->order_by('p.id','DESC');
        $query = $this->db->get();

        if ($query->num_rows()>0) {
            return $query->result_array();
        }
        else
            return false;

    }

    public function getProduct($id=0)
    {
        $this->db->select('*');
        $this->db->from('product');

        if ($id!=0)
            $this->db->where('id', $id);

        $query = $this->db->get();

        if ($query->num_rows()>0) {
            return $query->row_array();
        }
        else
            return false;
    }

    public function getBids($id=0){
        $this->db->select('*')
            ->from('auction_bid_history')
            ->where('productid',$id)
            ->order_by('id','DESC');

        $query = $this->db->get();

        if ($query->num_rows()>0) {
            return $query->result_array();
        }
        else
            return false;
    }

    public function getSeller($id=0){
        $this->db->select('u.*')
            ->from('user as u')
            ->join('product as p', 'p.seller=u.username')
            ->where('p.id',$id);

        $query = $this->db->get();

        if ($query->num_rows()>0) {
            return $query->row_array();
        }
        else
            return false;
    }

    public function delete($id)
    {
        //history delete

        $this->db->where('id', $id);
        $this->db->delete('product');

        if ($this->db->affected_rows())
            return "success";
        else
            return "fail";
    }

    public function delete_history($id)
    {
        //history delete

        $this->db->where('id', $id);
        $this->db->delete('auction_bid_history');

        if ($this->db->affected_rows())
            return "success";
        else
            return "fail";
    }

/*
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
*/

/*
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
    }*/
}
