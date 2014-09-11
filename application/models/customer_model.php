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
		
		function getSite($cid,$site_type=""){
			$where="";
			if($site_type != "") $where = "and site_type='$site_type'";
			$sql = "select * from ar_t_sites where customer_id = $cid $where";
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
			$sql = "insert into ar_t_customers (customer_name, customer_type)
						values('$customer_name','$customer_type')";
			$this->db->query($sql);
			return $this->db->insert_id();
		}
		
		function createCustAddress($post,$create_user = 0){
			extract($post);
			$data = array(
				"address1"			=>$address1
				,"address2"			=>$address2
				,"postcode"			=>$postcode
				,"country_code"		=>$country_code
				,"phone_number"		=>$phone_number
				,"mobile_number"	=>$mobile_number
				,"contact_person"	=>$contact_person
				,"customer_id"		=>$customer_id
				,"province_code"	=>$province_code
				,"site_type"		=>$site_type
			);
			
			if(isset($primary_flag)){
				$this->db->set('primary_flag', $primary_flag, TRUE); 
			}
			//$this->db->set('create_date', 'now()',FALSE); 
			$this->db->insert('ar_t_sites', $data); 
			return $this->db->insert_id();
		}
		
		function getProvince(){
			$sql = "select * from ar_province";
			return $this->db->query($sql);
		}
		
	}