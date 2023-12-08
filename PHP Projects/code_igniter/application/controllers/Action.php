<?php
class Action extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
			//include a model file to work with database
			$this->load->model("action_model");
			$this->load->helper("form");
			//to load multiple helpers--
			//$this->load->helper(array("form","url"));
	}
	public function actions()
	{
		echo "<pre>";
		//If you would like to capture the output of print_r(), use the return parameter.
		//When this parameter is set to TRUE, print_r() will return the information 
		//rather than print it.
		print_r($this->action_model->sel());//When the return parameter is TRUE, this function will return a string.
	}
	public function updates()
	{
		if($this->action_model->bel())
		{
			echo "<h1>updated</h1>";
		}
	}	

}
?>
$this->session->set_userdata("name","phone_no");//key name and value
<   get_session=$this->session->all_userdata();all userdata holds the session values..
$this->has_userdata("email")//this checks if the "email" data key in bracket is present in session variables or not..
$this->session->unset_userdata("email");//will destroy the "email" session...


<!--
 StdClass is as an alternative to associative array.
 -->