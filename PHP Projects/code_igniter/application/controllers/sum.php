<?php
//with CI framework
	class sum extends CI_Controller
	{
		var $dt;
		
		public function __construct()
		{
			parent::__construct();
			$this->dt=array();
			
				
		}
		
		function add()
		{
			$this->load->view('add');//loading the view file and calling the file name "add" like(form values) in controller
			if($this->input->post("ADD"))//checks if user has clicked the button
			{
				$x=$this->input->post("t1");
				$y=$this->input->post("t2");
				$z=$x+$y;
				$this->dt['sum']=$z;
				$this->load->view('result',$this->dt);//this is the way to send some new values to the view file for displaying in the screen
			}
		}
	}
//Without CI framework
// class CI_controller{
//         public function view($val)
//         {
//                 echo "hii".$val;
//         }
// }
// class sum extends CI_controller{
//         public $load;
//         public function __construct(){
//                 $load=new CI_controller();
//         }
//         public function add(){
//                 $this->load->view("yo");
//         }
// }
?>