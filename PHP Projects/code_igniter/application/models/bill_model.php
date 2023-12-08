<?php
//error_reporting(1);
	class bill_model extends CI_Model
	{
	
	function generatebill($data)
	{
	
		$this->db->insert('bill',$data);
	
	}
	
	function showbill()
	{
	
			$i=0;
			$cid=$this->session->userdata('u_name');
			$query="select max(id) as id from bill";
			$q=$this->db->query($query);
			foreach($q->result() as $qr)
			{
				//echo $qr->orderid;
				$a[0]=$qr->id;
			}
			$rows=$this->db->get_where('bill',array('custid'=>$cid,'id'=>$a[0]));
			$data=array();
			foreach($rows->result() as $row)
			{
						$data[$i]=array(
							'oid'=>$row->id,
							'cid'=>$row->custid,
							'amount'=>$row->amount,
							'qty'=>$row->qty);
							$i++;
			}
			return $data;
		}
	
	
	
		function pay($data)
		{
			$query="select max(orderid) as oid from bill";
			$q=$this->db->query($query);
			foreach($q->result() as $qr)
			{
				//echo $qr->orderid;
				$a[0]=$qr->oid;
			}
			$this->db->where('orderid',$a[0]);
			$this->db->update('bill',$data);
		
		}
	
	
	}
	?>