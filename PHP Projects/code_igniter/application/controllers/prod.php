<?php

//this is the controller or link between "MODEL" AND "VIEW"
	class prod extends CI_Controller
	{
		var $rows;
		var $row;
		var $uid,$pass;
		//var $d;
		function __construct()
		{
			parent::__construct();
			$this->rows=array();
			//$this->d=array();
			//$this->load->helper('html');
			//$this->load->helper('url');
			$this->load->helper(array("form","url","html"));//another way for declaring helper
			$this->load->database();//here we are loading the database library,and then we will include the function in model
			$this->load->model("product_model");//this are used to load the "product_model" from "MODEL" in this page,in short,creates a link between model and controller...
			$this->load->library('session');
			$this->uid=$this->session->userdata('u_name');
			$this->pass=$this->session->userdata('u_pass');
			
		}		
		
		function index()
		{	
			
			$this->rows['productrows']=$this->product_model->list_products();//here from product model
			$this->load->view("listprod",$this->rows);//this is the function where the ACTION is set to "listprod" with the values fetched in "this->rows" from the function "list_products()" in "product_model"
			if(empty($this->rows))
			{
			redirect(base_url()."prod/add");//if this rows doesnot fetch any value,again redirect them to this same page..
				
			}		
			
		}
		
		function add()
		{
			//adding new product
			$this->load->view('addprod');
			if($this->input->post("ADD"))
			{
				$this->product_model->add_product();
				redirect(base_url()."prod/index");
			}
				
		}
		
		function delete($id)
		{
			
				$this->product_model->deleteproduct($id);//this line calls the object "product_model.php" in "model",and calls the deleteproduct function with the given id,to be deleted,and send to "product_model.php to run the query statements of database
				redirect(base_url()."prod/index");			
					
		}
		function update($id)
		{ //this is the update button in 
			
				$this->row['productrow']=$this->product_model->getproduct($id);//this also fetches getproduct function from product model and store the values in new array..
				
				$this->load->view('edit',$this->row);//here we are sending the value
							
		}		
		
		function edit($id)
		{
		//here we are updating the values in the form and initialising new values instead of the old ones
			if($this->input->post("UPDATE"))
				{
				$data=array(
				'pname'=>$this->input->post('pname'),
				'pdes'=>$this->input->post('pdes'),
				'pcost'=>$this->input->post('pcost')
				);
				
				$this->product_model->updateproduct($id,$data);	
				redirect(base_url()."prod/");			
				}	
		
		}
		

		function user_product()
		{
			if((!empty($this->uid)) && (!empty($this->pass)))
			{
				$this->rows['productrows']=$this->product_model->list_products();
				if(!empty($this->rows['productrows']))
				{
					$this->load->view("user_product_list",$this->rows);
				}
				else
				redirect(base_url());
			}
		
		} 
	}
?>