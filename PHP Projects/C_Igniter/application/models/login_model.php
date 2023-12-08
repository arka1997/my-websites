<?php
class login_model extends CI_Model
{   //fetchin usernm pswrd from controller
    public function fetch($detail)
    {
        //select * from login where email="***" and password="***"
        $data['email']    = $detail['email'];
        $data['password'] = md5($detail['pswrd']);

        $q=$this->db->where($data)
                    //->where
                    ->get('login');//table name
        //$this->db->select('*')->from('login')->where('status',)
        //$qs=$this->db->update()
        if($q->num_rows())
        {//print_r($id);exit;
            return $q->row(); //this row function return an object in array format of one row
        }
        else

        {return 0;}
    }

    public function s_sion()
    {
        //$type=$this->session->userdata('usertype');
        $id=$this->session->userdata('id');
        $usertype=$this->session->userdata('usertype');
        $r=$this->db->select('*')
                    ->from('login')
                    ->where('id',$id)
                    ->get();
                    return $r->result();
    }

    function fetch_reg($details){
        //$sql=$this->db->query("insert into login(name,email,password,subject) values('$name','$email','$password','$subject')");
        $data['name']       = $details['name'];
        $data['email']      = $details['email'];
        $data['password']   = md5($details['pswrd']);
        $data['subject']    = $details['subject'];
        $data['usertype']   = $details['usertype'];
        $this->db->insert('login', $data);
        $store_data = $this->db->insert_id();

        return $store_data;
    }

    function verify_status($id){
        //echo $id;exit;
        $this->db->set('status',1);
        $this->db->where('id',$id);
        $this->db->update('login');
    }

    function chng_pswrd_model($id){
        $pswrd  = $this->db->select('*')
                            ->from('login')
                            ->where('id',$id)
                            ->get();
         $val    = $pswrd->row()->password;
        //echo $val;exit;
        return $val;
    }

    function update_pswrd($details,$id){
        $data['password'] = md5($details);
        //print_r($data);die;
        $this->db->where('id',$id)
                 ->update('login',$data);
    }
    //Another way to change the password
    // function chng_pswrd_model($details){
    //     $data['new_pswrd']       = $details['new_pswrd'];
    //     $data['old_pswrd']      = $details['old_pswrd'];
    //     $id     = $this->session->userdata('id');
    //     $pswrd  = $this->db->select('password')->from('login')->where('id',$id);
    //     $val    = $pswrd->row()->password;
    //     return $val;
    // }

    function sess2(){

        $ids=$this->session->userdata('id');
        return $ids;
    }

    function select_article(){

        $id=$this->session->userdata('id');
        $sqli=$this->db->select('*')
                       ->from('article_tbl')
                       ->where('user_id',$id)
                       ->get();
        if($sqli)
        {
            return $sqli->result();//return the value in array of ojects
        }
        else{
            return 0;
        }
    }

    function add_model($articles){

        $ids                    = $this->session->userdata('id');
        $data['user_id']        = $articles['user_id'];
        $data['article_title']  = $articles['title'];
        $data['article_text']   = $articles['texts'];
        $data['file']           = $articles['file'];
        //print_r($data);exit;
        $sql                    = $this->db->insert('article_tbl',$data);
        //echo $sql;exit;
        if($sql)
        {
            return $ids;
        }
        else{
            return 0;
        }
    }
    function image_upload_model($data){
        
        $this->db->insert('img_upload',$data);
    }

    function edit_article_tbl($id)
    {
        $sql=$this->db->select(['id','article_title','article_text'])
                      ->where('id',$id)
                      ->get('article_tbl');
        if($sql){
            return $sql->result();//this will return an array conatining the values
            //return $sql->row();//this return one row object and $sql->result returns multiple row objects
        }
        else{
            echo "error";
        }
    }

    function edit_article_tbl_update($data_update,$article_id){

        $data['article_title'] =  $data_update['title'];
        $data['article_text']  =  $data_update['texts'];

        $d=$this->db->where('id',$article_id)
                    ->update('article_tbl',$data);
        //return $d;
    }

    function delete_article_tbl($id)
    {
        $sql=$this->db->where('id',$id)->delete('article_tbl');
        return $sql;
    }

    function forms1($data){
        $this->db->insert('form_tbl',$data);
    }
}
?>