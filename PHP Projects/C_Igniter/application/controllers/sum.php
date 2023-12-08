<?php
class sum extends CI_Controller 
{		
        public function __construct()
        {
                parent::__construct();//by calling this, we call the CI_Controller class's constructor, and initialise the constructor value inside that constructor of parent class                                                                                                                                                                                                     
                //$this->load->model('Sum_Model');//here we declare the model and the class name used inside (''),this is like new object "Sum_Model" is created and we use the object to call any function in model ex., $this->Sum_Model->getdata() , syntax $this->object_name->function_name
                //we can avoid the above line by declaring the file name in autoload
        }
        public function get_data()
        {
                //echo TEST;exit;//in constants file, this value of "TEST" is already defined as "123"
                //only for getting data, i.e., for accessing model we can use below syntax
                $data = $this->Sum_Model->getdata();//calling model file named "sum model" from here and for fetching we use autoload for this
                //and storing the values returned from sum_Model in variable $data
                $view_data['details'] = $data;//it is storing the data in array format

                //echo "<pre>"; print_r($data);exit;//printing data will show undefined..
                //echo "<pre>"; print_r($view_data);//prints the variable "$view_data" in array format
                //$this->load->view('add', $view_data);//this only used to sent the resource to $this->load->view('file name','variable name')
        }
        function deba(){
                //another way without auto upload
                //$this->load->model('Sum_Model');
                //$data=$this->Sum_Model->gets();

                $data=$this->Sum_Model->gets();
                $blue['fg']=$data;
                //print_r($blue);
                //$this->load->view('result',$blue);
        }
}
//Without CI framework
// class CI_controller{
//         public function view($val)
//         {
//                 echo "hii".$val;
//         }
// }
// class bal extends CI_controller{
//         public $load;//this is a property
//         public function __construct(){
//                 $load=new CI_controller();
//         }
//         public function get(){
//                 $this->load->view("yo");//$this->load is a super object which is defined in the super class
//         }
// }
