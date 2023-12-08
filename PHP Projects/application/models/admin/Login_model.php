<?php
class Login_model extends CI_Model{

	function login($data){
		// echo "<pre>";print_r($data);exit;
		$sql = 	$this->db->select('*')
						 ->from('admin')
						 ->where('email',$data['email'])
						 ->where('password',md5($data['password']))
						 ->get()
						 ->row();
		return $sql;

	}
}
?>