<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Cart_Model extends CI_Model
{
    public function get_products()
    {
        $data = $this->db->query("select * from products")->result();

        return $data;
    }

     public function get_cart_products()
    {
        $data = $this->cart->contents();//here we recieve all the session values along with the unique row_id

        return $data;
    }

    public function get_product_details($product_id)
    {
        $data = $this->db->query("select * from products where id='$product_id'")->row();

        return $data;
    }

   

    public function get_all_cart_products($user_id)
    {
        $data = $this->db->query("SELECT c.*, p.name FROM cart as c INNER JOIN products as p ON p.id=c.product_id AND c.user_id='$user_id'")->result();
        //echo "<pre>";print_r($data);exit;

        return $data;
    }

    public function login_submit($data)
    {
        $email    = $data['email'];
        $password = md5($data['password']);

        $login_details = $this->db->query("select * from login where email='$email' and password='$password'")->row();

        return $login_details;        
    }
    function check_user_product($user_id,$product_id) {
            $this->db->select('*');
            $this->db->from('cart');
            $this->db->where('product_id',$product_id);
            $this->db->where('user_id',$user_id);
            $sql = $this->db->get();
            return $sql->row();   
        
    }
    function update_cart_details($user_id,$product_id,$cart_qty)
    {
        
          $this->db->where('user_id',$user_id)
                   ->where('product_id',$product_id)
                 ->update('cart',$cart_qty);
    }
}