<?php
class Manage_packages extends CI_Model{
public function count_rating($ids){
    // Do the average rating of packages and show n data table ????????  \\
    $data =$this->db->select('count(`rating`) As avg_r',FALSE)
                    ->from('packages_review')
					->where('id',$ids)
                    ->get()->row();
                    return $data;
}
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

	function delete_multi_img($val_img){
    //$sqls = $this->login_model->dlt_multiple_upload_item($id);
    $this->login_model->delete_multiple_id($val_img);
    
    unlink('./uploads/packages/'.$val_img);
    redirect('packages/index');
}

	
	 
}
?>