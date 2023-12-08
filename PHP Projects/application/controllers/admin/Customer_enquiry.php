<?php
if (!defined('BASEPATH')) exit("No direct script access allowed");
class Customer_enquiry extends My_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->admin_session_checked($is_active_session = 1);
	}
	function index()
	{
		$title = 'Enquiry';
		$enquiry= $this->Manage_enquiry->show_data_id('customer_enquiry','','','get','');

		$data['enquiry_dtl'] = array();
        if($enquiry){
		foreach($enquiry as $e){
			$enquiry= $this->Manage_enquiry->show_data_id('enquiry_notes',$e->id,'customer_enquiry_id','get','');
            if($enquiry){
                $status = 1;
            }
            else{
                $status = 0;
            }
			$data['enquiry_dtl'][] = (object)array(
				'id'=> $e->id,
				'query_id'=> $e->query_id,
				'date'=> $e->date,
				'customer_name'=> $e->customer_name,
				'email_id'=> $e->email_id,
				'contact'=> $e->contact,
				'location'=> $e->location,
				'tour_date'=> $e->tour_date,
				'destinations'=> $e->destinations,
				'est_budget'=> $e->est_budget,
                'status' => $status
			);
		}
    }
        //  echo "<pre>";print_r($data);exit;
		common_viewloader('admin/customer_enquiry/customer_enquiry_list', $data , $title);
	}

    function ajax_fetch_enquiry(){
            $id = $this->input->post('id');
            $datas = $this->Manage_enquiry->show_data_id('customer_enquiry',$id,'id','get','');
            $this->output->set_output(json_encode($datas));
    }

    function ajax_fetch_notes(){
        $id = $this->input->post('id');
        $note = $this->Manage_enquiry->show_data_id('enquiry_notes',$id,'customer_enquiry_id','get','');
        $this->output->set_output(json_encode($note));
    }

    function add_notes($id){
        $title = "Notes";

        $data['id'] = $id;
        // print_r($data);exit;
		common_viewloader('admin/customer_enquiry/add_notes', $data , $title);

    }
    function insert_notes($id){
        $data = $this->input->post();
        $data['customer_enquiry_id'] = $id;
        $this->Manage_enquiry->show_data_id('enquiry_notes','','','insert',$data);
        redirect('admin/customer_enquiry/');
    }
}
?>