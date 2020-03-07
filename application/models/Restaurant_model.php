<?php


class Restaurant_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function getRestaurantNumber()
    {
        $result = $this->db->get('anas_restaurant');
        return $result->num_rows();
    }

    public function getRestaurantsInfo()
    {
        $query = $this->db->select('*')
                    ->from('anas_restaurant')                    
                    ->get();
        if ($query->num_rows()>0) {
            return $query->result_array();
        }
        else
            return false;
    }

    public function getRestaurant($id=0)
    {
        $this->db->select('*');
        $this->db->from('anas_restaurant');

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
        
        $items = $this->db->select('id')
                ->where('restaurantid', $id)               
                ->get('anas_food')->result_array(); 
        

        foreach ($items as $item) {            
            $foodid=$item['id'];
            // print_r($foodid);
            $this->db->where('foodid', $foodid);
            $this->db->delete('anas_coupon');

            $this->db->where('foodid', $foodid);
            $this->db->delete('anas_favorite');

            $this->db->where('foodid', $foodid);
            $this->db->delete('anas_coupon_history');
        }

        $this->db->where('restaurantid', $id);
        $this->db->delete('anas_food');

        $this->db->where('id', $id);
        $this->db->delete('anas_restaurant');

        if ($this->db->affected_rows())
            return "success";
        else
            return "fail";
    }

    public function insert($post)
    {    
        $resname=$post['name']; 
        $resmobile=$post['mobile'];
        $resaddress=$post['address'];
        $resposition=$post['position'];
        $resstarttime=$post['starttime'];      
        $resendtime=$post['endtime'];
        $respincode=$post['pincode'];
        $resdescription=$post['description']; 
       
        $reslogo = $post['reslogo'];
        $resimage = $post['resimage'];

        $res_logo = "image/restaurantlogo/".$resmobile.".jpg";
        $res_image = "image/restaurant/".$resmobile.".jpg";
        


        $this->db->select('*');
        $this->db->from('anas_restaurant');
        $this->db->where('phone', $resmobile);
        $query = $this->db->get();

        if ($query->num_rows()>0)
        {
            return "already";
        }

        $data = array(
            'name' => $resname,
            'pin' => $respincode,
            'image' => $res_image,
            'logo' => $res_logo,
            'address' => $resaddress,
            'position' => $resposition,
            'phone' => $resmobile,
            'opentime' => $resstarttime."~".$resendtime,
            'description' =>$resdescription       
        );

        $this->db->insert('anas_restaurant', $data);

        if ($this->db->affected_rows())
            return "ok";
        else
            return "fail";
    }

    public function update($id, $post)
    {
        $resname=$post['name']; 
        $resmobile=$post['mobile'];
        $resaddress=$post['address'];
        $resposition=$post['position'];
        $resopentime=$post['opentime'];      
        $respincode=$post['pincode'];
        $resdescription=$post['description']; 
        $res_logo = "image/restaurantlogo/".$resmobile.".jpg";
        $res_image = "image/restaurant/".$resmobile.".jpg";

        $data = array(
            'name' => $resname,
            'pin' => $respincode,
            'image' => $res_image,
            'logo' => $res_logo,            
            'address' => $resaddress,
            'position' => $resposition,            
            'opentime' => $resopentime,
            'description' =>$resdescription       
        );
        // return $data;
        $this->db->where('id', $id);
        $this->db->update('anas_restaurant', $data);
        if ($this->db->affected_rows())
            return "ok";
        else
            return "fail";        
    }

   

}
