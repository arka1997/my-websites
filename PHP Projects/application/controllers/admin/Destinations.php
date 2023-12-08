<?php
if (!defined('BASEPATH')) EXIT("No direct script access allowed");
class Destinations extends My_Controller{
	function __construct(){
		parent::__construct();
		$this->admin_session_checked($is_active_session = 1);
      $this->load->library('form_validation');
	}
  function index(){
  	$title = 'Destinations';
    $data['val'] = $this->Manage_destination->show_data_id('destination','','','get','');
    $data['val1'] = $this->Manage_destination->show_data_id('destination_images','','','get','');
  	$data['val2'] = $this->Manage_destination->show_data_id('destination_review','','','get','');
     // echo "<pre>";print_r($data);die;
  	common_viewloader('admin/destination/destination_listing',$data,$title);
  }

  public function add_destination(){
  	$title = "Destination Form";
  	$data['tags'] = $this->Manage_destination->show_data_id('tags','','','get','');
    common_viewloader('admin/destination/destination_add',$data,$title);
  }

  function ajax_create_slug(){
    $title = $this->input->post('title');
      $id = $this->input->post('id');
    $config = array(
    'field' => 'destination_name',
    'title' => 'title',
    'table' => 'destination',
    'id' => 'id',
  );
    $this->load->library('slug', $config);
    $data = array(
      'title'=> $title,
    );
    $slug = $this->slug->create_uri($data,$id='');
    echo $slug;
  }

  public function insert_destination(){
    //for form validation, to make the tags data available 
    // $data =$this->input->post();
    // // print_r($data);exit;
    $values['tags'] = $this->Manage_destination->show_data_id('tags','','','get','');

    $this->form_validation->set_rules('destination_name', 'Destination Name', 'required');
    $this->form_validation->set_rules('popular_name', 'Popular Name', 'required');
    $this->form_validation->set_rules('slug', 'Slug', 'required');
    
		if($_FILES['main_image']['name'] == '')
	    {
	        $this->form_validation->set_rules('main_image', 'Images', 'required');
	    }
      // print_r($_FILES['main_image']['name']);exit;
    if($_FILES['images']['name'][0] == '')
    {
        $this->form_validation->set_rules('images', 'Images', 'required');
    }
    
    $this->form_validation->set_rules('description', 'description', 'required');
    $this->form_validation->set_rules('details', 'details', 'required');

    if ($this->form_validation->run() == TRUE)
    {
      
        $data['destination_name'] = $this->input->post('destination_name');
        $data['popular_name'] = $this->input->post('popular_name');
        $data['destination_id'] = $data['destination_name'].rand(1,999999);
        $data['slug'] = $this->input->post('slug');
        $data['description'] = $this->input->post('description');
        $data['details'] = $this->input->post('details');
        $arr = $this->input->post('tags');
        if(!empty($arr)){
        $data['tags'] = implode(",",$arr);
      }
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
        'upload_path'   => './uploads/destination',
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
               // echo "<pre>";print_r($data);exit;
      	$last_id = $this->Manage_destination->show_data_id('destination','','','insert',$data);

    //====================== Multiple upload =============================
    $count = count($_FILES['images']['name']);
    // echo "<pre>";print_r($_FILES['images']);die;
    for($i = 0; $i<$count; $i++)
    {
        if(!empty($_FILES['images']['name'][$i])){
    
            $_FILES['files']['name']     = $_FILES['images']['name'][$i];
            $_FILES['files']['tmp_name'] = $_FILES['images']['tmp_name'][$i];
            $_FILES['files']['size']     = $_FILES['images']['size'][$i];
            
            $config['upload_path']       = './uploads/destination/';
            $config['allowed_types']     = 'jpg|png|gif';
            $config['overwrite'] = TRUE;
            $this->load->library('upload',$config);
            $this ->upload-> initialize($config);//this initialize function is used when 'upload' & 'config' are declared in autoload library

            if($this ->upload-> do_upload('files')){//"do upload" wil upload the function and store the files in the upload folder in server
                
                $data1['file'] = $_FILES['images']['name'][$i];//here fetching the names of every imae name and storing it in an $data array with the columnname "image" combined together as $data['image']
                

                 $data1['destination_id']= $last_id;
                 $vals1['status_check']=$this->input->post('status_check');
                 $data1['status'] = $vals1['status_check'][$i];
                 $this->Manage_destination->show_data_id('destination_images','','','insert',$data1);
            }
      }
    }
      // here we will set the siteseeing names
    $data2= $this->input->post('siteseeing');
    foreach($data2 as $val){
    $value['destination_id'] = $last_id; 
    $value['siteseeing_name'] = $val ;
    $this->Manage_destination->show_data_id('siteseeing','','','insert',$value);

  }

    $data3 = $this->input->post('review');
    $data4 = $this->input->post('rating');
    $customer_name = $this->input->post('customer_name');
    foreach($data3 as $key=>$d){
    $value1['destination_id'] = $last_id; 
    $value1['customer_name'] =  $customer_name[$key];
    $value1['review'] = $d ;
    $value1['rating'] =  $data4[$key];
    $this->Manage_destination->show_data_id('destination_review','','','insert',$value1);

  }

    redirect('admin/destinations/');
  }
  else
  {
    common_viewloader('admin/destination/destination_add',$values,'');
    // redirect('admin/destinations/add_destination');
  }
}

  public function edit_destination($id){
    $title = 'Edit Tags';
    $data['tags'] = $this->Manage_tags->show_data_id('tags','','','get','');
    $data['siteseeing']= $this->Manage_destination->show_data_id('siteseeing',$id,'destination_id','get','');
    $data['review']= $this->Manage_destination->show_data_id('destination_review',$id,'destination_id','get','');

    $data['img']= $this->Manage_destination->show_data_id('destination_images',$id,'destination_id','get','');
    // $data['count'] = count($data['review']);
    // echo $cnt;exit;
    $data['param']= $this->Manage_destination->show_data_id('destination',$id,'id','get','');
         // echo "<pre>";print_r($data);exit;
   common_viewloader('admin/destination/edit_destination',$data,$title);
  }
  public function update_destination($id){
     // the simple datas are posted here

    $values['tags'] = $this->Manage_destination->show_data_id('tags','','','get','');
    $this->form_validation->set_rules('destination_name', 'Destination Name', 'required');
    $this->form_validation->set_rules('popular_name', 'Popular Name', 'required');
    $this->form_validation->set_rules('slug', 'Slug', 'required');
    $this->form_validation->set_rules('description', 'description', 'required');
    $this->form_validation->set_rules('details', 'details', 'required');

    if ($this->form_validation->run() == TRUE)
    { 
    // $data = $this->input->post();
    //  echo "<pre>";print_r($data);exit;

        $data['destination_name'] = $this->input->post('destination_name');
        $data['popular_name'] = $this->input->post('popular_name');
        $data['destination_id'] = $data['destination_name'].rand(1,999999);
        $data['slug'] = $this->input->post('slug');
        $data['description'] = $this->input->post('description');
        $data['details'] = $this->input->post('details');
        $arr = $this->input->post('tags');
        $data['tags'] = implode(",",$arr);
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
        'upload_path'   => './uploads/destination',
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
                // echo "<pre>";print_r($data);exit;
        $this->Manage_destination->show_data_id('destination',$id,'id','update',$data);

        //====================== Multiple upload =============================
        $count = count($_FILES['images']['name']);
        // $this->Manage_destination->show_data_id('destination_images',$id,'destination_id','delete','');
        // echo $count;exit;
         // echo "<pre>";print_r($_FILES);die;
        for($i = 0; $i<$count; $i++)
        { 
            if(!empty($_FILES['images']['name'][$i])){
        
                $_FILES['files']['name']     = $_FILES['images']['name'][$i];
                $_FILES['files']['tmp_name'] = $_FILES['images']['tmp_name'][$i];
                $_FILES['files']['size']     = $_FILES['images']['size'][$i];
                
                $config['upload_path']       = './uploads/destination/';
                $config['allowed_types']     = 'jpg|png|gif';
                $config['overwrite'] = TRUE;
                $this->load->library('upload',$config);
                $this ->upload-> initialize($config);//this initialize function is used when 'upload' & 'config' are declared in autoload library

                if($this ->upload-> do_upload('files')){//"do upload" wil upload the function and store the files in the upload folder in server
                    //  echo "hii";exit;
                    $data1['file'] = $_FILES['images']['name'][$i];//here fetching the names of every imae name and storing it in an $data array with the columnname "image" combined together as $data['image']
                    $data1['destination_id']= $id;
                    $vals1['status_check']=$this->input->post('status_check');
                    $data1['status'] = $vals1['status_check'][$i];
                      // echo "<pre>";print_r($data1);exit;
                    $this->Manage_destination->show_data_id('destination_images','','','insert',$data1);
                    
                }
          }
        }

          // here we will set the siteseeing names
    $data2= $this->input->post('siteseeing');
    $this->Manage_destination->show_data_id('siteseeing',$id,'destination_id','delete','');
    foreach($data2 as $val){
      if($val != ""){
    $value['destination_id'] = $id; 
    $value['siteseeing_name'] = $val ;
    $this->Manage_destination->show_data_id('siteseeing','','','insert',$value);
  }
  }

    $data3 = $this->input->post('review');
    $data4 = $this->input->post('rating'); 
    $customer_name = $this->input->post('customer_name');
    $this->Manage_destination->show_data_id('destination_review',$id,'destination_id','delete','');
    foreach($data3 as $key=>$d){
    if($d != ""){
    $value1['destination_id'] = $id;
    $value1['customer_name'] =  $customer_name[$key]; 
    $value1['rating'] = $data4[$key] ;
    $value1['review'] = $d ;
    $this->Manage_destination->show_data_id('destination_review','','','insert',$value1);
  }
  }

   redirect('admin/destinations/');
 }
else
 {
  $values['tags'] = $this->Manage_tags->show_data_id('tags','','','get','');
  $values['siteseeing']= $this->Manage_destination->show_data_id('siteseeing',$id,'destination_id','get','');
  $values['review']= $this->Manage_destination->show_data_id('destination_review',$id,'destination_id','get','');

  $values['img']= $this->Manage_destination->show_data_id('destination_images',$id,'destination_id','get','');
  // $data['count'] = count($data['review']);
  // echo $cnt;exit;
  $values['param']= $this->Manage_destination->show_data_id('destination',$id,'id','get','');
    common_viewloader('admin/destination/edit_destination',$values,'');  }
  }

  function ajax_status_check(){
    $id = $this->input->post('id');
    $status['status'] = $this->input->post('status');
    $this->Manage_destination->show_data_id('destination_images',$id,'id','update',$status);
  }
  public function delete_destination($id){
    // echo "<pre>";print_r($data);exit;
      $this->Manage_destination->show_data_id('destination',$id,'id','delete','');
      $this->Manage_destination->show_data_id('destination_images',$id,'destination_id','delete','');
      $this->Manage_destination->show_data_id('destination_review',$id,'destination_id','delete','');
      $data['siteseeing_delete'] = $this->Manage_destination->show_data_id('siteseeing',$id,'destination_id','get','');
      foreach($data['siteseeing_delete'] as $d){
      $siteseeing_id = $d->id;
      $sql['delete'] = $this->Manage_destination->show_data_id('siteseeing_details',$siteseeing_id,'siteseeing_id','get','');
      foreach($sql['delete'] as $s){
      $last_id = $s->id;
      $this->Manage_destination->show_data_id('siteseeing_images',$last_id,'siteseeing_details_id','delete','');
      }
      $this->Manage_destination->show_data_id('siteseeing_details',$siteseeing_id,'siteseeing_id','delete','');
      }
      $this->Manage_destination->show_data_id('siteseeing',$id,'destination_id','delete','');
      redirect('admin/destinations/');
  }

  public function delete_multi_img($val_img,$id){
    //$sqls = $this->login_model->dlt_multiple_upload_item($id);
    $this->Manage_destination->show_data_id('destination_images',$id,'id','delete','');
    
    unlink('./uploads/destinations/'.$val_img);
    redirect('admin/destinations/');  
}

 

}
?>
 