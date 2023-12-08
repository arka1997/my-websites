<?php
class cart extends CI_Controller {
	var $row;
	var $rows;
	function __construct()
	{
			parent::__construct();
			$this->row=array();
			$this->load->library('cart');
			$this->load->library('session');
			$this->load->database();
			$this->load->model("product_model");			
			$this->load->helper("url");
			$this->load->model("bill_model");
			
	}

	function addtocart($id)
	{
		
		$qty=1;
		$this->row=$this->product_model->getproduct($id);//get product is the function to fetch the id value of a particular row
		$id=$this->row[0]['id'];//here a single row is there,and in that row,"id " is fetched
		//row[0] is the index,[id] is the column
		$this->rows=$this->cart->contents();//fetch cart contetnts into $this->rows
		//this rows will fetch array value
		foreach($this->rows as $items)//row is being fetched
		{
			$cid=$items['id'];//card item id		
			if($id==$cid)//checking if id == cid
			{	
				$qty=$items['qty'];	//it will fetch the quantity,but it will not add the same item
				continue;//this will skip the process,and it will not add further cart if they are same
			}
		
		}
		$name=$this->row[0]['pname'];//fetching the values of pname from database..
		$price=$this->row[0]['pcost'];
		
		$data=array('id'=>$id,'qty'=>$qty,'price'=>$price,'name'=>$name);
		$this->cart->insert($data);//insert is a function of cart library which will insert array to the cart
		$this->load->view('showcart');
		
	}
	
	function updatecart()
	{
		if($this->input->post('upd')){
		$n=0;//number of rows
		$this->rows=$this->cart->contents();
		foreach($this->rows as $items){
		$n++;
		}
		
		$rowid=$this->input->post("rowid");//her ewe are fetching the rowid of the cart
		$qty=$this->input->post("qty");//and here we fetch the values in the qty box
		$data=array();
		for($i=0;$i<$n;$i++){	//loop will run from n rows
		$data[$i]=array('rowid'=>$rowid[$i],'qty'=>$qty[$i]);
		
		} 		
		$this->cart->update($data);
		$this->load->view('showcart');
		}
		
		if($this->input->post('clr')){
			$this->cart->destroy();
			$this->load->view('showcart');
		}
		
		
		if($this->input->post('buy')){
			$this->getbill();
			
			}

	}
	
	function delfromcart($id)//id is taken as parameter from showcart..
	{
		
		$this->rows=$this->cart->contents();//fetching every rows using cart function
		foreach($this->rows as $items){//fetching the rows with items
		$cid=$items['rowid'];//fetching the row[n] index
	
		if($id==$cid)
		{	
		$qty=0;
		$data=array('rowid'=>$id,'qty'=>$qty);
		$this->cart->update($data);
		$this->load->view('showcart');
		}
		}
	}
	
	function getbill()
	{
	
		$cid=$this->session->userdata('u_name');
		$qty=$this->cart->total_items();
		$amt=$this->input->post('amount');
		$data=array('custid'=>$cid,'amount'=>$amt,'qty'=>$qty);
		$this->bill_model->generatebill($data);
		
		redirect(base_url().'order/');
	}
}
?>