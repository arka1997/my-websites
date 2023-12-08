<?php
//error_reporting(1);
	class user_model extends CI_Model
	{
	
		function user_check()
		{
			$uid=$this->input->post('user');
			$pass=$this->input->post('pass');	
					
			$i=0;
			$data=array();
			
				$rows=$this->db->query("select * from login where uid='" . $uid . "'" . " and pass='" . $pass . "'");
				foreach($rows->result() as $row)
				{
				$data[$i]=array(
							'uid'=>$row->uid,
							'pass'=>$row->pass,
							'usertype'=>$row->usertype
				);
				$i++;
				}
			
			return $data;
			
		}
}
/*
	function add_product()
		{
			$data=array();
			$data=array(
						'uname'=>$this->input->post('uname'),
						'pass'=>$this->input->post('pass'),
						'usertype'=>$this->input->post('usertype')
			
			);
			
			$this->db->insert("user",$data);
		}
		
//echo anchor($url.'user/add/','Add new user');
*/
?>