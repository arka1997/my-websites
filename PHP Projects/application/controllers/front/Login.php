<?php

if (!defined('BASEPATH')) EXIT("No direct script access allowed");

class Login extends My_Controller
{
	function __construct()
	{
		parent::__construct();
	}

	public function login()
	{
		$title = 'Travel | Account login';

		web_viewloader('front/login', '', $title);
	}

	public function registration()
	{
		$title = 'Travel | Account login';

		web_viewloader('front/registration', '', $title);
	}
}

?>