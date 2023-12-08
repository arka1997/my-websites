<?php

defined('BASEPATH') OR exit('No direct script access allowed');

$route['front'] = 'front/cms';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['form'] = "cms";
$route['formPost']['post'] = "cms/formPost";


$route['admin'] = 'admin/Admin_login';
