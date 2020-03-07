<?php


class Admob_con extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->model('Admob_model');
        $this->load->helper('url');
    }

    function switchLang($language = "") {
        $language = ($language != "") ? $language : "english";
        $this->session->set_userdata('site_lang', $language);
        redirect(base_url());
    }   

    public function update(){ 
       if($_POST['is_admob1'] ==1){
            $admob1filename ="backend/image/admob/admob1.jpg";       
            $admob1ifp = fopen( $admob1filename, 'wb' );      
            $admob1data = explode( ',', $_POST['admob1'] );        
            fwrite( $admob1ifp, base64_decode( $admob1data[ 1 ] ) );        
            fclose( $admob1ifp );
        }
        if($_POST['is_admob2'] ==1){
            $admob1filename ="backend/image/admob/admob2.jpg";       
            $admob1ifp = fopen( $admob1filename, 'wb' );      
            $admob1data = explode( ',', $_POST['admob2'] );        
            fwrite( $admob1ifp, base64_decode( $admob1data[ 1 ] ) );        
            fclose( $admob1ifp );
        }     
        if($_POST['is_admob3'] ==1){
            $admob1filename ="backend/image/admob/admob3.jpg";       
            $admob1ifp = fopen( $admob1filename, 'wb' );      
            $admob1data = explode( ',', $_POST['admob3'] );        
            fwrite( $admob1ifp, base64_decode( $admob1data[ 1 ] ) );        
            fclose( $admob1ifp );
        }     
        if($_POST['is_admob4'] ==1){
            $admob1filename ="backend/image/admob/admob4.jpg";       
            $admob1ifp = fopen( $admob1filename, 'wb' );      
            $admob1data = explode( ',', $_POST['admob4'] );        
            fwrite( $admob1ifp, base64_decode( $admob1data[ 1 ] ) );        
            fclose( $admob1ifp );
        }     
        if($_POST['is_admob5'] ==1){
            $admob1filename ="backend/image/admob/admob5.jpg";       
            $admob1ifp = fopen( $admob1filename, 'wb' );      
            $admob1data = explode( ',', $_POST['admob5'] );        
            fwrite( $admob1ifp, base64_decode( $admob1data[ 1 ] ) );        
            fclose( $admob1ifp );
        }     
        if($_POST['is_admob6'] ==1){
            $admob1filename ="backend/image/admob/admob6.jpg";       
            $admob1ifp = fopen( $admob1filename, 'wb' );      
            $admob1data = explode( ',', $_POST['admob6'] );        
            fwrite( $admob1ifp, base64_decode( $admob1data[ 1 ] ) );        
            fclose( $admob1ifp );
        }     
        if($_POST['is_admob7'] ==1){
            $admob1filename ="backend/image/admob/admob7.jpg";       
            $admob1ifp = fopen( $admob1filename, 'wb' );      
            $admob1data = explode( ',', $_POST['admob7'] );        
            fwrite( $admob1ifp, base64_decode( $admob1data[ 1 ] ) );        
            fclose( $admob1ifp );
        }     
        if($_POST['is_admob8'] ==1){
            $admob1filename ="backend/image/admob/admob8.jpg";       
            $admob1ifp = fopen( $admob1filename, 'wb' );      
            $admob1data = explode( ',', $_POST['admob8'] );        
            fwrite( $admob1ifp, base64_decode( $admob1data[ 1 ] ) );        
            fclose( $admob1ifp );
        }     
        if($_POST['is_admob9'] ==1){
            $admob1filename ="backend/image/admob/admob9.jpg";       
            $admob1ifp = fopen( $admob1filename, 'wb' );      
            $admob1data = explode( ',', $_POST['admob9'] );        
            fwrite( $admob1ifp, base64_decode( $admob1data[ 1 ] ) );        
            fclose( $admob1ifp );
        }     
        if($_POST['is_admob10'] ==1){
            $admob1filename ="image/admob/admob10.jpg";       
            $admob1ifp = fopen( $admob1filename, 'wb' );      
            $admob1data = explode( ',', $_POST['admob10'] );        
            fwrite( $admob1ifp, base64_decode( $admob1data[ 1 ] ) );        
            fclose( $admob1ifp );
        }     
        if($_POST['is_admob11'] ==1){
            $admob1filename ="backend/image/admob/admob11.jpg";       
            $admob1ifp = fopen( $admob1filename, 'wb' );      
            $admob1data = explode( ',', $_POST['admob11'] );        
            fwrite( $admob1ifp, base64_decode( $admob1data[ 1 ] ) );        
            fclose( $admob1ifp );
        }     
        if($_POST['is_admob12'] ==1){
            $admob1filename ="backend/image/admob/admob12.jpg";       
            $admob1ifp = fopen( $admob1filename, 'wb' );      
            $admob1data = explode( ',', $_POST['admob12'] );        
            fwrite( $admob1ifp, base64_decode( $admob1data[ 1 ] ) );        
            fclose( $admob1ifp );
        }     
        
        $result = "ok";
        // $data['postData'] = $_POST; 
              
 
        print_r($result);
    }

    public function all()
    {
        if (!$this->session->userdata('client_logged_in')) {
            redirect('login');
        }

        $user_name = $this->session->userdata('client_logged_in');
        $header_data['username'] = $user_name;
        $header_data['user_role'] = $this->User_model->getUserRole($user_name);
        $header_data['user_avatar'] = $this->User_model->getUserAvatar($user_name);

        $data["admobs"] = $this->Admob_model->getAdmob();
        $data["del_res"] = "NO";
        $this->load->view('user/common/header', $header_data);
        $this->load->view('admob/edit', $data);
        $this->load->view('user/common/footer');
    } 
}