<?php
class Manage_cms extends CI_Model{

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
	function get_specific_packages($package_name,$cost,$days){
		$this->db->select('*');
		$this->db->from('packages');
		$this->db->where('find_in_set("'.$package_name.'", package_name) <> 0');
		$this->db->where('packages.cost<=', $cost);
		$this->db->where('packages.days<=', $days);
		$this->db->where('status', 1);
		$data2 = $this->db->get(); 
		return $data2->result();
	}

			function get_specific_destination($destination_ids){
				$this->db->select('id');
				$this->db->from('destination');
				$this->db->where('find_in_set("'.$destination_ids.'", destination_name) <> 0');
				$this->db->where('status', 1);
				$data2 = $this->db->get(); 
				return $data2->result();
			}

			function get_specific_packages_list($destination_name,$cost,$days){
				$this->db->select('*');
				$this->db->from('packages');
				$this->db->where('find_in_set("'.$destination_name.'", destination_ids) <> 0');
				$this->db->where('packages.cost<=', $cost);
				$this->db->where('packages.days<=', $days);
				$this->db->where('status', 1);
				$data2 = $this->db->get(); 
				return $data2->result();
			}
			
			function fetch_destination_at_glance(){
				$this->db->select ('*'); 
			$this->db->from('destination_at_glance');
			$query = $this->db->get();
			$result = $query->row();
			return $result;
			}

			function fetch_full_width_banner(){
				$this->db->select ('*'); 
			$this->db->from('full_width_banner');
			$query = $this->db->get();
			$result1 = $query->row();
			return $result1;
			}
			
}
?>