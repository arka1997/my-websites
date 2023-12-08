<?php
if (!defined('BASEPATH')) EXIT("No direct script access allowed");
class Tags extends My_Controller{
function __construct(){
    parent::__construct();
		$this->admin_session_checked($is_active_session = 1);
      $this->load->library('form_validation');
  }

  public function index(){
    $title = 'Tags';
    $data['val'] = $this->Manage_tags->show_data_id('tags','','','get','');
    common_viewloader('admin/tags/tags_list',$data,$title);
  }

  public function upload(){
    $title = "Tags Form";
    common_viewloader('admin/tags/upload_tags','',$title);
  }

  public function add_tags(){
    $title = "Tags Form";
    common_viewloader('admin/tags/add_tags','',$title);
  }

  public function insert_tags(){
    $this->form_validation->set_rules('tags[]', 'Tag Name', 'required');
    if ($this->form_validation->run() == TRUE){
    $data = $this->input->post();
      // echo "<pre>";print_r($data);exit;
    $this->Manage_tags->show_data_id('tags','','','insert',$data);
    redirect('admin/tags/');
  }
  else{
    common_viewloader('admin/tags/add_tags','','');
  }
  }

  public function edit_tags($id){
   $title = 'Edit Tags';
    $data['param']= $this->Manage_tags->show_data_id('tags',$id,'id','get','');
    
   common_viewloader('admin/tags/edit_tag',$data,$title);
  }

  public function update_tags($id){
    $this->form_validation->set_rules('tags[]', 'Tag Name', 'required');
    if ($this->form_validation->run() == TRUE){
    $data = $this->input->post();
     // echo "<pre>";print_r($data);exit;
   $this->Manage_tags->show_data_id('tags',$id,'id','update',$data);
   redirect('admin/tags/index');
   }
  else{
    common_viewloader('admin/tags/add_tags','','');
  }
  }

  public function delete_tags($id){
    // echo "<pre>";print_r($data);exit;
   $this->Manage_tags->show_data_id('tags',$id,'id','delete','');
   redirect('admin/tags/index');
  }

}
?>