<?php
if(!defined('BASEPATH')) EXIT('No direct script access allowed');
class Siteseeing extends My_Controller{
	function __construct(){
		parent::__construct();
		$this->admin_session_checked($is_active_session = 1);
		
	}
	function index(){
		$title 						= "Siteseeing";
		$data['tags'] 				= $this->Manage_siteseeing->show_data_id('tags','','','get','');
		$siteseeing_data 			= $this->Manage_siteseeing->join_data();
		// echo"<pre>";print_r($siteseeing_data);exit;
		if($siteseeing_data) {
			foreach($siteseeing_data as $key=>$s) {
				//fetching the siteseeing details row with the siteseeing ids 
				$siteseeing_details = $this->Manage_siteseeing->check_status($s->id);
				$status = 0;
				$siteseeing_details_id = 0;
				$siteseeing_details_tags = 0;
				$description = '';
				if($siteseeing_details) {
					$siteseeing_details_tags = $siteseeing_details->tags;
					$siteseeing_details_id = $siteseeing_details->id;
					$status = $siteseeing_details->active;
					$description = $siteseeing_details->description;
				}
				
				//this is actually returning the number of rows with the siteseeing id to check if any row with that id exist or not to change the add button to edit button
				$siteseeings = $this->Manage_siteseeing->fetch_id($s->id);
				$data['siteseeing'][] = (object)array(

								 'id'	=> $s->id,
			 'siteseeing_details_tags'	=> $siteseeing_details_tags,
			  'siteseeing_details_id'	=> $siteseeing_details_id,
					'siteseeing_name'	=> $s->siteseeing_name,
				   'destination_name'	=> $s->destination_name,
				 'siteseeing_details'	=> $siteseeings,
				 		'description'	=> $description,
				 			 'status'	=> $status,
				   'traveller_choice'   => $s->traveller_choice,

				);

				//siteseeing image
				if($siteseeing_details) {
					$images = $this->Manage_siteseeing->siteseeing_images($siteseeing_details->id);
					if($images) {
						foreach($images as $key=>$img) {
							$data['siteseeing_images'][$siteseeing_details->id][] = (object)array(

								 'id'		=> $img->id,
								'file'		=> $img->file,
								'status'	=> $img->status
							);
						}
					}
				}


			}
			

		}
		//echo "<pre>";print_r($data['siteseeing_images']);exit;
		  // echo "<pre>";print_r($data);exit;
		common_viewloader('admin/Siteseeing/siteseeing_list',$data,$title);
	}

	function insert_siteseeing(){
		//This below few line which are already declared in index is also used here because when validation error occurs, then we redirect to this isert function, and to make availbale the below lines we use them here
		// start
		$data_site['tags'] 				= $this->Manage_siteseeing->show_data_id('tags','','','get','');
		$siteseeing_data 			= $this->Manage_siteseeing->join_data();
		// echo"<pre>";print_r($siteseeing_data);exit;
		if($siteseeing_data) {
			foreach($siteseeing_data as $key=>$s) {
				//fetching the siteseeing details row with the siteseeing ids 
				$siteseeing_details = $this->Manage_siteseeing->check_status($s->id);
				$status = 0;
				$siteseeing_details_id = 0;
				$siteseeing_details_tags = 0;
				$description = '';
				if($siteseeing_details) {
					$siteseeing_details_tags = $siteseeing_details->tags;
					$siteseeing_details_id = $siteseeing_details->id;
					$status = $siteseeing_details->active;
					$description = $siteseeing_details->description;
				}
				
				//this is actually returning the number of rows with the siteseeing id to check if any row with that id exist or not to change the add button to edit button
				$siteseeings = $this->Manage_siteseeing->fetch_id($s->id);
				$data_site['siteseeing'][] = (object)array(

								 'id'	=> $s->id,
			 'siteseeing_details_tags'	=> $siteseeing_details_tags,
			  'siteseeing_details_id'	=> $siteseeing_details_id,
					'siteseeing_name'	=> $s->siteseeing_name,
				   'destination_name'	=> $s->destination_name,
				 'siteseeing_details'	=> $siteseeings,
				 		'description'	=> $description,
				 			 'status'	=> $status,
				   'traveller_choice'   => $s->traveller_choice,

				);

				//siteseeing image
				if($siteseeing_details) {
					$images = $this->Manage_siteseeing->siteseeing_images($siteseeing_details->id);
					if($images) {
						foreach($images as $key=>$img) {
							$data_site['siteseeing_images'][$siteseeing_details->id][] = (object)array(

								 'id'		=> $img->id,
								'file'		=> $img->file,
								'status'	=> $img->status
							);
						}
					}
				}


			}
			

		}
		// end


		$this->form_validation->set_rules('siteseeing_id', 'Siteseeing ID', 'required');
    	$this->form_validation->set_rules('detail', 'details', 'required');
	    $this->form_validation->set_rules('traveller_choice', 'Traveller Choice', 'required');
	    $this->form_validation->set_rules('status', 'Status', 'required');
	      // print_r($_FILES['images']['name'][0]);exit;
	    if($_FILES['images']['name'][0] == '')
	    {
	        $this->form_validation->set_rules('images', 'Images', 'required');
	    }

	    if ($this->form_validation->run() == TRUE)
	    {
	    	$data['siteseeing_id'] 	  = $this->input->post('siteseeing_id');
	        $data['description']   	  = $this->input->post('detail');
	        $arr 				   	  = $this->input->post('tags');
	        $data['tags'] 		   	  = implode(",",$arr);
	        $data['traveller_choice'] = $this->input->post('traveller_choice');
	        if( $data['traveller_choice']== "on"){
	        	$data['traveller_choice'] = 1;
	        }
	        else{
	        	$data['traveller_choice'] = 0;
	        }
	        $data['active'] = $this->input->post('status');
	        if( $data['active']== "on"){
	        	$data['active'] = 1;
	        }
	        else{
	        	$data['active'] = 0;
	        }
	                // echo "<pre>";print_r($data);exit;
	      	$last_id = $this->Manage_siteseeing->show_data_id('siteseeing_details','','','insert',$data);
		//====================== Multiple upload =============================
	    $count = count($_FILES['images']['name']);
	     // echo "<pre>";print_r($_FILES['images']);die;
	    for($i = 0; $i<$count; $i++)
	    {
	        if(!empty($_FILES['images']['name'][$i])){
	    	
	            $_FILES['files']['name']     = $_FILES['images']['name'][$i];
	            $_FILES['files']['tmp_name'] = $_FILES['images']['tmp_name'][$i];
	            $_FILES['files']['size']     = $_FILES['images']['size'][$i];
	            
	            $config['upload_path']       = './uploads/siteseeing/';
	            $config['allowed_types']     = 'jpg|png|gif';
	            $config['overwrite'] = TRUE;
	            $this->load->library('upload',$config);
	            $this ->upload-> initialize($config);//this initialize function is used when 'upload' & 'config' are declared in autoload library

	            if($this ->upload-> do_upload('files')){//"do upload" wil upload the function and store the files in the upload folder in server
	                // echo "hi";exit;
	                $data1['file'] = $_FILES['images']['name'][$i];//here fetching the names of every imae name and storing it in an $data array with the columnname "image" combined together as $data['image']
	                $data1['siteseeing_details_id']	= $last_id ;
	                $vals1['status_check']	= $this->input->post('status_check');
	                $data1['status'] 		= $vals1['status_check'][$i];
	                // echo "<pre>";print_r($data1);exit;
	                $this->Manage_siteseeing->show_data_id('siteseeing_images','','','insert',$data1);
	            }
	      	}
	    }
		redirect('admin/siteseeing/');
	}
	else{
	    common_viewloader('admin/siteseeing/siteseeing_list',$data_site,'');

	}
	}

  	function update_status($status,$id){
		// echo $status;exit;
  		if($id){
  			$data['active'] = $status;
  			$this->Manage_siteseeing->show_data_id('siteseeing_details',$id,'siteseeing_id','update',$data);
  			redirect('admin/siteseeing/');
  		}

  	}

  	function ajax_status_check(){
  		$id = $this->input->post('id');
	    $status['status'] = $this->input->post('status');
	    $this->Manage_siteseeing->show_data_id('siteseeing_images',$id,'id','update',$status);
  	}

  	function delete_multi_img($val_img,$id){
    $this->Manage_siteseeing->show_data_id('siteseeing_images',$id,'file','delete','');
    unlink('./uploads/siteseeing/'.$val_img);
    redirect('admin/siteseeing/');
	}

	function update_siteseeing($id){
		$data_site['tags'] 				= $this->Manage_siteseeing->show_data_id('tags','','','get','');
		$siteseeing_data 			= $this->Manage_siteseeing->join_data();
		// echo"<pre>";print_r($siteseeing_data);exit;
		if($siteseeing_data) {
			foreach($siteseeing_data as $key=>$s) {
				//fetching the siteseeing details row with the siteseeing ids 
				$siteseeing_details = $this->Manage_siteseeing->check_status($s->id);
				$status = 0;
				$siteseeing_details_id = 0;
				$siteseeing_details_tags = 0;
				$description = '';
				if($siteseeing_details) {
					$siteseeing_details_tags = $siteseeing_details->tags;
					$siteseeing_details_id = $siteseeing_details->id;
					$status = $siteseeing_details->active;
					$description = $siteseeing_details->description;
				}
				
				//this is actually returning the number of rows with the siteseeing id to check if any row with that id exist or not to change the add button to edit button
				$siteseeings = $this->Manage_siteseeing->fetch_id($s->id);
				$data_site['siteseeing'][] = (object)array(

								 'id'	=> $s->id,
			 'siteseeing_details_tags'	=> $siteseeing_details_tags,
			  'siteseeing_details_id'	=> $siteseeing_details_id,
					'siteseeing_name'	=> $s->siteseeing_name,
				   'destination_name'	=> $s->destination_name,
				 'siteseeing_details'	=> $siteseeings,
				 		'description'	=> $description,
				 			 'status'	=> $status,
				   'traveller_choice'   => $s->traveller_choice,

				);

				//siteseeing image
				if($siteseeing_details) {
					$images = $this->Manage_siteseeing->siteseeing_images($siteseeing_details->id);
					if($images) {
						foreach($images as $key=>$img) {
							$data_site['siteseeing_images'][$siteseeing_details->id][] = (object)array(

								 'id'		=> $img->id,
								'file'		=> $img->file,
								'status'	=> $img->status
							);
						}
					}
				}


			}
			

		}
		$this->form_validation->set_rules('siteseeing_id', 'Siteseeing ID', 'required');
    	$this->form_validation->set_rules('detail', 'details', 'required');
	    if ($this->form_validation->run() == TRUE)
	    {
	    	$data['siteseeing_id'] 	  = $this->input->post('siteseeing_id');
	        $data['description']   	  = $this->input->post('detail');
	        $arr 				   	  = $this->input->post('tags');
	        $data['tags'] 		   	  = implode(",",$arr);
	        $data['traveller_choice'] = $this->input->post('traveller_choice');
	        if( $data['traveller_choice']== "on"){
	        	$data['traveller_choice'] = 1;
	        }
	        else{
	        	$data['traveller_choice'] = 0;
	        }
	        $data['active'] = $this->input->post('status');
	        if( $data['active']== "on"){
	        	$data['active'] = 1;
	        }
	        else{
	        	$data['active'] = 0;
	        }
		// echo "<pre>";print_r($data);exit;
		$sql = $this->Manage_siteseeing->show_data_id('siteseeing_details',$data['siteseeing_id'] ,'siteseeing_id','update',$data);
		//====================== Multiple upload =============================
	    $count = count($_FILES['images']['name']);
	     // echo "<pre>";print_r($_FILES['images']);die;
	    for($i = 0; $i<$count; $i++)
	    {
	        if(!empty($_FILES['images']['name'][$i])){
	    	
	            $_FILES['files']['name']     = $_FILES['images']['name'][$i];
	            $_FILES['files']['tmp_name'] = $_FILES['images']['tmp_name'][$i];
	            $_FILES['files']['size']     = $_FILES['images']['size'][$i];
	            
	            $config['upload_path']       = './uploads/siteseeing/';
	            $config['allowed_types']     = 'jpg|png|gif';
	            $config['overwrite'] = TRUE;
	            $this->load->library('upload',$config);
	            $this ->upload-> initialize($config);//this initialize function is used when 'upload' & 'config' are declared in autoload library

	            if($this ->upload-> do_upload('files')){//"do upload" wil upload the function and store the files in the upload folder in server
	                // echo "hi";exit;
	                $data1['file'] = $_FILES['images']['name'][$i];//here fetching the names of every imae name and storing it in an $data array with the columnname "image" combined together as $data['image']
	                $data1['siteseeing_details_id']	= $id ;
	                $vals1['status_check']	= $this->input->post('image_status_check');
	                $data1['status'] 		= $vals1['status_check'][$i];
	                // echo "<pre>";print_r($data1);exit;
	                $this->Manage_siteseeing->show_data_id('siteseeing_images','','','insert',$data1);
	            }
	      	}
	    }
		redirect('admin/siteseeing/');
	}
	else{
	    common_viewloader('admin/siteseeing/siteseeing_list',$data_site,'');

	}
}
	
}
?>