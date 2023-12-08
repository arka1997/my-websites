<?php

if (!defined('BASEPATH')) EXIT("No direct script access allowed");
ob_start();

class MY_Controller extends CI_Controller 
{
    function __construct() 
    {
        parent::__construct();   

        $this->load->model('admin/Login_model');   
        $this->load->model('admin/Manage_tags');
        $this->load->model('admin/Manage_destination');
        $this->load->model('admin/Manage_siteseeing');
        $this->load->model('admin/Manage_packages');   
        $this->load->model('admin/Manage_banner'); 
        $this->load->model('admin/Manage_enquiry');  
        $this->load->model('front/Manage_cms');  
        $this->load->model('admin/Manage_customize_package'); 
        $this->load->model('admin/Manage_customer_comments');
        $this->load->model('admin/Manage_full_width_banner'); 
        $this->load->model('admin/Manage_why_choose_us');   
        $this->load->model('admin/Manage_destination_at_glance');  
    }

    public function set_admin_session($admindata = array()) 
    {
        $admin_id = 0;

        if (!empty($admindata)) 
        {
            if (is_object($admindata)) 
            {
                $admin_id = $admindata->id;
            } 
            else if (is_array($admindata)) 
            {
                $admin_id = $admindata['admin_id'];
            }

            if ($admin_id > 0) 
            {
                $this->session->set_userdata('admin', $admindata);
            }
        }
    }

    public function destroy_admin_session() 
    {
        if ($this->session->has_userdata('admin')) 
        {
            $this->session->unset_userdata('admin');
        }
    }

    public function admin_session_checked($is_active_session = 1) 
    {
        if ($is_active_session) 
        {
            if (!$this->session->has_userdata('admin')) 
            {
                redirect('admin/admin_login');
            }
        } 
        else 
        {
            if ($this->session->has_userdata('admin')) 
            {
                redirect('admin/dashboard');
            }
        }
    } 

    public function set_user_session($userdata = array()) 
    {
        $user_id = 0;

        if (!empty($userdata))
        {
            if (is_object($userdata)) 
            {
                $user_id = $userdata->id;
            } 
            else if (is_array($userdata)) 
            {
                $user_id = $userdata['user_id'];
            }

            if ($user_id > 0) 
            {
                $this->session->set_userdata('user', $userdata);
            }
        }
    }

    public function destroy_user_session() 
    {
        if ($this->session->has_userdata('user')) 
        {
            $this->session->unset_userdata('user');
        }
    }

    public function user_session_checked($is_active_session = 1) 
    {
        if ($is_active_session) 
        {
            if (!$this->session->has_userdata('user')) 
            {
                redirect('wesite/Login/login');
            }
        } 
        else 
        {
            if ($this->session->has_userdata('user')) 
            {
                redirect(base_url());
            }
        }
    }   
}

?>