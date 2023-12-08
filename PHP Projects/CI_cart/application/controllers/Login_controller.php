<?php
class Login_controller extends CI_Controller{
    
    function login(){
        $this->load->view('login_view');
    }

    function login_submit(){
        //echo "yo";exit;
        $login_data= $this->input->post();
        $sql       = $this->Cart_model->login_validate($login_data);
        if($sql){
            //echo "yo";exit;
            $this->session->set_userdata('login',$sql);
            $cart_session_values = $this->cart->contents();
           //echo "<pre>";print_r($cart_session_values);exit;
           if(count($cart_session_values)>0){
           $arr= array();
           //print_r($this->session->login->id);exit;
            foreach($cart_session_values as $c){
                $x=$c['subtotal']*$c['options']['discount'];
                $discount=$c['subtotal']-($x/100);
            $cart['user_id']        = $this->session->login->id;
            $cart['product_id']     = $c['id'];
            $cart['	quantity']      = $c['qty'];
            $cart['price']          = $c['price'];
            $cart['name']           = $c['name'];
            $cart['details']        = $c['options']['details'];
            $cart['img_model_name'] = $c['options']['img_model_name'];
            $cart['subtotal']       = $c['subtotal'];
            $cart['discount']       = $c['options']['discount'];
            $cart['discount_price'] = $discount;
            array_push($arr,$cart);

$sql=$this->db->select('*')
                     ->from('cart')
                     ->where('product_id',$cart['product_id'])
                     ->get()->row();
                     if(!$sql){
                $this->db->insert('cart',$cart);
                 }

        }
    }
    $this->cart->destroy();//after the session variables are loaded and used after login, the master_array sessin class is destroyed which earlier stored the session values
            
         redirect('My_Controller/');
            //print_r($arr);exit;
            //$this->Cart_Model->insert_cart_after_login($cart);

        }
        
    }
}
?>