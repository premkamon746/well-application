<?php
	class Customer_model extends CI_Model{
		
		function __construct(){
			parent::__construct();
		}
		function getCustomer(){
			$sql = "select * from ar_t_customers";
			return $this->db->query($sql);
		}
		
		function getCustomerById($id){
			$sql = "select * from ar_t_customers where customer_id = $id";
			return $this->db->query($sql)->row();
		}
		
		function getSite($cid,$site_code=""){
			$where="";
			if($site_code != "") $where = "and site_code='$site_code'";
			$sql = "select * from ar_t_sites s 
					join ar_province p
					on s.province_code = p.province_code
					where customer_id = $cid $where";
			return $this->db->query($sql);
		}
		
		function getAddress($site_id){
			$sql = "select * from ar_t_sites where site_id = $site_id";
			return $this->db->query($sql);
		}
		
		function getAllSite(){
			$sql = "select * from ar_t_sites";
			return $this->db->query($sql);
		}
		
		function createCustomer($post){
			extract($post);
			$sql = "insert into ar_t_customers (customer_name, customer_type,tax_number,effective_date_from,effective_date_to,credit_term,default_sales)
						values('$customer_name','$customer_type','$tax_number','$effective_date_from','$effective_date_to','$credit_term','$default_sales')";
			$this->db->query($sql);
			return $this->db->insert_id();
		}
		
		
		function updateCustomer($post,$customer_id){
			extract($post);
			$sql = "update ar_t_customers set customer_name = '$customer_name'
			, customer_type='$customer_type'
			,tax_number = '$tax_number'
			,effective_date_from = '$effective_date_from'
			,effective_date_to = '$effective_date_to'
			where customer_id = $customer_id";
			//echo $sql;
			$this->db->query($sql);
		}
		
		function getSearch($post,$limit,$start){
			extract($post);
			$search = "";
			if(isset($customer_name) && $customer_name !=''){
				$search .=" and c.customer_name like '%$customer_name%'";
			}
			if(isset($customer_id)&&$customer_id !=''){
				$search .=" and c.customer_id = '$customer_id'";
			}
				
			$sql = "select c.*
							,DATE_FORMAT(effective_date_from,'%d/%m/%Y') as effective_date_from
							,DATE_FORMAT(effective_date_to,'%d/%m/%Y') as effective_date_to

			 from ar_t_customers  c
			 where 1 $search
			 order by customer_id desc
			
					 limit $start, $limit";
			//echo $sql;
			return $this->db->query($sql);
		}
		
		function getTotalSearch($post){
			extract($post);
			$search = "";
// 			if(isset($customer_name) && $customer_name !=''){
// 				$search .=" and c.customer_name like '%$customer_name%'";
// 			}
			if(isset($customer_id)&&$customer_id !=''){
				$search .=" and c.customer_id = '$customer_id'";
			}
				
			$sql = "select count(*) total_row
					 from ar_t_customers  c
					 where 1 $search";

			$result =  $this->db->query($sql);
			
			if($result->num_rows() > 0){
				return $result->row()->total_row;
			}
			return 0;
		}
		
		function createCustAddress($post,$create_user = 0){
			extract($post);
			$data = array(
				"address1"			=>$address1[0]
				,"postcode"			=>$postcode[0]
				,"country_code"		=>$country_code[0]
				,"phone_number"		=>$phone_number[0]
				,"mobile_number"	=>$mobile_number[0]
				,"contact_person"	=>$contact_person[0]
				,"customer_id"		=>$customer_id
				,"province_code"	=>$province_code[0]
				,"site_code"	=>    "BILL"
			);
			
			if(!$this->hasPrimary("BILL",$customer_id)){
				$this->db->set('primary_flag', 'Y', TRUE);
				}else{
					$this->db->set('primary_flag', 'N', TRUE);
				}
			//$this->db->set('create_date', 'now()',FALSE); 
			$this->db->insert('ar_t_sites', $data); 
			
			//TODO :: user checkbox same bill address and ship address
				$data = array(
						"address1"			=>$address1[1]
						,"postcode"			=>$postcode[1]
						,"country_code"		=>$country_code[1]
						,"phone_number"		=>$phone_number[1]
						,"mobile_number"	=>$mobile_number[1]
						,"contact_person"	=>$contact_person[1]
						,"customer_id"		=>$customer_id
						,"province_code"	=>$province_code[1]
						,"site_code"		=>"SHIP"
				);
				
				if(!$this->hasPrimary("SHIP",$customer_id)){
					$this->db->set('primary_flag', 'Y', TRUE);
				}else{
					$this->db->set('primary_flag', 'N', TRUE);
				}
					
				$this->db->insert('ar_t_sites', $data);
			
			
			return $this->db->insert_id();
		}
		
		function hasPrimary($site_code, $customer_id){
			$sql = "select * from ar_t_sites where site_code = '$site_code' and customer_id = $customer_id and primary_flag = 'Y'";
			$result = $this->db->query($sql);
			if($result->num_rows() >0){
				return true;
			}
			return false;
		}
		
		function getProvince(){
			$sql = "select * from ar_province";
			return $this->db->query($sql);
		}
		
		function getCountry(){
			$sql = "select * from ar_country";
			return $this->db->query($sql);
		}
		
	}