<?php

if (!defined('BASEPATH')) EXIT("No direct script access allowed");

function common_viewloader($viewfilepath = '', $param = array(), $title='')
{
    $CI = &get_instance();
    $data = array();
    //print_r($param);exit;
    $data['title'] = $title;

    $CI->load->view('header',$data);
    $CI->load->view('navbar');
    $CI->load->view('sidebar');

    if ($viewfilepath != '')
    {
        $CI->load->view($viewfilepath, $param);
    }

    $CI->load->view('footer');
}

?>
