<?php

if(!defined('BASEPATH')) EXIT('No direct script access allowed');

class Dashboard extends My_Controller 
{
	function __construct()
	{
		parent::__construct();

		$this->admin_session_checked($is_active_session = 1);
	}

	function index()
	{
		$title = "Dashboard";
		//echo $this->session->admin->password;exit;
		common_viewloader('admin/pages/index','',$title);
	}
}

?>