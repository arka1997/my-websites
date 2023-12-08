<?php
class My_controller extends CI_Controller{
    
    function index()
    {
        $data=$this->Cart_model->fetch_products();
        
        $this->load->view('1st_index_view',['data'=>$data]);
    }

    function cart()
    {
        
        if(count($this->cart->contents())>0)
        {
            $data_cart=$this->Cart_model->show_cart_products_model();
            //echo "<pre>";print_r($data_cart);exit;
            //             Array
            // (
            //     [3afb439bc2e1353fc7232d4520e36bd8] => Array
                        // (
                        //     [id] => 2
                        //     [qty] => 2
                        //     [price] => 100
                        //     [name] => laptop
                        //     [options] => Array
                        //         (
                        //             [details] => this is a special designed product
                        //             [img_name] => ASUS_ROG.jpg
                        //         )

                        //     [rowid] => 3afb439bc2e1353fc7232d4520e36bd8
                        //     [subtotal] => 200
                        // )

            // )
            $total_product_counts=0;
            $arr = array();//here we are creating a master array to hold all the product values and insert them one by one in the array arr[]
            // $cart_count=count($data_cart);
            foreach($data_cart as $data )
            {  $x=$data['subtotal']*$data['options']['discount'];
                $discount=$data['subtotal']-($x/100);
            $products['row_id']     = $data['rowid'];
            $products['product_id'] = $data['id'];
            $products['name']       = $data['name'];
            $products['price']      = $data['price'];
            $products['img_model_name']   = $data['options']['img_model_name'];
            $products['details']    = $data['options']['details'];
            $products['qty']        = $data['qty'];
            $products['subtotal']   = $data['subtotal'];
            $products['discount']   = $data['options']['discount'];
            $products['discount_price']   = $discount;
            $total_product_counts  += 1;
            array_push($arr,$products);
            }
           
        // $arr['name']='name';
        //$products['total_count_item']=$c;
//echo "<pre>";print_r($products);exit;
        //$this->load->view('show_cart',['arr'=>$arr,'prod'=>$products]);
        }
        else{
            //this cart items are fetched from database
            $arr = array();
            $session=$this->session->userdata('login');
            $user_id=$session->id ?? '';
            $total_product_counts=0;
            $datas= $this->db->select('*')
                     ->from('cart')
                     ->where('user_id',$user_id)
                     ->get()->result();
                     //echo "<pre>";print_r($datas);exit;
                     foreach($datas as $data )
            {
                $x=$data->subtotal*$data->discount;
                $discount=$data->subtotal-($x/100);
                     $products['user_id'] = $data->id;
                     $products['product_id'] = $data->product_id;
                     $products['qty'] = $data->quantity;
                     $products['price'] = $data->price;
                     $products['name'] = $data->name;
                     $products['details'] = $data->details;
                     $products['img_model_name'] = $data->img_model_name;
                     $products['subtotal'] = $data->subtotal;
                     $products['discount']   = $data->discount;
                     $products['discount_price']   = $discount;
                     $total_product_counts  += 1;
                     array_push($arr,$products);
                     
            }
            
            //echo "<pre>";print_r($arr);exit;
            
        }
        $products['count'] =$total_product_counts;
        //print_r($products['count'] );exit;
        $this->load->view('show_cart',['arr'=>$arr,'prod'=>$products]);    
    }

    function add_to_cart($product_id){
        //echo "yo";exit;
        $product=$this->Cart_model->fetch_data_id($product_id);
        //echo "<pre>";print_r($product);exit;
        $data=array (
            'id'      => $product->id,
            'qty'     => $product->item_qty,
            'price'   => $product->item_price,
            'name'    => $product->item_name,
            'options' => array('details' => $product->item_details, 'img_model_name' => $product->img_name, 'discount' => $product->discount),
            
    );
    $insert_session_cart_data  = $this->cart->insert($data);
    redirect('My_Controller/');
       // $this->load->view('show_cart',['product'=>$product]);
    }
    public function array_test()
    {   //task: print the row where salary is web developer and salary is greater then 25000
        $array1 = ["id"=>"1", "name"=>"Shovan Nandi", "mobile"=>"8348338409", "email"=>"shovannandi97@gmail.com", "position"=>"Application Developer", "salary"=>"25000"];
        $array2 = ["id"=>"2", "name"=>"Shovan Nandi", "mobile"=>"8348338409", "email"=>"shovannandi97@gmail.com", "position"=>"Web Developer", "salary"=>"35000"];
        $array3 = ["id"=>"3", "name"=>"Shovan Nandi", "mobile"=>"8348338409", "email"=>"shovannandi97@gmail.com", "position"=>"Application Developer", "salary"=>"20000"];
        $array4 = ["id"=>"4", "name"=>"Shovan Nandi", "mobile"=>"8348338409", "email"=>"shovannandi97@gmail.com", "position"=>"Web Developer", "salary"=>"28000"];
        $array5 = ["id"=>"5", "name"=>"Shovan Nandi", "mobile"=>"8348338409", "email"=>"shovannandi97@gmail.com", "position"=>"Application Developer", "salary"=>"15000"];

        $array6 = array($array1, $array2, $array3, $array4, $array5);

        echo "<pre>"; print_r($array6);
    }

    function sess_destroy(){
        session_destroy();
        return redirect('My_Controller/');
    }

}
?>