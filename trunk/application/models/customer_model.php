<?php
	class Customer_model extends CI_Model{
		
		function __construct(){
			parent::__construct();
		}
		function getCustomer(){
			$sql = "select * from ar_t_customers";
			return $this->db->query($sql);
		}
		
		function getSite($cid){
			$sql = "select * from ar_t_sites where customer_id = $cid";
			return $this->db->query($sql);
		}
		
		
	}