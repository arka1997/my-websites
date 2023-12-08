<?php
if(!defined('BASEPATH')) EXIT('No direct script access allowed');
class Why_choose_us extends My_Controller{
	function __construct(){
		parent::__construct();
		$this->admin_session_checked($is_active_session = 1);
		$this->load->helper('file');
	}
	function index(){
		$title 						= "Why Choose Us";
		$data['why_choose_us'] 				= $this->Manage_why_choose_us->show_data_id('why_choose_us','','','get','');
		$data['full_width_banner'] 				= $this->Manage_why_choose_us->show_data_id('full_width_banner','','','get','');
		//   echo "<pre>";print_r($data);exit;
		common_viewloader('admin/cms/why_choose_us/why_choose_us_list',$data,$title);
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
			$upload_data   		 =  $this->upload->data();
			$image_path    		 =  $upload_data['raw_name'].$upload_data['file_ext'];
			$data['main_image']  =  $image_path;
			$this->Manage_full_width_banner->show_data_id('full_width_banner','','','insert',$data);
			redirect('admin/why_choose_us/');
		}
	}
	else{
		$data['full_width_banner'] 				= $this->Manage_why_choose_us->show_data_id('full_width_banner','','','get','');
		$data['why_choose_us'] = $this->Manage_why_choose_us->show_data_id('why_choose_us','','','get','');
		  common_viewloader('admin/cms/why_choose_us/why_choose_us_list',$data,'');
	}
	      	
	}
	public function edit_full_width_banner($id){
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
			$this->Manage_why_choose_us->show_data_id('full_width_banner',$id,'id','update',$data);
			redirect('admin/why_choose_us/');
		}
	}
	else{
		$data['full_width_banner'] 				= $this->Manage_why_choose_us->show_data_id('full_width_banner','','','get','');
		$data['why_choose_us'] = $this->Manage_why_choose_us->show_data_id('why_choose_us','','','get','');
	  common_viewloader('admin/cms/why_choose_us/why_choose_us_list',$data,'');
	}
	}
	public function insert_why_choose_us(){
		
		$this->form_validation->set_rules('title', 'Title', 'required');
    	$this->form_validation->set_rules('description', 'Description', 'required|max_length[100]');
	    if ($this->form_validation->run() == TRUE)
	    {
		$data = $this->input->post();
			$this->Manage_why_choose_us->show_data_id('why_choose_us','','','insert',$data);
			redirect('admin/why_choose_us/');
		}
		else{
			$data['full_width_banner'] 				= $this->Manage_why_choose_us->show_data_id('full_width_banner','','','get','');
			$data['why_choose_us'] = $this->Manage_why_choose_us->show_data_id('why_choose_us','','','get','');
		  	common_viewloader('admin/cms/why_choose_us/why_choose_us_list',$data,'');
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
	
	function edit_why_choose_us($id){
		$data['why_choose_us'] = $this->Manage_why_choose_us->show_data_id('why_choose_us','','','get','');
		common_viewloader('admin/cms/why_choose_us/why_choose_us_list',$data);
	}

	function update_why_choose_us($id){
		
		$this->form_validation->set_rules('title', 'Title', 'required');
    	$this->form_validation->set_rules('description', 'Description', 'required|max_length[150]');
		// $this->form_validation->set_rules('main_image', 'Images', 'callback_file_check');
	    if ($this->form_validation->run() == TRUE)
	    {
			// echo "hi";exit;
		$data = $this->input->post();
		$this->Manage_why_choose_us->show_data_id('why_choose_us',$id,'id','update',$data);
		redirect('admin/why_choose_us/');
		}
		else{
			$data['full_width_banner'] 				= $this->Manage_why_choose_us->show_data_id('full_width_banner','','','get','');
			$data['why_choose_us'] = $this->Manage_why_choose_us->show_data_id('why_choose_us','','','get','');
		  common_viewloader('admin/cms/why_choose_us/why_choose_us_list',$data,'');
		}
    }
    function delete_why_choose_us($id){
        $this->Manage_why_choose_us->show_data_id('why_choose_us',$id,'id','delete','');
        redirect('admin/why_choose_us/');
    }
}
?>