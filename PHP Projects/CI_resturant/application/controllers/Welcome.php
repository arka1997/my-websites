<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller{
    function __construct() 
	{
        parent::__construct();
    } 
    function index(){
        $title = 'Dashboard';
        common_viewloader('main_view','',$title);
    }
    
}

?>