<?php
	class Autorize_model extends CI_Model{
		function __construct(){
			parent::__construct();
		}
		
		function isUser($user,$password){
			$sql = "select * from sec_users u
					join sec_user_dept  d
					on d.user_id = u.user_id and d.primary_flag = 1 
					where usr_name='$user'
					and passwd='$password'";
			//echo $sql;
			$result = $this->db->query($sql);
			if($result->num_rows() > 0){
				return $result->row();
			}
			return false;
		}
		
		
	}