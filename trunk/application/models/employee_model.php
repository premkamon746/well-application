<?php
	class Employee_model extends CI_Model{
		
		function __construct(){
			parent::__construct();
		}
		
		function getSaleRep(){
			$sql = "select * from ar_salesrep where active_flag = 'Y'";
			$res = $this->db->query($sql);
			return $res;
		}
		
	}