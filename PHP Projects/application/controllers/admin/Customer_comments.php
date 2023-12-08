<?php

if (!defined('BASEPATH')) EXIT("No direct script access allowed");

class Customer_comments extends My_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->admin_session_checked($is_active_session = 1);
	}

	public function index()
	{ 
		$title = 'Customer Comments';
		// fetching banner images with status 1
		
		$data['comments'] = $this->Manage_customer_comments->show_data_id('customer_comments','','','get','');
		common_viewloader('admin/cms/customer_comments/customer_comments_listing_tbl', $data, $title);
	}
    function add_customer_comments(){
        $title = "Customer Comments";
		common_viewloader('admin/cms/customer_comments/add_customer_comments','', $title);
    }
    function insert_customer_comments(){
		$this->form_validation->set_rules('testimonial_details', 'Testimonial Details', 'required');
		$this->form_validation->set_rules('customer_name', 'Customer Name', 'required');
		$this->form_validation->set_rules('position', 'Position', 'required');
		$this->form_validation->set_rules('company', 'Company', 'required');
		if($this->form_validation->run() == TRUE){
			$data = $this->input->post();
			$data['image'] = $this->Manage_customer_comments->show_data_id('customer_comments','','','insert',$data);
			redirect('admin/customer_comments/');
		}
		else{
			common_viewloader('admin/cms/customer_comments/add_customer_comments','', '');
		}
	}
    function edit_customer_comments($id){
        $title = "Edit Comments";
		$data['comments'] = $this->Manage_customer_comments->fetch_edit_details($id);
        
		common_viewloader('admin/cms/customer_comments/edit_customer_comments',$data, $title);
    }
	function update_customer_comments($id){
		$this->form_validation->set_rules('testimonial_details', 'Testimonial Details', 'required');
		$this->form_validation->set_rules('customer_name', 'Customer Name', 'required');
		$this->form_validation->set_rules('position', 'Position', 'required');
		$this->form_validation->set_rules('company', 'Company', 'required');
		if($this->form_validation->run() == TRUE){
        $data = $this->input->post();
		$this->Manage_customer_comments->show_data_id('customer_comments',$id,'id','update',$data);
        redirect('admin/customer_comments/');
		}
		else{
			$data['comments'] = $this->Manage_customer_comments->fetch_edit_details($id);
			common_viewloader('admin/cms/customer_comments/edit_customer_comments',$data, '');
		}

	}
	function delete_customer_comments($id){
		$this->Manage_customer_comments->show_data_id('customer_comments',$id,'id','delete','');
        redirect('admin/customer_comments/');
	}
}
?>