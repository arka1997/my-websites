<?php

if (!defined('BASEPATH')) EXIT("No direct script access allowed");

function common_viewloader($viewfilepath = '', $param = array(),$title='') 
{
    $CI   = &get_instance();
    $data = array();

    $data['title'] = $title;
    // $data['param'] = $param;

    $CI->load->view('admin/layouts/header',$data);
    $CI->load->view('admin/layouts/navbar');
    $CI->load->view('admin/layouts/sidebar');

    if ($viewfilepath != '') 
    {
        
        $CI->load->view($viewfilepath, $param);
    }

    $CI->load->view('admin/layouts/footer');
}

function web_viewloader($viewfilepath = '', $param = array(),$title='') 
{
    $CI   = &get_instance();
    $data = array();

    $data['title'] = $title;

    $CI->load->view('front/layouts/header',$data);
    $CI->load->view('front/layouts/menu');

    if ($viewfilepath != '') 
    {
        $CI->load->view($viewfilepath, $param);
    }

    $CI->load->view('front/layouts/footer');
}

if(!function_exists('pr')) 
{
    function pr($display_data = array()) 
    {
        if (!empty($display_data)) 
        {
            echo "<pre>";
            print_r($display_data);
            echo "</pre>";
        }
    }
}

?>