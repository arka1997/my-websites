<?php
class Sum_Model extends CI_Model 
{
    public function getdata()
    {                                   //Different sql queries\\
        // $this->db->select('*');
        // $this->db->from('count_mail');
        // $this->db->where('nmbr', 10);
        // $this->db->order_by('id', 'desc');        
        // $data = $this->db->get()->result();

        //$data = $this->db->select('*')->from('count_mail')->where('nmbr', 10)->order_by('id', 'desc')->get()->result();

        //$data = $this->db->where('nmbr', 10)->order_by('id', 'desc')->get('count_mail')->result();

        $data = $this->db->query("select * from count_mail where nmbr=10 order by id desc")->result();

        // echo $this->db->last_query(); echo "<br>";// $this->db->last_query() function to see SQL statements of last executed query in php CI 

        //$last_id = $this->db->insert_id();//storing the last id entered

        // echo "<pre>"; print_r($data);exit;

        return $data;

    }
    public function gets(){
        return ['abc'=>'5','def'=>'6'];
    }
    // function fetch(){
    //     $blue=$this->db->select('*')->from('bbc')->where('tablename','some particular value of that id')->get()->result();
    //     return $blue;
    // }
}