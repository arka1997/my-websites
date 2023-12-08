<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller 
{
    function __construct()
    {
        parent::__construct();

        $this->load->model('Cart_Model');
    }

	public function login_submit()
	{
		$data = $this->input->post();

        $response = $this->Cart_Model->login_submit($data);//contains the user info like email pswrd

        if($response =='')
        {
            echo "Account credentials does not match";
        }
        else
        {
            $this->session->set_userdata('login', $response);//here creating sessions of all the details of user together like id,pswrd,email

            $get_cart_products = $this->cart->contents();//this is fetching all the sessions values which was created before login when we added some products to the cart, all the data were stored in the session array 

            if(count($get_cart_products)>0)
            {
                foreach($get_cart_products as $products)
                {
                    $cart_data['user_id']    = $this->session->login->id;//storing the user id through session "$this->session->tbl_name->id
                    $cart_data['product_id'] = $products['id'];//USE OF THIS
                    $cart_data['quantity']   = $products['qty'];
                    $cart_data['price']      = $products['price'];

                     $checkdata = $this->Cart_Model->check_user_product($cart_data['user_id'] ,$cart_data['product_id']);
                     if($checkdata) {

                        $cart_data['quantity'] += $checkdata->quantity;
                        //print_r($cart_data);exit;
                        $this->Cart_Model->update_cart_details($cart_data['user_id'] ,$cart_data['product_id'],$cart_data);

                     } else {
                        $this->db->insert('cart', $cart_data);//here the products are added to cart as well as to the database
                    }
                }
            } 

            $this->cart->destroy();//after the session variables are loaded and used after login, the master_array sessin class is destroyed which earlier stored the session values
            
            redirect(base_url());
        }
	}
}