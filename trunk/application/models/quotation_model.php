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
			
			$sql = "select * from job_t_quote_headers  o
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
	
	function getItemCatagoryName($cat){
		$sql = "select * from inv_item_list where  category like '$cat%' ";
		$result = $this->db->query($sql);
		return $result;
	}
	
	function getItemCatagoryRecord($cat){
		$sql = "select count(*) to_record from inv_item_list where category = '$cat' ";
		$result = $this->db->query($sql);
		return $result->row()->to_record;
	}
	
	function getLine($id){
		$sql = "select * from job_t_quote_lines where quote_id = $id  ";
		$result = $this->db->query($sql);
		return $result;
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


















