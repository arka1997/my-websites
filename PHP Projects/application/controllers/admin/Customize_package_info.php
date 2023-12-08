<?php
if (!defined('BASEPATH')) exit("No direct script access allowed");
class Customize_package_info extends My_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->admin_session_checked($is_active_session = 1);
	}
	function index()
	{
		$title = 'Customize Package';
		$data['customize_package']= $this->Manage_customize_package->show_data_id('customize_package_tbl','','','get','');
        
  	    common_viewloader('admin/cms/customize_package/customize_package_listing_tbl',$data,'');
    }

    function delete_customize_package($id){
        
		$data['customize_package']= $this->Manage_customize_package->show_data_id('Customize_package_tbl',$id,'id','delete','');
        redirect('admin/customize_package_info/');
    }
}
?>