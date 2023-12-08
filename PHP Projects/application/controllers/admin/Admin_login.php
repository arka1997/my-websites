<?php

if(!defined('BASEPATH')) EXIT('No direct script access allowed');

class Admin_login extends My_Controller 
{
	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}

	function index()
	{
		$this->admin_session_checked($is_active_session = 0);
		 // echo "hii";exit;
		$this->load->view('admin/login');		
	}

	function login()
	{
	    $this->form_validation->set_rules('email', 'Email', 'required');
	    $this->form_validation->set_rules('password', 'Password', 'required');
	    if ($this->form_validation->run() === TRUE){
		$data = $this->input->post();
		$login_response = $this->Login_model->login($data);
		 
		if($login_response)
		{
			$this->set_admin_session($login_response);
			redirect('admin/dashboard');
		}
		else
		{
			redirect('admin/admin_login/');
		}
	}
	else
  {
    common_viewloader('admin/admin_login/','','');
    // redirect('admin/destinations/add_destination');
  }
	}

	function logout()
	{
        $this->destroy_admin_session();
        redirect('admin/admin_login/');
    }
}
?>