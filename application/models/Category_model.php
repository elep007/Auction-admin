<?php


class Category_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function getCategoryNumber()
    {
        $result = $this->db->get('category');
        return $result->num_rows();
    }

    public function getCategoriesInfo()
    {
        $query = $this->db->select('*')
                    ->from('category')
                    ->order_by('id','DESC')
                    ->get();
        if ($query->num_rows()>0) {
            return $query->result_array();
        }
        else
            return false;
    }

    public function getCategory($id=0)
    {
        $this->db->select('*');
        $this->db->from('category');

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
        $this->db->where('catid', $id);
        $this->db->delete('product');

        $this->db->where('id', $id);
        $this->db->delete('category');

        if ($this->db->affected_rows())
            return "success";
        else
            return "fail";
    }

    public function insert($post)
    {    
        $catname=$post['name'];
        $categoryimage ="image/category/".$catname.time().".jpg";

        $resifp = fopen('backend/' . $categoryimage, 'wb' );
        $resdata = explode( ',', $post['catimage'] );
        fwrite( $resifp, base64_decode( $resdata[ 1 ] ) );
        fclose( $resifp );

        $this->db->select('*');
        $this->db->from('category');
        $this->db->where('name', $catname);
        $query = $this->db->get();

        if ($query->num_rows()>0)
        {
            return "already";
        }

        $data = array(
            'name' => $catname,
            'image' => $categoryimage
        );

        $this->db->insert('category', $data);

        if ($this->db->affected_rows())
            return "ok";
        else
            return "fail";
    }

    public function update($post)
    {
        $id=$post['id'];
        $catname=$post['name'];

        $data = array(
            'name' => $catname
        );

        if($post['catimage']!='') {
            $catimage = "image/category/" . $catname . time() . ".jpg";

            $resifp = fopen('backend/'.$catimage, 'wb');
            $resdata = explode(',', $post['catimage']);
            fwrite($resifp, base64_decode($resdata[1]));
            fclose($resifp);

            $data = array(
                'name' => $catname,
                'image' => $catimage
            );
        }
        // return $data;
        $this->db->where('id', $id);
        $this->db->update('category', $data);
        if ($this->db->affected_rows())
            return "ok";
        else
            return "fail";        
    }

   

}
