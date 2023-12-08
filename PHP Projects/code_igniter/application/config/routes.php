<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method


1)What are Routes?
 Routes are responsible for responding to URL requests.
 Routing matches the URL to the pre-defined routes.
 If no route match is found then, CodeIgniter throws a
 page not found an exception.
 this are kind SEARCH ENGINES to locate something,like if 
 user writes contact,then we will show contact related 
 details in web page..
*/

$route['default_controller'] = 'user';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
//http://localhost/code_igniter/site/deba/1
//here localhost is the server name,site is the controller name,deba is the method name,'1' is the parameter name..
$route["site/method-info"]="site/method";//so here if we write the method naame as king-info,instead of king,then also it will redirect me to the king page because of this line
$route["site/contact"]="site/contact_info";//to locate or open contact_info in browser we can write or set the URL to site/contact or site/deba instead of site/contact_info
$route["site/deba"]="site/contact_info";
$route["site/service"]="site/service";//here if we write '$1' in site/service/$1 then only it wil pas parameter values..
$route["site/variable"]="site/pass_var";
$route["site/insert"]="site/data_totable" ;