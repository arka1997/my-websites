<?php
if (!defined('BASEPATH')) EXIT("No direct script access allowed");
class Tags_bulk_upload extends My_Controller{
	function __construct(){
		parent::__construct();
		$this->admin_session_checked($is_active_session = 1);
	}
  function index(){
  	$title="Tags Bulk Upload";
  	common_viewloader('admin/tags/tags_bulk_upload','',$title);
  }
  //************Excel Empty Row***********//
	function isEmptyRow($row) {
	foreach($row as $cell){
	if (null !== $cell) return false;
	}
	return true;
	}
	//*********End Excel Empty Row*********//
	
	function upload_file()
	{
	$this->load->library('PHPExcel');
	
	if(isset($_FILES["file"]["name"]))
	{
	$file_name = explode('.', $_FILES["file"]["name"]);
	$extension = end($file_name);
	//$extension = end(explode(".", $_FILES["file"]["name"])); // For getting Extension of selected file
	$allowed_extension = array("xls", "xlsx", "csv"); //allowed extension
	if(in_array($extension, $allowed_extension)) //check selected file extension is present in allowed extension array
	{
	$path = $_FILES["file"]["tmp_name"];
	$object = PHPExcel_IOFactory::load($path);
	$data = array();
	foreach($object->getWorksheetIterator() as $worksheet)
	{
	$highestRow = $worksheet->getHighestRow();
	$highestColumn = $worksheet->getHighestColumn();
	for($row=2; $row<=$highestRow; $row++)
	{
	$rowData = $worksheet->rangeToArray('A' . $row . ':' . $highestColumn . $row,NULL,TRUE,FALSE);
	if($this->isEmptyRow(reset($rowData))) { continue; } // skip empty row
	
	$tag_name = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
	//check company name
	$name = $this->db->select('id')->from('tags')->where('tag_name',$tag_name)->get()->row();
	
	if(empty($name)){
	$data[] = array(
	'created' => date('Y-m-d H:i:s'),
	'status' => trim(1),
	'tag_name' => trim($tag_name),
	);
	}
	}
	}
	
	if($data){
	$this->db->insert_batch('tags', $data);
	}
	}
	
	$this->session->set_flashdata('success', 'Companies uploaded succesfully');
	
	}
	redirect('admin/tags_bulk_upload');
	}
  }