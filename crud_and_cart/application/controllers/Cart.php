<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller 
{
    function __construct()
    {
        parent::__construct();
        //session_destroy();
        $this->load->model('Cart_Model');
    }

	public function index()
	{
        $data['details'] = $this->Cart_Model->get_products();//here fetching all the product details and show them at the first page before login

        if(count($this->cart->contents())>0)//if ther is any content in the cart
        {   //echo "cart present";exit;
            $details = $this->Cart_Model->get_cart_products();//fetching the product details

            $total_amount = 0;

            foreach($details as $d)
            {
                $total_amount += $d['price'];//it wil calculate the prices of the products added to the cart
            }
        }
        else
        {//this is triggered before the user logs in and sets total amount to zero and returns the session values false
            //after the user is logged in, the below code runs the session variables and even the foreach loop runs
            //echo "cart not present session created";exit;
            $session = $this->session->userdata('login'); //session is created here
            
            $user_id = $session->id ?? '';//this returns the id of the user_id in login table
            //print_r($user_id);exit;

            $details = $this->Cart_Model->get_all_cart_products($user_id);
            // print_r($details);exit;
            $total_amount = 0;

            //here in the below loop we will will enter when we log into the product view
            foreach($details as $d)
            {                
                $total_amount += $d->price;
                // echo "yo";
                // print_r($total_amount);exit;
            }
        }   
        
        $data['total_amount']  = $total_amount;
        $data['total_product'] = count($details);

        //echo "<pre>";print_r($data);exit;

		$this->load->view('products', $data);//loading the first page where all the products are shown before login and can be added to cart
	}

    public function cart()//when we click the cart button before login and there is already some cart items, then we enter "if" statement
	{ 
        if(count($this->cart->contents())>0)
        {
            //echo "yy";exit;
            $details = $this->Cart_Model->get_cart_products();

            $total_amount = 0;

            $products = array();

            foreach($details as $d)
            {
                $products[] = array(
                    'row_id'     => $d['rowid'],//this is creating an unique md5 id for every products
                    'product_id' => $d['id'],
                    'name'       => $d['name'],
                    'price'      => $d['price'],
                );

                //print_r($products);exit;

                $total_amount += $d['price'];
            }

            $data['details'] = $products;
        }
        else
        {
            //echo "tt";exit;
            $session = $this->session->userdata('login');//already login session has been created after logging in

            $user_id = $session->id ?? '';// MARK \\

            $details = $this->Cart_Model->get_all_cart_products($user_id);
            //echo "<pre>";print_r($details);exit;
            $total_amount = 0;

            $products = array();
            //adding in databse cart table is done here
            foreach($details as $d)
            {
                $products[] = array(
                    'row_id'     => $d->id,
                    'product_id' => $d->product_id,
                    'name'       => $d->name,
                    'price'      => $d->price
                );
                
                $total_amount += $d->price;
            }

            $data['details'] = $products;
            
        }   
        //here if no items are present in cart then we return total amount and total product to be "0"
        $data['total_amount']  = $total_amount;
        $data['total_product'] = count($details);
        //echo "<pre>";print_r($data);exit;
		$this->load->view('cart.php', $data);
	}

    public function add_to_cart($product_id)//adding the items from list to cart
    {
        $get_product = $this->Cart_Model->get_product_details($product_id);
        //echo "<pre>";print_r($get_product);exit;
        $product_name  = $get_product->name;
        $product_price = $get_product->price;

        $data = array(
            'id'      => $product_id,
            'qty'     => 1,
            'price'   => $product_price,
            'name'    => $product_name,
        );
        
        $insert_data = $this->cart->insert($data);//this is creating the sessions, containing all the product details, which were inserted to cart before login, and these are inserted into the session master array created by cart library

        if($insert_data)
        {
            echo "<script>alert('Add to cart has been successfully done')</script>";
            //print_r(base_url());exit;
            redirect(base_url());
        }
        else
        {
            echo "<script>alert('Something went wrong');</script>";

            redirect(base_url());
        }
    }

    public function remove($rowid)
    {
        if(count($this->cart->contents())>0)
        {
            $update = $this->cart->remove($rowid);//deleting the cart items which are deleted before login, by destroying the session of that particular product with unique row_id
        }
        else
        {
            $update = $this->db->where('id', $rowid)->delete('cart');//this are the cart items which are deleted from database as these were added to cart after login, which are later fetched and shown in the cart items after user logs in
        }       

        if($update)
        {
            echo "<script>alert('Add to cart has been successfully done');</script>";

            redirect('Cart/cart');
        }
        else
        {
            echo "<script>alert('Something went wrong');</script>";

            redirect('Cart/cart');
        }
    }
	function sess_destroy(){
        session_destroy();
        return redirect('Cart/index');
    }
}
