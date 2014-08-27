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
		
		function getSite($cid){
			$sql = "select * from ar_t_sites where customer_id = $cid";
			return $this->db->query($sql);
		}
		
		function createCustomer($post){
			extract($post);
			$sql = "insert into ar_t_customers (customer_name, customer_type)
						values('$customer_name','$customer_type')";
			$this->db->query($sql);
			return $this->db->insert_id();
			
		}
		
		
	}