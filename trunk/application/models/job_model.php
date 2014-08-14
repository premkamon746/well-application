<?php
	class Job_model extends CI_Model{
		function __construct(){
			parent::__construct();
		}
		
		function createJob($post,$create_user = 0){
			extract($post);
			
			$data = array(
				"job_no"		=>$this->createJobNo()
				,"customer_id"	=>$customer_id
				//,"bill_to_id"	=>$job_no
				,"ship_to_id"	=>$ship_to_id
				,"job_date"		=>$job_date
				,"job_end_date"	=>$job_end_date
				,"tag_no"		=>$tag_no
				,"job_status"	=>'NEW'
				//,"org_id"		=>$org_id
				,"job_type_id"	=>$job_type_id
				//,"priority_code"=>$job_no
				,"sub_type_id"	=>$sub_type_id
				,"create_user"	=>$create_user
				//,"update_date"	=>$job_no
				//,"update_user"	=>0
				,"serial_number"=>$serial_number
			);
			$this->db->set('create_date', 'now()',FALSE); 
			$this->db->insert('job_t_orders', $data); 
			return $this->db->insert_id();
		}
		
		function createJobDetail($post,$job_id,$create_user = 0){
			extract($post);
			$seq_no = 0;
			$data = array(
				"seq_no"=>$seq_no
				,"job_id"=>$job_id
				,"description"=>$description
				,"status"=>'WAIT CONFIRM'
				,"create_user"=>$create_user
			);
			
			$this->db->set('create_date', 'now()',FALSE); 
			$this->db->insert('job_t_order_lines', $data); 
			
		}
		
		function createJobNo(){
			$running = $this->getRunningCode();
					//J(2digit year)(2 digit month)(5digit running)
			$job_no = "J".date('y').date('m').$running;
			return $job_no;
		}
		
		function getRunningCode(){
			$this->db->select_max('job_id');
			$query = $this->db->get('job_t_orders');
			
			if($query->num_rows() > 0)
				$str = intval($query->row()->job_id)+1;
			else
				$str = 1;
			
			$running = str_pad($str,5,"0",STR_PAD_LEFT);
			return $running;
		}
		
		function getJob($id){
			$sql = "select * from job_t_orders where job_id = '$id'";
			return $this->db->query($sql)->row();
		}
		
		function getJobCustomerDetail($id){
			$sql = "select * from job_t_orders o
					join ar_t_customers c
					on c.customer_id = c.customer_id
					left join ar_t_sites s
					on s.customer_id = s.customer_id
					where o.job_id = '$id' ";
			return $this->db->query($sql)->row();
		}
		
		function getJobLine($jobid){
			$sql = "select * from job_t_order_lines o
					join  sec_users s 
					on s.user_id = o.create_user 
					where job_id = '$jobid'";
			return $this->db->query($sql);
		}
		
		function getJobType(){
			$sql = "select * from job_t_type where active_flag = 'Y'";
			return $this->db->query($sql);
		}
		
		function getJobSubtype(){
			$sql = "select * from job_t_subtype where active_flag = 'Y'";
			return $this->db->query($sql);
		}
		
		function getJobStatus(){
			$sql = "select * from job_t_status where active_flag = 'Y'";
			return $this->db->query($sql);
		}
		
		function getSearch($post){
			extract($post);
			$search = "";
			if(isset($job_no) && $job_no !=''){
				$search .=" and o.job_no = '$job_no'";
			}
			if(isset($job_date)&&$job_date !=''){
				$search .=" and o.job_date = '$job_date'";
			}
			if(isset($customer_id) &&$customer_id !=''){
				$search .=" and o.customer_id = '$customer_id'";
			}
			if(isset($job_type_id) &&$job_type_id !=''){
				$search .=" and o.job_type_id = '$job_type_id'";
			}
			if(isset($sub_type_id) &&$sub_type_id !=''){
				$search .=" and o.sub_type_id = '$sub_type_id'";
			}
			if(isset($status_code) &&$status_code !=''){
				$search .=" and o.job_status = '$status_code'";
			}
			
			$sql = "select * from job_t_orders  o
					join ar_t_customers c
					on o.customer_id = c.customer_id
					left join job_t_type jt
					on jt.job_type_id = o.job_type_id
					left join job_t_subtype js
					on js.sub_type_id = o.sub_type_id
					
					where 1 $search
					order by job_no desc";
			//echo $sql;
			return $this->db->query($sql);
		}
		
		function getJobTypeById($id){
			$sql = "select * from job_t_type where job_type_id = $id";
			return $this->db->query($sql)->row();
		}
		
		function getJobSubTypeById($id){
			$sql = "select * from job_t_subtype where sub_type_id = $id";
			return $this->db->query($sql)->row();
		}
	}