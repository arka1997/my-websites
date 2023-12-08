<?php

if (!defined('BASEPATH')) exit("No direct script access allowed");

class Cms extends My_Controller
{
	function __construct()
	{
		parent::__construct();
		// $this->load->model('Manage_cms');
	}

	public function index()
	{
		$title = 'Travel | Home';
		// fetching banner images with status 1
		$data['image'] = $this->Manage_cms->show_data_id('banner', 1, 'status', 'get', '');

		$data['destination'] = $this->Manage_cms->show_data_id('destination', '', '', 'get', '');

		$data['packages'] = $this->Manage_cms->show_data_id('packages', '', '', 'get', '');

		$data['comments'] = $this->Manage_cms->show_data_id('customer_comments', '', '', 'get', '');
		$data['destination_review'] = $this->Manage_cms->show_data_id('destination_review', '', '', 'get', '');
		$data['why_choose_us'] = $this->Manage_cms->show_data_id('why_choose_us', '', '', 'get', '');
		$data['full_width_banner'] = $this->Manage_cms->fetch_full_width_banner();
		$data['destination_at_glance'] = $this->Manage_cms->fetch_destination_at_glance();
		// echo "<pre>";print_r($data);exit;
		web_viewloader('front/pages/home', $data, $title);
	}
	function banner_upload()
	{
		$title = 'Travel | Home';
	}
	function show_images()
	{
		$title = "Package Images";
		$data = $this->input->post();
		// echo "<pre>";print_r($data);exit;
		$package_name = $this->input->post('destination_package');
		$cost = $this->input->post('cost');
		$start_date = $this->input->post('start_date');
		$end_date = $this->input->post('end_date');
		$start = explode('-', $start_date);
		$end = explode('-', $end_date);
		$days = ($end[2] - $start[2]) + 1;
		// foreach($package as $d){
		// echo "<pre>";print_r($d);exit;
		// $data2['packages'] = $this->Manage_cms->get_specific_packages($d,$cost);
		// }
		$data2['packages'] = $this->Manage_cms->get_specific_packages($package_name, $cost, $days);
		// echo "<pre>";print_r($data2);exit;
		if ($data2['packages']) {

			web_viewloader('front/pages/package_cards', $data2, $title);
		} elseif ($data2['packages'] == FALSE) {
			// echo "<pre>";echo "hi";print_r($data2);exit;
			$data3 = $this->Manage_cms->get_specific_destination($package_name);
			// echo "<pre>";echo "hi";print_r($data3);exit;
			if ($data3) {
				foreach ($data3 as $d) {
					$data4['packages'] = $this->Manage_cms->get_specific_packages_list($d->id, $cost, $days);
					web_viewloader('front/pages/package_cards', $data4, $title);
				}
			} else {
				echo "<script>
alert('No such package / destination name exists!');
document.location='index';
</script>";
			}
		}
	}

	function customize_package_details()
	{
		$custom_package = $this->input->post();
		$this->Manage_cms->show_data_id('customize_package_tbl', '', '', 'insert', $custom_package);
		redirect('front/cms/');
	}
	function load_packages()
	{
		$title = "Package List";
		$data['packages'] = $this->Manage_cms->show_data_id('packages', '', '', 'get', '');
		web_viewloader('front/pages/all_package_list', $data, $title);
	}
	function load_destinations()
	{
		$title = "Destination List";
		$data['destinations'] = $this->Manage_cms->show_data_id('destination', '', '', 'get', '');
		web_viewloader('front/pages/all_destination_list', $data, $title);
	}
	function load_variation_packages()
	{
		$title = "Package List";

		$package_name = $this->input->post('destination_package');
		$cost = $this->input->post('cost');
		$start_date = $this->input->post('start_date');
		$end_date = $this->input->post('end_date');
		$start = explode('-', $start_date);
		$end = explode('-', $end_date);
		$days = ($end[2] - $start[2]) + 1;
		// foreach($package as $d){
		// echo "<pre>";print_r($d);exit;
		// $data2['packages'] = $this->Manage_cms->get_specific_packages($d,$cost);
		// }
		$data2['packages'] = $this->Manage_cms->get_specific_packages($package_name, $cost, $days);
		if ($data2['packages']) {
			// echo "hi";exit;
			web_viewloader('front/pages/all_package_list', $data2, '$title');
		} 
		elseif ($data2['packages'] == FALSE) {
			
			// echo "<pre>";echo "hi";print_r($data2);exit;
			$data3 = $this->Manage_cms->get_specific_destination($package_name);
			if ($data3) {
				foreach ($data3 as $d) {
					$data4['packages'] = $this->Manage_cms->get_specific_packages_list($d->id, $cost, $days);
					web_viewloader('front/pages/all_package_list', $data4, '');
				}
			} else {
				echo "<script>
				alert('No such package / destination name exists!');
				document.location='load_packages';
				</script>";
			}
		}
	}

	public function formPost()
	{
		$recaptchaResponse = trim($this->input->post('g-recaptcha-response'));

		$userIp = $this->input->ip_address();

		$secret = $this->config->item('google_secret');

		$url = "https://www.google.com/recaptcha/api/siteverify?secret=" . $secret . "&response=" . $recaptchaResponse . "&remoteip=" . $userIp;

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$output = curl_exec($ch);
		curl_close($ch);

		$status = json_decode($output, true);

		if ($status['success']) {
			print_r('Google Recaptcha Successful');
			exit;
		} else {
			$this->session->set_flashdata('flashError', 'Sorry Google Recaptcha Unsuccessful!!');
		}

		redirect('form', 'refresh');
	}
}
