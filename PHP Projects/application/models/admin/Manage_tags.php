<?php
class Manage_tags extends CI_Model{
public function show_data_id($table_name,$id,$fieldname,$action,$data=array()){
		if($action=='get'){
			if(($id !='') && ($fieldname!='')&& ($data=='')){
				$this->db->select ('*'); 
				$this->db->from($table_name);
				$this->db->where($fieldname,$id);
				$query = $this->db->get();
				$count = $query->num_rows();
				if($count>1){
					$result = $query->result();
					return $result;
				}
				else{
				$result = $query->row();
				return $result;
				}
			}else{
				$this->db->select ('*'); 
				$this->db->from($table_name);
				$query = $this->db->get();
				$result = $query->result();
				return $result;
			}
			  }
		    if($action=='insert'){

		    	foreach($data['tags'] as $key=>$val){

		    		  //echo "<pre>";print_r($data );exit;
		    		$datas['tag_name'] = $val;
		    		$datas['status'] = $data['status'][$key];	
					$return = $this->db->insert($table_name, $datas);
			  }
			   if ((bool) $return === TRUE) {
				return $this->db->insert_id();
			   }else {
				return $return;
			  }       
		    }
		    if($action=='update'){
		    	// echo "<pre>";print_r($data );exit;
		    	$datas['tag_name'] = $data['tags'];
		    	$datas['status'] = $data['status'][0];
		    	// print_r($data['status'][0]);exit;
			$this->db->where($fieldname, $id);
			$return=$this->db->update($table_name, $datas);
			return $return;
		     }
		    if($action=='delete'){
			$this->db->where($fieldname, $id);
			$this->db->delete($table_name);
		      }
	        }

	        function fetch_siteseeing_data($id){
	        	$this->db->select('*');
	        }
    }
?>