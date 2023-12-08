<?php

if(!defined('BASEPATH')) EXIT('No direct script access allowed');

class Banner_upload extends My_Controller 
{
	function __construct()
	{
		parent::__construct();
		$this->admin_session_checked($is_active_session = 1);
		$this->load->library('form_validation');
	}

	function index()
	{
        $data['banner_img'] = $this->Manage_banner->show_data_id('banner','','','get','');
        // echo "<pre>";print_r($data['banner_img'][0]->details);exit;
  	    common_viewloader('admin/cms/banner/banner_listing_tbl',$data,'');	
	}

    function update_status($status,$id){

		if($id){
			$data['status'] = $status;
			$this->Manage_banner->show_data_id('banner',$id,'id','update',$data);
			redirect('admin/banner_upload/');
		}

	}

    function add_banner()
	{
  	    common_viewloader('admin/cms/banner/banner_upload','','');	
	}
    function insert_banner(){
        // $data = $this->input->post();
        // echo "<pre>";print_r($data);exit;
        if($_FILES['images']['name'][0] == '')
    {
        $this->form_validation->set_rules('images', 'Images', 'required');
    }
    if ($this->form_validation->run() == TRUE)
    {
         //====================== Multiple upload =============================
    $count = count($_FILES['images']['name']);
    // echo "<pre>";print_r($_FILES['images']);die;
    for($i = 0; $i<$count; $i++)
    { //echo "hi";exit;
        if(!empty($_FILES['images']['name'][$i])){
    
            $_FILES['files']['name']     = $_FILES['images']['name'][$i];
            $_FILES['files']['tmp_name'] = $_FILES['images']['tmp_name'][$i];
            $_FILES['files']['size']     = $_FILES['images']['size'][$i];
            
            $config['upload_path']       = './uploads/banner/';
            $config['allowed_types']     = 'jpg|png|gif';
            $config['overwrite'] = TRUE;
            $this->load->library('upload',$config);
            $this ->upload-> initialize($config);//this initialize function is used when 'upload' & 'config' are declared in autoload library

            if($this ->upload-> do_upload('files')){//"do upload" wil upload the function and store the files in the upload folder in server
                
                $data1['images'] = $_FILES['images']['name'][$i];//here fetching the names of every imae name and storing it in an $data array with the columnname "image" combined together as $data['image']
                
                 $vals1['status_check']=$this->input->post('status_check');
                 $data1['status'] = $vals1['status_check'][$i];
                 $this->Manage_banner->show_data_id('banner','','','insert',$data1);
            }
      }
    }
    redirect('admin/banner_upload/');
}
    else
    {
      common_viewloader('admin/cms/banner/banner_upload','','');
      // redirect('admin/destinations/add_destination');
    }
    }

    function add_banner_details($id){
        // echo $id;exit;
        $data = $this->input->post();
        // print_r($data);exit;
        $this->Manage_banner->insert_banner_details($data , $id);
		redirect('admin/banner_upload/index');

    }

    function delete_banner_img($val_img){
		//$sqls = $this->login_model->dlt_multiple_upload_item($id);
		
        $this->Manage_banner->show_data_id('banner',$val_img,'id','delete','');
		
		unlink('./uploads/banner/'.$val_img);
		redirect('admin/banner_upload/index');
	}
}

?>