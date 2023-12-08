<?php
class User extends CI_Controller {
	var $rows;
	function __construct()
	{
			parent::__construct();
			$this->rows=array();
			$this->load->library('session');
			$this->load->database();
			$this->load->model("user_model");		
			//$this->load->model("bill_model");						
			$this->load->helper("url");
			$this->load->helper('html');
			$this->load->helper('form');
	
			
	}

	public function index()
	{
		
		//$tx=null;
		$this->load->view('login');
		/*session_start();
		if(isset($_SESSION['result']))
		{
			$this->session->unset_userdata('u_name');
			$this->session->unset_userdata('u_pass');
		}	*/
	}
	function add()
		{
			
			$this->load->view('adduser');
			if($this->input->post("ADD"))
			{
				$this->user_model->add_product();
				redirect(base_url()."user/index");
			}
		}

	public function check()
	{
		
				
		$this->rows=$this->user_model->user_check();
		
		
		if(!empty($this->rows))
		{
			$uid=$this->rows[0]['uid'];//meaning??
			$pass=$this->rows[0]['pass'];
			$usertype=$this->rows[0]['usertype'];
		
			$this->session->set_userdata('u_name',$uid);//use of this line??
			$this->session->set_userdata('u_pass',$pass);
			if($usertype=='admin')
				redirect(base_url().'prod/');
			else
				redirect(base_url().'prod/user_product/');
			
		}
		else
			redirect(base_url());
	
	}
	
	public function logout()
	{
		
		$this->session->unset_userdata('u_name');
		$this->session->unset_userdata('u_pass');
		$this->session->sess_destroy();
		$result="logout";
		redirect(base_url());
		
	}
	
	

}

?>