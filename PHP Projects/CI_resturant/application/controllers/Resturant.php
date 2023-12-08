<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Resturant extends CI_Controller{
    function __construct() 
	{
        parent::__construct();
        $this->load->model('login_model');
        $session = $this->session->has_userdata('email');
        if(!$session){
            redirect('Admin/index');
        }
    } 

    function index(){
        $title = 'Resturant_DataTable';
            $data['resturants'] = $this->login_model->fetch_data_list();
        //$data['multi_img'] = $this->login_model->fetch_multi_img();
        //echo "<pre>";print_r($data);exit;
        common_viewloader('resturant_dataTable',$data,$title);
    }

function display_UI(){
    $card_data = $this->login_model->fetch_data_list();
    //echo "<pre>";print_r($card_data);exit;
    $this->load->view('ui_show_cards',['card_data'=>$card_data]);
}

    function add_menu_form(){
        $title = 'Add Menu Form';
        common_viewloader('resturant_menu_form','',$title);
    }

    function insert_menu_form(){
        
        $this->load->library('form_validation');
        //this the structure of single file upload for [main_image] and  multiple file upload for [name] 
        //and we can fetch the files value using post, but print it in output using $_FILES.
        // Array
        // (
        // [main_image] => Array
        //                     (
        //                         [name] => IMG-20180813-WA0022.jpg

        // [file] => Array
        //     (
        //         [name] => Array
        //             (
        //                 [0] => IMG_20190919_115923.jpg
        //                 [1] => IMG-20180813-WA0025.jpg
        //             )
        //     )
        // )
        $this->form_validation->set_rules('food_type'  , 'Food type' , 'required');
        $this->form_validation->set_rules('food_item'  , 'Food item' , 'required');
        $this->form_validation->set_rules('food_price'  , 'Food price' , 'required');
        $this->form_validation->set_rules('description'  , 'Food desc' , 'required');
        if($this->form_validation->run())
        {
            $config=[
                'upload_path'   => './upload/',
                'allowed_types' => 'gif|png|jpg',
            ];
            
            $this->load->library('upload',$config);
            $this->upload->overwrite = true;
            if($this->upload->do_upload('image'))
            {
            $val = $this->input->post();
            // echo "<pre>";
            // print_r($val);
            // print_r($_FILES);exit;
            $data1    =   $this->upload->data();
            $image_path    =   $data1['raw_name'].$data1['file_ext'];
            $val['food_image']  =   $image_path;

            $ids = $this->login_model->insert_menu_form($val);
            $last_id = $this->db->insert_id($ids);
            
            //echo "$last_id";exit;
            $count = count($_FILES['images']['name']);

            for($i=0;$i<$count;$i++){

            if(!empty($_FILES['images']['name'][$i])){
                
                $_FILES['files']['name']     = $_FILES['images']['name'][$i];
                $_FILES['files']['tmp_name'] = $_FILES['images']['tmp_name'][$i];
                $_FILES['files']['size']     = $_FILES['images']['size'][$i];
                
                $config['upload_path']       = './upload/test/';
                $config['allowed_types']     = 'jpg|png|gif';
                $config['overwrite'] = TRUE;
                $this->load->library('upload',$config);
                $this -> upload -> initialize($config);//this initialize function is used when 'upload' & 'config' are declared in autoload library

                if($this -> upload -> do_upload('files')){//"do upload" will upload the function and store the files in the upload folder in server
                    
                    $data['food_images'] = $_FILES['images']['name'][$i];//here fetching the names of every imae name and storing it in an $data array with the columnname "image" combined together as $data['image']
                    $data['food_item_id']= $last_id;
                    //print_r($data);
                    $this->login_model->image_upload_multiple($data);
                    
                }
            }
            }
        }
        redirect('Resturant/index');
        }
    }

function resturant_edit($id){
    $data['resturant'] = $this->login_model->edit_tbl_item($id);
    $data['images'] = $this->login_model->edit_tbl_multiple($id);
    //echo "<pre>";print_r($data);exit;

    $title = 'Add Menu Form';
    common_viewloader('edit_resturant_menu_form',$data,$title);
}

function update_insert_menu_form($id){
    // $data=$this->input->post();
    // echo "<pre>";print_r($data);print_r($_FILES);exit;
    //if($_FILES['file']['name']==""){
    
    $config=[
        'upload_path'   => './upload/',
        'allowed_types' => 'gif|png|jpg',
    ];
    
    $this->load->library('upload',$config);
    //$this->upload->overwrite = true;
    if($this->upload->do_upload('image')){

    $val = $this->input->post();
    $data1    =   $this->upload->data();
    if($data1['raw_name']!=""){
    $image_path    =   $data1['raw_name'].$data1['file_ext'];
    $val['food_image']  =   $image_path;
    //print_r($val);exit;
    
    $sql = $this->login_model->dlt_upload_item($id);
    //print_r($sql);exit;
    unlink('./upload/'.$sql['food_image']);//we are deleting the item from upload folder
    }
    $ids = $this->login_model->update_menu($val,$id);//here we, after unlinking we willupdate the value in the database
}
    //Upload multiple files
    $count = count($_FILES['images']['name']);
    //echo $count;exit;
    
        
    for($i=0;$i<$count;$i++){

    if(!empty($_FILES['images']['name'][$i])){
        //if($count!=0){
        $_FILES['files']['name']     = $_FILES['images']['name'][$i];
        $_FILES['files']['tmp_name'] = $_FILES['images']['tmp_name'][$i];
        $_FILES['files']['size']     = $_FILES['images']['size'][$i];
        
        $config['upload_path']       = './upload/test/';
        $config['allowed_types']     = 'jpg|png|gif';
        //$config['overwrite'] = TRUE;
        $this->load->library('upload',$config);
        $this -> upload -> initialize($config);//this initialize function is used when 'upload' & 'config' are declared in autoload library

        if($this->upload -> do_upload('files')){//"do upload" will upload the function and store the files in the upload folder in server
            
           $data['food_images'] = $_FILES['images']['name'][$i];//here fetching the names of every imae name and storing it in an $data array with the columnname "image" combined together as $data['image']
            $data['food_item_id']= $id;

            
        }
    //}
            $this->login_model->insert_image_upload_multiple($data,$id);
        
    }
    }
        redirect('Resturant/index');
    }

//}

function delete_multi_img($val_img){
    //$sqls = $this->login_model->dlt_multiple_upload_item($id);
    $this->login_model->delete_multiple_id($val_img);
    
    unlink('./upload/test/'.$val_img);
    redirect('Resturant/index');
}

function resturant_delete($id){
    //echo "hi";exit;
    $this->login_model->delete_menu($id);
    redirect('resturant/index');

}

}

?>