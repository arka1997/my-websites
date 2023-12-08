<?php
defined('BASEPATH') OR exit('no direct script allowed');

class Site_model extends CI_Model
{
	public function __construct(){
		parent::__construct();
		$this->load->database();
	}
function val_sop(){
	return "nsdj vjs jsvow ndjjdf";
}
	function insert_totable($data)
	{	//DB insertion command
		//$this->database->insert query->table name->Data
		return $this->db->insert("users",$data);//this is a active query insertion
		//return $this->db->query("Insert into tbl_users(name,email,amount) values ('sohini','hhkgjgggjg','674674')");
	  //the above code is a raw query insertion
	}
}
	?>
	<!-- 
	further regular or RAW query is database dependent,suppose we are coding using 
	oracle databse or some other instead of my SQL,then we have to chang the code 
	for RAW statement,but nothing is changed for ACTIVE query statement..