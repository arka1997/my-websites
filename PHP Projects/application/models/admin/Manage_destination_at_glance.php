<?php
if(!defined('BASEPATH')) EXIT("No direct script access allowed");
class Manage_destination_at_glance extends CI_Model{

	public function show_data_id($table_name,$id,$fieldname,$action,$data)
{
	if($action=='get')
	{
		if(($id !='') && ($fieldname!='')&& ($data==''))
		{
			$this->db->select ('*'); 
			$this->db->from($table_name);
			$this->db->where($fieldname,$id);
			$query = $this->db->get();
			$result = $query->result();
			return $result;
		}
		else
		{
			$this->db->select ('*'); 
			$this->db->from($table_name);
			$query = $this->db->get();
			$result = $query->result();
			return $result;
		}
	}

	    if($action=='insert'){
		$return = $this->db->insert($table_name, $data);
		  if ((bool) $return === TRUE) {
			return $this->db->insert_id();
		   }else {
			return $return;
		  }       
	    }
	    if($action=='update'){
		$this->db->where($fieldname, $id);
		$return=$this->db->update($table_name, $data);
		return $return;
	     }
	    if($action=='delete'){
		$this->db->where($fieldname, $id);
		$this->db->delete($table_name);
	      }
        }



        // function check_status($id){
        // 	$sql = $this->db->select('*')
        // 			 		->from('siteseeing_details')
        // 	 		 		->where('siteseeing_id',$id)
        // 			 		->get()->row();
		// 	return $sql;
        // }

        function siteseeing_images($id){
        	$this->db->select('*');
			$this->db->from('siteseeing_images');
			$this->db->where('siteseeing_details_id',$id);
			$query = $this->db->get();
			return $query->result();
        }
}
?>