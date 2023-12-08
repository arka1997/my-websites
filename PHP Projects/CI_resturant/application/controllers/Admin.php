<?php
class Admin extends CI_Controller{
    function __construct() 
	{
        parent::__construct();
        
    } 
    function index(){
        $session = $this->session->has_userdata('id');
        if($session){
            redirect('Resturant/index');
        }
        else{
            $this->load->view('login');
        }
        
    }

    function login(){
        $data = $this->input->post();
        $this->load->model('login_model');
        $val = $this->login_model->fetch_adminData($data);
        //echo $val->email;exit;
        //echo "<pre>";print_r($val);exit;
        if($val)
        {
            $this -> session -> set_userdata('id',$val->id);//this is how array object is taken input
            $this -> session -> set_userdata('password',$val->password);
            $this -> session -> set_userdata('email',$val->email);
            redirect('Resturant/index');

        }
    }
    function logout(){
        $this->session->sess_destroy();
        redirect('admin/index');
    }
}
?>