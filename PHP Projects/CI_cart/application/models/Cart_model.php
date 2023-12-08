<?php
class Cart_model extends CI_Model
{
    function add_data(){
        //here we will add the products for showing them in cart
    }

    function fetch_products(){
        
        $datas=$this->db->select('*')
                 ->from('cart_data')
                 ->get();
                 return $datas->result();
    }

    function show_cart_products_model(){
        $data = $this->cart->contents();
        return $data; 
        // $datas=$this->db->select('*')
        //          ->from('cart_data')
        //          ->get();
        //          return $datas->result();
    }

    function fetch_data_id($id){
        $datas=$this->db->select('*')
        ->from('cart_data')
        ->where('id',$id)
        ->get();
        return $datas->row();
    }

    //LOG IN Portions
    function login_validate($login_data){
        $email   = $login_data['email'];
        $password= $login_data['pswrd'];
        $sql     = $this->db->select('*')
                 ->from('login')
                 ->where('email',$email)
                 ->where('password',$password)
                 ->get();
                    return $sql->row(); 
            
    }

    function insert_cart_after_login(){
        
    }

}

?>