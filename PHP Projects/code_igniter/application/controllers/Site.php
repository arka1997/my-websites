<?php
class Site extends CI_Controller {
	public function __construct()//this line means it is used to call the parent class i.e.,CI_controller
	{
		parent::__construct();//You only need to add parent::__construct(), if you are doing something in your __construct().
			////here construct denotes "CI",and we working in CI only,so we define parent::__construct
	
		$this->load->model("site_model");//here we include the model file
	}
	public function index()
	{   /*  $message=$this->site_model->val_sop();//here we load the functions in model files
		$info_array=array(
		"organisation"=>"kingdom",//first key then value
		"love"=>"SOfssddI",
		"house"=>"tomluk",
		"message"=>"$message"
		);
		
		//$this->load->view('header',$info_array);
		//$this->load->view('site_index',$info_array);
		//$this->load->view('footer',$info_array);
		$this->load->view("tuban",$info_array);
		*/
		$data=array(
		"name"=>"kingdom",//first key then value
		"email"=>"SOfssddI",
		"phone_no"=>"791218720"
		);
		echo $this->site_model->insert_totable($data);
	}
	public function king()
	{
		$this->load->view("tuban");
	}
	function contact_info()
	{
		echo "<h1>this is contact info</h1>";
	}
	function service($id = "")//function method name/parameter
	{
		echo "<h1>cum'on i will hug you tonight</h1>" .$id;//here we fetch the number value from url box if any
	}
	function pass_var()
	{
		/*$info_array=array(
		"organisation"=>"kingdom",//first key then value
		"love"=>"SOfssddI",
		"house"=>"tomluk"
		);
		/*$info_array["dream"]="woodenhouse";
		$info_array["place"]="artic";
		$info_array["status"]="single";*/
		$this->load->view("pass_variable",$info_array);
	}
	function insert_totable() {
		$data=array(
		"name"=>"kingdom",//first key then value
		"email"=>"SOfssddI",
		"phone_no"=>"791218720"
		);
		echo $this->site_model->insert_totable($data);
}
}
?>