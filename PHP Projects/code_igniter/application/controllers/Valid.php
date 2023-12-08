<?php
class Valid extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
			//include a model file to work with database
			$this->load->model("action_model");
			$this->load->helper(array("form","url"));
	}
	function gets()
	{	//this will load the view file of the form
		$this->load->view("form");
		
}
function sets()
{
	$data=$this->input->post();
	//here we have to include our input type "name=txt_name" parameter..
	echo $data["txt_name"];
}
//this is used for form validation security purpose,
//set_rules is used to set the required rule, i.e., you can't set the text boxes empty..
$this->form_validation->set_rules("txt_name","name","required ");//first is name of input txt,second is label name,and 'required is the rule..

//run() is a function which will check the form is successfully passes throught the set rules or not,and returns boolean value
if($this->form_validation->run()== FALSE)
	
	//this will print all the error messages inside the form
	echo validation_errors();
	
	//this form error() func. returns the error message inside brackets for the text box with name="txt_name"..
	<?php echo form_error("txt_name","Name is required"); ?>
}
?>