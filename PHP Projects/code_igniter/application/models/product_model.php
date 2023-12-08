<?php
  //this is the portion of the database to run all the query statements and id's fetched from controller and action is taken...
class product_model extends CI_Model
	{
	
	
		function list_products()
		{//this is used to select the rows of the table and fetch the value and send it to the controller,and then to view("edit.php") to show the table...
			$i=0;
			$data=array();
			$query="select * from product";
			$rows=$this->db->query($query);
			foreach($rows->result() as $row)//fetchin the row,result is a function
			{
				$data[$i]=array(
							'id'=>$row->id,
							'pname'=>$row->pname,
							'pdes'=>$row->pdes,
							'pcost'=>$row->pcost
							
				);//fetching the row,starting with $i=0 for first row
				$i++;//increment $i,to store next row
			}
			
			return $data;//return the data to the object called,for performin new function in next page
		}
		
		function add_product()
		{
		 //this is the function for adding new product to the table..
			$data=array(
						'pname'=>$this->input->post('pname'),
						'pdes'=>$this->input->post('pdes'),
						'pcost'=>$this->input->post('pcost')
			
			);
			
			$this->db->insert("product",$data);//"insert is a default function to insert all elements to database
			
		}	
		
		function deleteproduct($id)
		{
		
			$this->db->delete('product',array('id'=>$id));
			
		}
		
		function getproduct($id)
		{
			$i=0;
		
			$query="select * from product where id=$id";
			$rows=$this->db->query($query);
			
			foreach($rows->result() as $row)
			{
				$data[/*$i*/]=array(
							'id'=>$row->id, //'id' is key   , '$row->id' is value
							'pname'=>$row->pname,
							'pcost'=>$row->pcost,
							'pdes'=>$row->pdes
							
				);
				//$i++;
			}
			return $data;
		
		}
		
		function updateproduct($id,$data)
		{
			$this->db->where('id',$id);
			$this->db->update('product',$data);//product is the table name
		//QUERY- Update FROM product WHERE id="$id"
		}
		
		//this->productmodel->update product($id,$date)means this is used to represent the object product model which access the updateproduct function and passes id parameter....

		//index->listptod->add new product->add pro is called->if submitted here
		//->it is coming to prod/index->if delete is clicked->deleted....
		//->update clicked->id is sent to prod/update.->if submit->goes to edit
	}

?>