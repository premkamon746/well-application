<?php
	class Quotation_model extends CI_Model{
		function __construct(){
			parent::__construct();
		}
		
		function createQuotation($post,$create_user = 0){
			extract($post);
    
			$data = array(
				"quote_number"		=>$this->createQouNo()
				,"quote_date"		=>$quote_date
				,"customer_id"		=>$customer_id
				,"bill_to_id"		=>$bill_to_id
				,"ship_to_id"		=>$ship_to_id
				,"contact_person"	=>$contact_person
				,"attention"		=>$attention
				,"cc_to"			=>$cc_to
				,"email"			=>$email
				,"create_user"		=>$create_user
				,"quote_status"		=>"WAIT CONFIRM"
				//,"update_date"	=>$job_no
				//,"update_user"	=>0
			);
			$this->db->set('create_date', 'now()',FALSE); 
			$this->db->insert('job_t_quote_headers', $data); 
			return $this->db->insert_id();
		}
		
		function createLine($post,$quot_id,$create_user = 0){
			extract($post);
    
			$data = array(
				"quote_id"					=>$quot_id
				,"remarks"					=>$desc
				,"quantity"					=>$quantity
				,"unit_selling_price"		=>$price
				,"line_amount"				=>$toprice
				,"create_user"				=>$create_user
				,"quote_line_status"		=>"WAIT CONFIRM"
			);
			$this->db->set('create_date', 'now()',FALSE); 
			$this->db->insert('job_t_quote_lines', $data); 
			return $this->db->insert_id();
		}
		
		function createQouNo(){
			$running = $this->getRunningCode();
					//J(2digit year)(2 digit month)(5digit running)
			$quote_no = "QUO".date('y').date('m').$running;
			return $quote_no;
		}
		
		function getRunningCode(){
			$this->db->select_max('quote_id');
			$query = $this->db->get('job_t_quote_headers');
			//echo $this->db->last_query();
			//exit;
			if($query->num_rows() > 0)
				$str = intval($query->row()->quote_id)+1;
			else
				$str = 1;
			
			$running = str_pad($str,5,"0",STR_PAD_LEFT);
			return $running;
		}
		
		function getCreditTerm(){
			$sql = "select * from ar_credit_term where active_flag = 'Y'";
			return $this->db->query($sql);
		}
		
	function getSearch($post){
			extract($post);
			$search = "";
			if(isset($job_no) && $job_no !=''){
				$search .=" and o.quote_number = '$quote_number'";
			}
			if(isset($job_date)&&$job_date !=''){
				$search .=" and o.quote_date = '$quote_date'";
			}
			if(isset($customer_id) &&$customer_id !=''){
				$search .=" and o.customer_id = '$customer_id'";
			}
			
			$sql = "select o.*,c.*,DATE_FORMAT(quote_date,'%d/%m/%Y') as quote_date from job_t_quote_headers  o
					join ar_t_customers c
					on o.customer_id = c.customer_id
					where 1 $search
					order by quote_number desc";
			//echo $sql;
			return $this->db->query($sql);
		}
		
	function getItemCatagory(){
		$sql = "select category from inv_item_list group by category";
		$result = $this->db->query($sql);
		return $result;
	}
	
	function getItemCatagoryName($cat,$sement1="",$sement2=""){
		$s1 = "";
		$s2 = "";
		if($sement1 != ""){
			$s1 = " and segment1 ='$sement1' ";
			if($sement2 != ""){
				$s2 = " and segment2 ='$sement2' ";
			}
		}
		$sql = "select * from inv_item_list where  category like '$cat%' $s1 $s2";
		//echo $sql ;
		$result = $this->db->query($sql);
		return $result;
	}
	
	function getItemSegment1($cat){
		
		$sql = "select segment1 from inv_item_list where  category like '$cat%' group by segment1";
		$result = $this->db->query($sql);
		return $result;
	}
	
	function getItemSegment2($cat,$segment1=""){
		$s1 = "";
		if($segment1!=""){
			$s1 = " and segment1 ='$segment1' ";
		}
	
		$sql = "select segment2 from inv_item_list
		where  category like '$cat%'
		$s1
		group by segment2";
		$result = $this->db->query($sql);
		return $result;
	}
	
	function getItemCatagoryRecord($cat){
		$sql = "select count(*) to_record from inv_item_list where category = '$cat' ";
		$result = $this->db->query($sql);
		return $result->row()->to_record;
	}
	
	function getQuotation($id){
		$sql = "select q.*,c.*,DATE_FORMAT(quote_date,'%d/%m/%Y') as quote_date
				from job_t_quote_headers  q
				left join ar_t_customers c
				on q.customer_id = c.customer_id
				where quote_id = $id  ";
		$result = $this->db->query($sql);
		return $result->row();
	}
	
	function updateLineStatus($post,$quote_id){
		
		foreach ($post["quote_line_status"] as $st){
			$pieces = explode(":", $st);
			$status = $pieces[0];
			$line_id = $pieces[1];
			$sql = "update job_t_quote_lines 
					SET quote_line_status = '$status' 
					where line_id='$line_id' ";
			//echo $sql;
			$result = $this->db->query($sql);
		}
	}
	
	function getLine($id){
		$sql = "select * from job_t_quote_lines where quote_id = $id  ";
		$result = $this->db->query($sql);
		return $result;
	}
	
	function delLine($id){
		$sql = "delete from job_t_quote_lines where line_id = $id  ";
		//echo $sql;
		//exit;
		$result = $this->db->query($sql);
		return $result;
	}
	
	function copy($quote_id){
		$sql ="select * from job_t_quote_headers where quote_id = '$quote_id' ";
		
		$res = $this->db->query($sql);
		if($res->num_rows() >0){
			$data = $res->row();
			
			$data = array(
					"quote_number"		=>$this->createQouNo()
					,"quote_date"		=>$data->quote_date
					,"customer_id"		=>$data->customer_id
					,"bill_to_id"		=>$data->bill_to_id
					,"ship_to_id"		=>$data->ship_to_id
					,"contact_person"	=>$data->contact_person
					,"attention"		=>$data->attention
					,"cc_to"			=>$data->cc_to
					,"email"			=>$data->email
					,"create_user"		=>$data->create_user
					,"quote_status"		=>"WAIT CONFIRM"
					//,"update_date"	=>$job_no
					//,"update_user"	=>0
			);
			$this->db->set('create_date', 'now()',FALSE);
			$this->db->insert('job_t_quote_headers', $data);
			$new_qid = $this->db->insert_id();
			if($new_qid > 0){
				$this->copy_line($quote_id,$new_qid);
			}
			
			return $new_qid;
		}
		
		return 0;
	}
	
	
	function cancel($quote_id){
		$update = "UPDATE job_t_quote_headers set quote_status = 'CANCEL' where quote_id = $quote_id";
		//echo $update; exit;
		$this->db->query($update);
	}
	
	function copy_line($quote_id,$new_qid){
		$sql = "select * from job_t_quote_lines where quote_id = '$quote_id'";
		$res = $this->db->query($sql);
		
		if($res->num_rows() >0){
			
			foreach ($res->result() as $r){
				$data = array(
						"quote_id"					=>$new_qid
						,"remarks"					=>$r->remarks
						,"quantity"					=>$r->quantity
						,"unit_selling_price"		=>$r->unit_selling_price
						,"line_amount"				=>$r->line_amount
						,"create_user"				=>$r->create_user
						,"quote_line_status"		=>"WAIT CONFIRM"
				);
				$this->db->set('create_date', 'now()',FALSE);
				$this->db->insert('job_t_quote_lines', $data);
			}
			
		}
	}
	
	function approve($post){
		
		$array = $post["id_check"];
		$status ='CANCEL';
		if($post["stauts"]==1){
			$status = 'CONFIRM';
		}
		$separated = implode(" or quote_id = ", $array);
		
		$update = "UPDATE job_t_quote_headers set quote_status = '$status'
					where quote_id = $separated";
		//echo $update; exit;
		$this->db->query($update);
	}
}


















