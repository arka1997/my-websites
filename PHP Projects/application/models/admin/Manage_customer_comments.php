<?php
class Manage_Customer_comments extends CI_Model{

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
   public function getAllData($table_name,$primary_key,$wheredata,$limit,$start)
   {
		if(@$limit!='' || @$start!='')
		{
			$this->db->order_by('id', 'DESC');
			$this->db->limit($limit, $start);
		}
		$this->db->select ('*'); 
		$this->db->from($table_name);
		if($primary_key=='' && $wheredata=='')
		{
			$where='1=1';
		}
		else
		{
			$this->db->where($primary_key,$wheredata);
		}
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}
	
	function fetch_edit_details($id){
		
			$this->db->select ('*'); 
			$this->db->from('customer_comments');
			$this->db->where('id',$id);
			$query = $this->db->get();
			$result = $query->row();
			return $result;
	}
}
?>