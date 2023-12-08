<?php
class order extends CI_Controller {
	var $rows;
	function __construct()
		{
			parent::__construct();
			$this->rows=array();
			$this->load->library('session');
			$this->load->database();
			$this->load->model("bill_model");			
			$this->load->helper("url");
			
		}

	public function index()
	{
		
		$data['rows']=$this->bill_model->showbill();
		
		$this->load->view('order',$data);
		
	}
	
	

}

?>