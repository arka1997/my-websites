<?php
if (!defined('BASEPATH')) exit("No direct script access allowed");
class Packages extends My_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->admin_session_checked($is_active_session = 1);
	}
	function index()
	{
		$title = 'Packages';
		$packages= $this->Manage_packages->show_data_id('packages','','','get','');

		$data['package_dtl'] = array();
		foreach($packages as $p){
			//Ratings
			$ratings = $this->Manage_packages->show_data_id('packages_review',$p->id,'package_id','get','');
			
			$data['package_dtl'][] = (object)array(
				'id'=> $p->id,
				'package_id'=> $p->package_id,
				'package_name'=> $p->package_name,
				'popular_name'=> $p->popular_name,
				'file'=> $p->file,
				'status'=> $p->status,
				'ratings'=> count($ratings)
			);
		}
		// echo "<pre>";print_r($data['package_dtl']);exit;
		// Do the average rating of packages and show n data table ????????  \\
		common_viewloader('admin/packages/packages_list', $data , $title);
	}

	function update_status($status,$id){

		if($id){
			$data['status'] = $status;
			$this->Manage_packages->show_data_id('packages',$id,'id','update',$data);
			redirect('admin/packages/');
		}

	}

	public function add_package()
	{
		$title = "Package Form";
		$data['destination'] 	= $this->Manage_packages->show_data_id('destination', '', '', 'get', '');
		$data['tags'] 	= $this->Manage_packages->show_data_id('tags', '', '', 'get', '');
		common_viewloader('admin/packages/add_package', $data, $title);
	}
	
	public function ajax_create_slug()
	{
		$title = $this->input->post('title');
		$id = $this->input->post('id');
		$config = array(
			'field' => 'package_name',
			'title' => 'title',
			'table' => 'packages',
			'id' => 'id',
		);
		$this->load->library('slug', $config);
		$data = array(
			'title' => $title,
		);
		$slug = $this->slug->create_uri($data, $id = '');
		echo $slug;
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
	public function insert_package()
	{
		
		// $image = $this->input->post();
		// echo "<pre>";print_r($image);die;
		$values['destination'] 	= $this->Manage_packages->show_data_id('destination', '', '', 'get', '');
		$values['tags'] 	= $this->Manage_packages->show_data_id('tags', '', '', 'get', '');
		$destination = $this->input->post('destination_ids');
		if($destination[0]==''){
		$this->form_validation->set_rules('destination_ids', 'Destination ID', 'required');
		}
		$this->form_validation->set_rules('package_name', 'Package Name', 'required');
		$this->form_validation->set_rules('popular_name', 'Popular Name', 'required');
		$this->form_validation->set_rules('tag_line', 'Tag Line', 'required');
		$this->form_validation->set_rules('cost', 'Cost', 'required|numeric');
		$this->form_validation->set_rules('days', 'Days', 'required|numeric');
		$this->form_validation->set_rules('nights', 'Nights', 'required|numeric');
		$this->form_validation->set_rules('package_slug', 'Slug', 'required');
		if($_FILES['main_image']['name'] == '')
	    {
	        $this->form_validation->set_rules('main_image', 'Images', 'required');
	    }
		if ($_FILES['additional_images']['name'][0] == '') {
			$this->form_validation->set_rules('additional_images', 'Images', 'required');
		}
		$this->form_validation->set_rules('details', 'details', 'required');
		$this->form_validation->set_rules('itinerary', 'Itinerary', 'required');
		$this->form_validation->set_rules('instructions', 'Instructions', 'required');


		if ($this->form_validation->run() == TRUE) {
			$destination_arr = $this->input->post('destination_ids');
			$data['destination_ids'] = implode(",",$destination_arr);
			$data['package_name'] = $this->input->post('package_name');
			$data['popular_name'] = $this->input->post('popular_name');
			$data['package_id'] = $data['package_name'].rand(1,999999);
			$data['tag_line'] = $this->input->post('tag_line');
			$data['slug'] = $this->input->post('package_slug');
			$arr = $this->input->post('tags');
			$data['tags'] = implode(",", $arr);
			$data['cost'] = $this->input->post('cost');
			$data['days'] = $this->input->post('days');
			$data['nights'] = $this->input->post('nights');
			
			if($data['days']  >= $data['nights'])
			{
				$data['total_days'] = $data['days'];
			}
			elseif($data['days'] <= $data['nights'])
			{
				$data['total_days'] = $data['nights'];
			}
			$data['details'] = $this->input->post('details');
			$data['itinerary'] = $this->input->post('itinerary');
			$data['instructions'] = $this->input->post('instructions');
			$data['traveller_choice'] = $this->input->post('traveller_choice');
			if ($data['traveller_choice'] == "on") {
				$data['traveller_choice'] = 1;
			} else {
				$data['traveller_choice'] = 0;
			}
			$data['status'] = $this->input->post('status');
			if ($data['status'] == "on") {
				$data['status'] = 1;
			} else {
				$data['status'] = 0;
			}
			//====================== Single upload =============================\\
			 $config=[
                'upload_path'   => './uploads/package',
                'allowed_types' => 'gif|png|jpg',
            ];
            
            $this->load->library('upload',$config);
            $this->upload->overwrite = true;
            if($this->upload->do_upload('main_image'))
            {
            $data1   		=  $this->upload->data();
            $image_path     =  $data1['raw_name'].$data1['file_ext'];
            $data['file']   =  $image_path;
			}
			$last_id = $this->Manage_packages->show_data_id('packages', '', '', 'insert', $data);

			//====================== Multiple upload =============================\\
			$count = count($_FILES['additional_images']['name']);
			//  echo "<pre>";print_r($_FILES['additional_images']);die;
			for ($i = 0; $i < $count; $i++) {
				if (!empty($_FILES['additional_images']['name'][$i])) {

					$_FILES['files']['name']     = $_FILES['additional_images']['name'][$i];
					$_FILES['files']['tmp_name'] = $_FILES['additional_images']['tmp_name'][$i];
					$_FILES['files']['size']     = $_FILES['additional_images']['size'][$i];

					$config['upload_path']       = './uploads/package/';
					$config['allowed_types']     = 'jpg|png|gif';
					$config['overwrite'] = TRUE;
					$this->load->library('upload', $config);
					$this->upload->initialize($config); 
					if ($this->upload->do_upload('files')) { 
						$image['file']		 = $_FILES['additional_images']['name'][$i]; 
						$image['package_id'] = $last_id;
						// echo "<pre>";print_r($image);die;
						$this->Manage_packages->show_data_id('packages_images', '', '', 'insert', $image);
					}
				}
			}

			$rev = $this->input->post('review');
			$rat = $this->input->post('rating');
			foreach ($rev as $key => $d) {
				if($d!= " "){
				$value1['package_id'] = $last_id;
				$value1['review'] 	  = $d;
				$value1['rating']	  = $rat[$key];
				$this->Manage_packages->show_data_id('packages_review', '', '', 'insert', $value1);
				}
			}

			redirect('admin/packages/');
		} else {
			
		// $image = $this->input->post();
		// echo "<pre>";print_r($image);die;
			common_viewloader('admin/packages/add_package', $values, '');
		}
	}

	public function edit_packages($id){
		
		$data['package_dtl'] 	   = $this->Manage_packages->show_data_id('packages',$id,'id','get','');
		$data['destination'] 	   = $this->Manage_packages->show_data_id('destination', '', '', 'get', '');
		$data['tags'] 			   = $this->Manage_packages->show_data_id('tags','', '', 'get', '');
		$data['review']= $this->Manage_packages->show_data_id('packages_review',$id,'package_id','get','');
		$data['additional_images'] = $this->Manage_packages->show_data_id('packages_images',$id, 'package_id', 'get', '');
		// echo "<pre>";print_r($data);exit;
		common_viewloader('admin/packages/edit_package', $data, '');
	}

	public function update_packages($id){
		// $data = $this->input->post();
		// echo "<pre>";print_r($data);exit;
		$values['package_dtl'] 	   = $this->Manage_packages->show_data_id('packages',$id,'id','get','');
		$values['destination'] 	= $this->Manage_packages->show_data_id('destination', '', '', 'get', '');
		$values['tags'] 	= $this->Manage_packages->show_data_id('tags', '', '', 'get', '');
		$values['review']= $this->Manage_packages->show_data_id('packages_review',$id,'package_id','get','');
		$values['additional_images'] = $this->Manage_packages->show_data_id('packages_images',$id, 'package_id', 'get', '');
		$destination = $this->input->post('destination_ids');
		if($destination[0]==''){
		$this->form_validation->set_rules('destination_ids', 'Destination ID', 'required');
		}
		$this->form_validation->set_rules('package_name', 'Package Name', 'required');
		$this->form_validation->set_rules('popular_name', 'Popular Name', 'required');
		$this->form_validation->set_rules('tag_line', 'Tag Line', 'required');
		$this->form_validation->set_rules('cost', 'Cost', 'required|numeric');
		$this->form_validation->set_rules('days', 'Days', 'required|numeric');
		$this->form_validation->set_rules('nights', 'Nights', 'required|numeric');
		$this->form_validation->set_rules('package_slug', 'Slug', 'required');
		$this->form_validation->set_rules('details', 'details', 'required');
		$this->form_validation->set_rules('itinerary', 'Itinerary', 'required');
		$this->form_validation->set_rules('instructions', 'Instructions', 'required');

		if ($this->form_validation->run() == TRUE) {
			$destination_arr = $this->input->post('destination_ids');
			$data['destination_ids'] = implode(",",$destination_arr);
			$data['package_name'] = $this->input->post('package_name');
			$data['popular_name'] = $this->input->post('popular_name');
			$data['package_id'] = $data['package_name'].rand(1,999999);
			$data['tag_line'] = $this->input->post('tag_line');
			$data['slug'] = $this->input->post('package_slug');
			$arr = $this->input->post('tags');
			$data['tags'] = implode(",", $arr);
			$data['cost'] = $this->input->post('cost');
			$data['days'] = $this->input->post('days');
			$data['nights'] = $this->input->post('nights');
			if($data['days']  >= $data['nights'])
			{
				$data['total_days'] = $data['days'];
			}
			elseif($data['days'] <= $data['nights'])
			{
				$data['total_days'] = $data['nights'];
			}
			$data['details'] = $this->input->post('details');
			$data['itinerary'] = $this->input->post('itinerary');
			$data['instructions'] = $this->input->post('instructions');
			$data['traveller_choice'] = $this->input->post('traveller_choice');	
			
			if ($data['traveller_choice'] == "on") {
				$data['traveller_choice'] = 1;
			} else {
				$data['traveller_choice'] = 0;
			}
			$data['status'] = $this->input->post('status');
			if ($data['status'] == "on") {
				$data['status'] = 1;
			} else {
				$data['status'] = 0;
			}
			//====================== Single upload =============================\\
			 $config=[
                'upload_path'   => './uploads/package',
                'allowed_types' => 'gif|png|jpg',
            ];
            
            $this->load->library('upload',$config);
            $this->upload->overwrite = true;
            if($this->upload->do_upload('main_image'))
            {
            $data1   		=  $this->upload->data();
            $image_path     =  $data1['raw_name'].$data1['file_ext'];
            $data['file']   =  $image_path;
			}
			$last_id = $this->Manage_packages->show_data_id('packages', $id, 'id', 'update', $data);

			//====================== Multiple upload =============================\\
			$count = count($_FILES['additional_images']['name']);
			//   echo "<pre>";print_r($_FILES['additional_images']);die;
			for ($i = 0; $i < $count; $i++) {
				if (!empty($_FILES['additional_images']['name'][$i])) {

					$_FILES['files']['name']     = $_FILES['additional_images']['name'][$i];
					$_FILES['files']['tmp_name'] = $_FILES['additional_images']['tmp_name'][$i];
					$_FILES['files']['size']     = $_FILES['additional_images']['size'][$i];

					$config['upload_path']       = './uploads/package/';
					$config['allowed_types']     = 'jpg|png|gif';
					$config['overwrite'] = TRUE;
					$this->load->library('upload', $config);
					$this->upload->initialize($config); 
					if ($this->upload->do_upload('files')) { 
						// echo "<pre>";print_r($_FILES['additional_images']);die;
						$image['file']		 = $_FILES['additional_images']['name'][$i]; 
						$image['package_id'] = $id;
						// echo "<pre>";print_r($image);die;
						$this->Manage_packages->show_data_id('packages_images', '', '', 'insert', $image);
					}
				}
			}

			$rev = $this->input->post('review');
			$rat = $this->input->post('rating');
			$this->Manage_packages->show_data_id('packages_review',$id,'package_id','delete','');
			foreach ($rev as $key => $r) {
				if($r != " "){
				$value1['package_id'] = $id;
				$value1['review'] 	  = $r;
				$value1['rating']	  = $rat[$key];
				$this->Manage_packages->show_data_id('packages_review', '', '', 'insert', $value1);
			}
		}
			redirect('admin/packages/');
		} else {
			// echo "hi";exit;
			common_viewloader('admin/packages/edit_package', $values, '');
		}
	}

	public function delete_packages($id){
		// echo "<pre>";print_r($data);exit;
		$this->Manage_packages->show_data_id('packages',$id,'id','delete','');
		$this->Manage_packages->show_data_id('packages_images',$id,'package_id','delete','');
	    $this->Manage_packages->show_data_id('packages_review',$id,'package_id','delete','');
	   redirect('admin/destinations/');
	  }
	
	  function delete_multi_img($val_img,$id){
		$this->Manage_packages->show_data_id('packages_images',$id,'id','delete','');
		
		unlink('./uploads/package/'.$val_img);
		redirect('admin/packages/');
	}

	
}
?>	