<?php
class Action_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	public function sel()
	{	//this is the statement for select query and users is the table name
		//$this->db->select("*");
		//this actually "get" returns the actual querry,Here returns "SELECT * FROM users"
		//$query=$this->db->get("users");
		//here we run the above generated query using result() function and returns value to print_r in array format.. 
		//return $answer=$query->result();
		//ANOTHER WAY OF FETCHING
		$this->db->select("name,email");
		$this->db->from("users");
		//this is for "WHERE" condition
		//$this->db->where("id","4");
	//this "GET" method generates a query "SELECT name FROM users"
		$query=$this->db->get();//this results the entire raw query...
		return $answer=$query->result();//executes the query

	}
	public function bel()
	{
	$data=array(
	"name" => "deba",
	"email" => "bbbdf@",
	"phone_no" => "23123123"
	);
	$this->db->where("id",1);
	$this->db->update("users",$data);
	return True;
	//WHERE condiotion FORMATS
	//a)$this->db->where("amount >=",4000)//this targets a row,named amount,and fetches all rows with amount > 4000...
	
	//b)$this->db->where("id",1);
	$this->db->or_where("email","deba@gmal.com");
	}
	function deleted()
	{
		//$this->db->where("id",2);
		//return $this->db->delete("users");
		//this will produce
		//DELETE FROM users WHERE id=1;
		
		//ANOTHER WAY
		//return $this->db->delete("users",array( "id" => 4 ));
	}

}
?>

<!--result() =>returns std objects in array format and multiple array format
result_array() => returns values of all rows in multiple array format..
row() => Return single "std object" with onle keys and value in brackets,and no extra writting..
row_array() => returns any single row in array ..
-->