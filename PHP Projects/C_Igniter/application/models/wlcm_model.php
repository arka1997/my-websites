<?php
class wlcm_model extends CI_Model
{
    function form2($datas,$datas1){
        $data['username']= $datas['username'];
        $data['password']= $datas1['password'];
        //$data['article_text']= $articles['texts'];
        //print_r($data);exit;
        $sql=$this->db->insert('article_tbl',$data);
}
}
?>