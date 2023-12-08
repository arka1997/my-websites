<?php
class login_model extends CI_Model{
    
    function fetch_adminData($data){
        $val = $this->db->select('*')
                 ->from('admin_tbl')
                 ->where('email',$data['email'])
                 ->where('password',$data['password'])
                 ->get();
                 return $val->row();
    }
    function fetch_data_list(){
        $sql = $this->db->select('*')
                 ->from('food_item_list')
                 ->get();
                 return $sql->result();
    }

    function fetch_multi_img(){
        $sql = $this->db->select('*')
                 ->from('food_item_list')    
                 ->join('multiple_food_image','multiple_food_image.food_item_id = food_item_list.id')
                 ->get();
                 return $sql->result();
    }

    function insert_menu_form($data){
        //print_r($data);exit;
        $this->db->insert('food_item_list',$data);
    }

    function image_upload_multiple($data){
        //echo "<pre>";print_r($data);exit;
        $this->db->insert('multiple_food_image',$data);
    }

function edit_tbl_item($id){
    $sql = $this->db->select('*')
             ->from('food_item_list')
             ->where('id',$id)
             ->get();
             return $sql->row();
}

function delete_menu($id){
    $this->db->where('id',$id)
             ->delete('food_item_list');
}

function edit_tbl_multiple($id){
    $sql = $this->db->select('*')
    ->from('multiple_food_image')
    ->where('food_item_id',$id)
    ->get();
    return $sql->result();
}

function update_menu($data,$id)
{
   //echo "<pre>";print_r($_FILES);exit;
   $this->db->where('id',$id)
            ->update('food_item_list',$data);
}

function insert_image_upload_multiple($data,$id){
    
    $this->db->insert('multiple_food_image',$data);
}

function delete_multiple_id($val_img){
    $this->db->where('food_images',$val_img)
             ->delete('multiple_food_image');
}

function dlt_upload_item($id){
    $data=$this->db->select('*')
    ->from('food_item_list')
    ->where('id',$id)
    ->get();
    return $data->row_array();
}

}
?>