<?php
if(!defined('BASEPATH')) EXIT('No direct script access allowed');
class Full_width_banner_upload extends My_Controller{
	function __construct(){
		parent::__construct();
		$this->load->helper('file');
	}
	function index(){
		$title 						= "Why Choose Us";
		$data['full_width_banner'] 				= $this->Manage_full_width_banner->show_data_id('full_width_banner','','','get','');
		  // echo "<pre>";print_r($data);exit;
		common_viewloader('admin/cms/full_width_banner/fullWidth_banner_listing_tbl',$data,$title);
	}

	public function insert_full_width_banner(){
		
		$this->form_validation->set_rules('main_image', 'Images', 'callback_file_check');
	    if ($this->form_validation->run() == TRUE)
	    {
			// echo "hi";exit;
		$data = $this->input->post();
		 //====================== Single upload =============================\\
		 $config=[
			'upload_path'   => './uploads/full_width_banner',
			'allowed_types' => 'gif|png|jpg',
			];
			
			$this->load->library('upload',$config);
			$this->upload->overwrite = true;
			if($this->upload->do_upload('main_image'))
			{
			$upload_data   		=  $this->upload->data();
			$image_path     =  $upload_data['raw_name'].$upload_data['file_ext'];
			$data['main_image']   =  $image_path;
			$this->Manage_full_width_banner->show_data_id('full_width_banner','','','insert',$data);
			redirect('admin/full_width_banner/');
		}
	}
		else{
			$data['full_width_banner'] 				= $this->Manage_full_width_banner->show_data_id('full_width_banner','','','get','');
		  common_viewloader('admin/cms/full_width_banner/full_width_banner_list',$data,'');
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
	function edit_full_width_banner($id){
		$data['full_width_banner'] = $this->Manage_full_width_banner->show_data_id('full_width_banner','','','get','');
		common_viewloader('admin/cms/full_width_banner/full_width_banner_list',$data);
	}

	function update_full_width_banner($id){
		
		$this->form_validation->set_rules('title', 'Title', 'required');
	    if ($this->form_validation->run() == TRUE)
	    {
			// echo "hi";exit;
		$data = $this->input->post();
		 //====================== Single upload =============================\\
		 $config=[
			'upload_path'   => './uploads/full_width_banner',
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
		$this->Manage_full_width_banner->show_data_id('full_width_banner',$id,'id','update',$data);
		redirect('admin/full_width_banner/');
	}
		else{
			$data['full_width_banner'] 				= $this->Manage_full_width_banner->show_data_id('full_width_banner','','','get','');
		  common_viewloader('admin/cms/full_width_banner/full_width_banner_list',$data,'');
		}
    }
	
    function delete_full_width_banner($id){
        $this->Manage_full_width_banner->show_data_id('full_width_banner',$id,'id','delete','');
        redirect('admin/full_width_banner/');
    }
}
?>