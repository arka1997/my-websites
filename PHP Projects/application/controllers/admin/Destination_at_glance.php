<?php
if(!defined('BASEPATH')) EXIT('No direct script access allowed');
class Destination_at_glance extends My_Controller{
	function __construct(){
		parent::__construct();
		$this->admin_session_checked($is_active_session = 1);
		$this->load->helper('file');
	}
	function index(){
		$title 						= "Why Choose Us";
		$data['destination_at_glance'] 				= $this->Manage_destination_at_glance->show_data_id('destination_at_glance','','','get','');
		  // echo "<pre>";print_r($data);exit;
		common_viewloader('admin/cms/destination_at_glance/destination_at_glance_list',$data,$title);
	}

	public function insert_destination_at_glance(){
		
		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('main_image', 'Images', 'callback_file_check');
	    if ($this->form_validation->run() == TRUE)
	    {
			// echo "hi";exit;
		$data = $this->input->post();
		 //====================== Single upload =============================\\
		 $config=[
			'upload_path'   => './uploads/destination_at_glance',
			'allowed_types' => 'gif|png|jpg',
			];
			
			$this->load->library('upload',$config);
			$this->upload->overwrite = true;
			if($this->upload->do_upload('main_image'))
			{
			$upload_data   		=  $this->upload->data();
			$image_path     =  $upload_data['raw_name'].$upload_data['file_ext'];
			$data['main_image']   =  $image_path;
			$this->Manage_destination_at_glance->show_data_id('destination_at_glance','','','insert',$data);
			redirect('admin/destination_at_glance/');
		}
	}
		else{
			$data['destination_at_glance'] 				= $this->Manage_destination_at_glance->show_data_id('destination_at_glance','','','get','');
		  common_viewloader('admin/cms/destination_at_glance/destination_at_glance_list',$data,'');
		}
	      	
	}
	public function file_check($str){
		$allowed_mime_type_arr = array('image/gif','image/jpeg','image/pjpeg','image/png','image/x-png');
		$mime = get_mime_by_extension($_FILES['main_image']['name']);
		// echo "hi";exit;
		if(isset($_FILES['main_image']['name']) && $_FILES['main_image']['name']!=""){
			
			if(in_array($mime, $allowed_mime_type_arr)){
				return true;
			}else{
				$this->form_validation->set_message('file_check', 'Please select only pdf/gif/jpg/png file.');
				return false;
			}
		}else{
			$this->form_validation->set_message('file_check', 'Please choose a file to upload.');
			return false;
		}
	}
	function edit_destination_at_glance($id){
		$data['destination_at_glance'] = $this->Manage_destination_at_glance->show_data_id('destination_at_glance','','','get','');
		common_viewloader('admin/cms/destination_at_glance/destination_at_glance_list',$data);
	}

	function update_destination_at_glance($id){
		
		$this->form_validation->set_rules('title', 'Title', 'required');
	    if ($this->form_validation->run() == TRUE)
	    {
			// echo "hi";exit;
		$data = $this->input->post();
		 //====================== Single upload =============================\\
		 $config=[
			'upload_path'   => './uploads/destination_at_glance',
			'allowed_types' => 'gif|png|jpg',
			];
			
			$this->load->library('upload',$config);
			$this->upload->overwrite = true;
			if($this->upload->do_upload('main_image'))
			{
			$upload_data   		=  $this->upload->data();
			$image_path     =  $upload_data['raw_name'].$upload_data['file_ext'];
			$data['main_image']   =  $image_path;
		}
		$this->Manage_destination_at_glance->show_data_id('destination_at_glance',$id,'id','update',$data);
		redirect('admin/destination_at_glance/');
	}
		else{
			$data['destination_at_glance'] 				= $this->Manage_destination_at_glance->show_data_id('destination_at_glance','','','get','');
		  common_viewloader('admin/cms/destination_at_glance/destination_at_glance_list',$data,'');
		}
    }
	
    function delete_destination_at_glance($id){
        $this->Manage_destination_at_glance->show_data_id('destination_at_glance',$id,'id','delete','');
        redirect('admin/destination_at_glance/');
    }
}
?>