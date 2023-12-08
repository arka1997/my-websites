<?php
class users extends CI_Controller
{
    //constructor for checking the existence of session values
    //here we view the login page
    function _construct(){

        //parent::__construct;
        if(!$this -> session -> userdata('id'))
        { return redirect('users/login_view');}
    }

    function upload(){
        $this->load->view('form_upload');
    }

    function form_upload(){
        //echo "<pre>"; print_r($_FILES['file']['name']); exit;
        $this->load->library('form_validation');

        $this->form_validation->set_rules('name'  , 'Username' , 'trim|required|alpha|max_length[12]');
        $this->form_validation->set_rules('pswrd' , 'Password' , 'trim|required|max_length[12]');
        $this->form_validation->set_rules('pswrd2', 'Password' , 'trim|required|max_length[12]|matches[pswrd]');
        $this->form_validation->set_rules('email' , 'Password' , 'trim|required|valid_email');//|is_unique[users.email]

        if($this->form_validation->run())
        {
        $count = count($_FILES['file']['name']);
        for($i=0;$i<$count;$i++){

            if(!empty($_FILES['file']['name'][$i])){
                //echo "<pre>";
                $_FILES['files']['name']     = $_FILES['file']['name'][$i];
                // print_r($_FILES['files']['name']);
                // print_r([$i]);
                $_FILES['files']['type']     = $_FILES['file']['type'][$i];
                $_FILES['files']['tmp_name'] = $_FILES['file']['tmp_name'][$i];
                $_FILES['files']['size']     = $_FILES['file']['size'][$i];
                //print_r($_FILES['files']['size']); 
                $config['upload_path']       = './upload/test/';
                $config['allowed_types']     = 'jpg|png|gif';
                
                $this->load->library('upload',$config);
                $this -> upload -> initialize($config);//this initialize function is used when 'upload' & 'config' are declared in autoload library

                if($this -> upload -> do_upload('files')){//"do upload" will upload the function and store the files in the upload folder in server

                   $data['files'] = $_FILES['file']['name'][$i];//here fetching the names of every imae name and storing it in an $data array with the columnname "image" combined together as $data['image']
                    
                   $this->login_model->image_upload_model($data);
                    //so here at different indexes we are storing the images,and now to fetch the file name of each indexes we should use a loop. For fetching the first image we should write "$_FILES['file']['name'][$i];" and store it in an array named files as "$_FILES['files']['name']" 
                    //echo "<pre>"; print_r($_FILES['file']['name']); exit;//this will give the output as above
        //Now to store it in an array we will push each file name ['file'] to a new file name ['files']
                    //Array
                    // (
                    //     [0] => 2a081df9-fbf8-4e36-9eb5-02dc2a556d5b.jpg
                    //     [1] => 2e72360c-b72d-4c19-a44f-9153ab22fdd7.jpg
                    //     [2] => 3c46b0cb-7bf5-4d42-927d-173d7bc310cf.jpg
                    //     [3] => 8fa93103-d295-4845-b11c-7d95043d64e6.jpg
                    // )
                }
            }
        }
    }
    else{

        $this->load->view('form_upload');
    }
    }

    function login_view(){

        if($this -> session -> has_userdata('id')){//checking if we are in the dashboard page,and if the session exists then if wetry to go back to previous page i.e. the login page, then we will be redirect to the same page and back button won't work
            return redirect('users/welcome');
        }

        else{
        //else when we logged out, the session gets destroyed and we wil be redirect to the else case bcoz if case won't be true this time as sessions don't exist anymore aftr we logged out
        //$this->load->helper('url','html');//this is not needed now because it is already defined in autoload helper
        $this -> load -> view('article_list');
        }
    }

    //fetching the login values with post method
    function func1(){
        $this->load->library('form_validation');

                $this->form_validation->set_rules('email', 'Email', 'callback_username_check');
                
       
    }

    function username_check(){
        $data = $this -> input -> post();
        
        $id   = $this -> login_model -> fetch($data);//calling the fetch function and sending the data
        
        // echo "<pre>";
        // print_r($id->status);exit;
        if($id->status==1){
            
            $this -> session -> set_userdata('id',$id->id);//this is how array object is taken input
            $this -> session -> set_userdata('usertype',$id->usertype);
            $this -> session -> set_userdata('email',$id->email);

            return redirect('users/welcome');

        }
        else{
            $this -> session -> set_flashdata('Login_Failed','Invalid email and Password or you havenot verified your email');//this is creating our own session for flashing error message in login page
            return redirect('users/login_view');
        }
    }

    //here we view the dashboard profile page
    function welcome(){
       //stdClass Object ( [id] => 39 [name] => deba [email] => tuban@gmail.com [password] => 9247 [subject] => tuban [usertype] => admin )
        
       $data     =  $this -> login_model -> s_sion();
       $usertype =  $this ->   session   -> userdata('usertype');

            if($usertype=='user')
            {
                $this -> load -> view('dashboard',['data'=>$data]);
            }
            else
            {
                $this -> load -> view('Admin_profile');
            }
    }

    //here we view the registration page
    function reg_i()
    {
        $this -> load -> view('regis');

        // $send_to_mdl=$this->login_model->fetch_reg($name,$email,$password,$subject);
    }

    //here we fetch the registration values via post method
    public function reg_submit()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('name'  , 'Username' , 'trim|required|alpha|max_length[12]');
        $this->form_validation->set_rules('pswrd' , 'Password' , 'trim|required|max_length[12]');
        $this->form_validation->set_rules('pswrd2', 'Confirm Password' , 'trim|required|max_length[12]|matches[pswrd]');//
        $this->form_validation->set_rules('email' , 'email' , 'trim|required|valid_email|is_unique[login.email]');//|is_unique[users.email]

        if($this->form_validation->run())
        {
        $data       = $this -> input -> post();
        
        //  EMAIL VERIFICATION //

        $insert_id  = $this -> login_model -> fetch_reg($data);
        
        $this->email->from('deba@gmail.com','yoo');
        $this->email->to('arka@gmail.com');
        $this->email->subject('Verify your email');

        $path =  base_url("users/verification/$insert_id");
        $link = '<a href='.$path.'>Activation Link</a>';
        
        $body='name:'.$data['name'].'<br>email:'.$data['email'].'<br>'.$link;
        echo $body;exit;

        if($insert_id)
        {
            return redirect('users/reg_i');
        }
        else 
        {
            echo "Failed";
        }
    }
    else{
        $this->load->view('regis');
    }
    }
    
    function verification($id)
    {//echo $id;die;
        $this->login_model->verify_status($id);
    }

    function gg(){

        // $ids=$this->login_model->sess2();
        $ids   = $this -> login_model -> sess2();//fetching the session data

        $this -> session -> set_flashdata('ids',$ids);//flash data session is started which contains a particular user_id of user
        
        $data  = $this -> login_model -> select_article();//selecting the article table from database and storing in $data
        //print_r($store_article);exit;
        //echo $ids;exit;
        
        $this -> load -> view('add_articl',['data'=>$data]);//this data is sent to the "add_articl" view and is shown in table format
        //return redirect('users/add');
    }
    //add the values in dashboard profile after login

    function chng_pswrd_view(){
        $this->load->view('chng_pswrd');
    }

    function chng_pswrd($id){
        //echo $id;exit;
        $post1=md5($this->input->post('old_pswrd'));
        $post2=$this->input->post('new_pswrd');
        $data=$this->login_model->chng_pswrd_model($id);
        //print_r($data->password);exit;
        // echo "<pre>";
        // print_r($data);exit;
        // echo "<pre>";
        // print_r($post1->old_pswrd);exit;
        //print_r($post1);exit;
        if($data == $post1)
        {
            $this->login_model->update_pswrd($post2,$id);
        }
        else{
            echo "Old password not matched";
        }
    }

    function add()
    {
        $this->load->view('add_articl');
    }
    function add_article(){

        $config=[
            'upload_path'   => './upload/',
            'allowed_types' => 'gif|png|jpg|pdf|doc',
        ];

        $this->load->library('upload',$config);//loading the upload library with the config portions also included
        // echo "<pre>";
        // print_r($sql);exit;
        //$yo=$this->upload->do_upload('file');
        if($this->upload->do_upload('file'))//do_upload is a function which changes name="userfile" (by default) to my own random name here="file", and this function stores the doc or pdf file in the upload folder created
        {
            
             $data          =   $this->input->post();
            //print_r($data);exit;

             $data1         =   $this->upload->data();//this is to return all the values  of the image description details
            // echo "<pre>";
            // print_r($data1);exit;
             $image_path    =   $data1['raw_name'].$data1['file_ext'];//returns only the filename
             //$image_path=base_url("upload/".$data1['raw_name'].$data1['file_ext']);//returns the whole URL path

             $data['file']  =   $image_path;//storing the path in post variable with nme 'image_path'
            //print_r($data);exit;

             $ids           =   $this->login_model->add_model($data);
            //print_r($ids);exit;
        }

        if($ids==1)
        {
            //creating a show article table select model
            return redirect('users/gg');
        }
        else{
            "Article cannot be fetched";
        }
    }

    //edit the values in dashboard profile after login
    function edit($id)
    {
        $sqli  =  $this->login_model->edit_article_tbl($id);
        //print_r($sqli);exit;
        $this -> load -> view('article_edit',['data'=>$sqli]);
    }

    function edit_article($article_id)

        {//by two ways we are fetching the id edit value
            
            $data_update    = $this->input->post();
            //$article_id=$_POST['id']; 

            $this -> login_model -> edit_article_tbl_update($data_update,$article_id);
            unset($article_id);

            return redirect('users/gg');
        }
    //delete the values in dashboard profile after login
    function delete($id)
    {
        $sql  = $this->login_model->delete_article_tbl($id);

        if($sql)
        {
            redirect('users/gg');
        }
        else{
            echo "error";
        }
        
    }

    function forms(){
        $data  = $this->input->post('date');
        $this->login_model->forms1($data);
    }

    //destroying session
    function sess_destroy(){
        session_destroy();
        return redirect('users/login_view');
    }
}

?>
<!-- NOT is used in WHERE statement which will ignore that value and print the other statement
select * from tbl_name where not name="deba" AND NOT usertype="user",
=> this will return all the rows which doesnot have usertype AS "user".

2) The following SQL statement selects all customers from the "Customers" table,
 sorted by the "Country" and the "CustomerName" column. 
 This means that it orders by Country, but if some rows have 
 the same Country, it orders them by CustomerName:

Example
SELECT * FROM Customers
ORDER BY Country, CustomerName;
 -->