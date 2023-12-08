<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class wlcm_control extends CI_Controller 
{
    public function index()
    {
        $this->load->view('welcome_form');
    }
    public function forms()
    {
        $date=$this->input->post('date');
        $company=$this->input->post('company');
        //print_r($company);exit;
        $sql=$this->db->insert('form_tbl',['date'=>$date,'company'=>$company]);
        $last_id=$this->db->insert_id();
        //print_r($last_id);exit;
        //print_r($sql);exit;
        $username=$this->input->post('username');//$username[0]="deba",$username[1]="arka"
        $password=$this->input->post('password');//$password[0]="1234",$password[1]="4321"
        foreach($username as $key=>$val){
            print_r($data['user_id']=$last_id);
            print_r($data['username']=$val);//$val="deba", 'username' is the key
            print_r($data['password']=$password[$key]);//$password[0]="1234", 'password' is the key, $key=0 for first index, and then become $key=1 on increment
            $this->db->insert('username_tbl',$data);//this will insert values one by one
        }
        
        //print_r($data);exit;
    }
}
