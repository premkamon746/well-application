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
		
		function saveTask($post,$job_id,$create_user = 0){
			extract($post);
				
			$data = array(
					"job_id"				=>$job_id
					,"description"			=>$description
					,"assign_to_dept_id"	=>$assign_to_dept_id
					,"plan_date_from"		=>$plan_date_from
					,"plan_date_to"			=>$plan_date_to
					,"task_status"			=>'WAIT CONFIRM'
					,"actual_date_start"	=>$actual_date_start
					,"actual_finish_date"	=>$actual_finish_date
			);
			$this->db->set('create_date', 'now()',FALSE);
			$this->db->insert('job_t_tasks', $data);
			return $this->db->insert_id();
		}
		
		function getTask($job_id){
			$sql = "select 
						s.*,d.*
						,DATE_FORMAT(plan_date_from,'%d/%m/%Y') as plan_date_from
						,DATE_FORMAT(plan_date_to,'%d/%m/%Y') as plan_date_to 
						,DATE_FORMAT(actual_date_start,'%d/%m/%Y') as actual_date_start
						,DATE_FORMAT(actual_finish_date,'%d/%m/%Y') as actual_finish_date 
			from job_t_tasks  s
			left join sec_department d
			on d.dept_id = s.assign_to_dept_id
			where job_id = $job_id";
			$res = $this->db->query($sql);
			return $res;
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
		
		function getJobByCustomerId($quote_id){
			$sql = "select 
						o.*
						,DATE_FORMAT(job_date,'%d/%m/%Y') as job_date
						,DATE_FORMAT(job_end_date,'%d/%m/%Y') as job_end_date 
					
					from job_t_orders o
					join job_t_quote_headers  q 
					on o.customer_id = q.customer_id 
					where quote_id = '$quote_id' 
					and job_status != 'CANCEL' ";
			return $this->db->query($sql);
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
		
		function getSubtypeByTypeId($job_type_id){
			$sql = "select * from job_t_subtype where active_flag = 'Y' and job_type_id = $job_type_id";
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
			/*if(isset($status_code) &&$status_code !=''){
				$search .=" and o.job_status = '$status_code'";
			}*/
			
			$data = $this->session->userdata('login_object');
			if($data["deptid"]==8){//QC
				$search .=" and o.job_status = 'NEW'";
			}elseif($data["deptid"]==12){//Mechanic
				$search .=" and o.job_status = 'CHECK'";
			}elseif($data["deptid"]==4){//Marketing
				$search .=" and o.job_status = 'WAIT CONFIRM'";
			}elseif($data["deptid"]==10){//Planning
				$search .=" and o.job_status = 'CONFIRM'";
			}elseif($data["deptid"]==11){//production
				$search .=" and o.job_status = 'PROCESSING'";
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
		
		
	function getSearchStatus($status,$limit,$start){
			$search = "";
			
			/*$data = $this->session->userdata('login_object');
			if($data["deptid"]==8){//QC
				$search .=" and o.job_status = 'NEW'";
			}elseif($data["deptid"]==12){//Mechanic
				$search .=" and o.job_status = 'CHECK'";
			}elseif($data["deptid"]==4){//Marketing
				$search .=" and o.job_status = 'WAIT CONFIRM'";
			}elseif($data["deptid"]==10){//Planning
				$search .=" and o.job_status = 'CONFIRM'";
			}elseif($data["deptid"]==11){//production
				$search .=" and o.job_status = 'PROCESSING'";
			}*/
			$status = urldecode($status);
			$sql = "select * from job_t_orders  o
					join ar_t_customers c
					on o.customer_id = c.customer_id
					left join job_t_type jt
					on jt.job_type_id = o.job_type_id
					left join job_t_subtype js
					on js.sub_type_id = o.sub_type_id
					
					where o.job_status = '$status'
					order by job_no desc
					limit $start, $limit";
			//echo $sql;
			return $this->db->query($sql);
		}
		
		function getTotalSearchStatus($status){
			$search = "";
			
			$sql = "select count(*) total_row from job_t_orders  o
					join ar_t_customers c
					on o.customer_id = c.customer_id
					left join job_t_type jt
					on jt.job_type_id = o.job_type_id
					left join job_t_subtype js
					on js.sub_type_id = o.sub_type_id
					
					where o.job_status = '$status'";
			$result =  $this->db->query($sql);
			
			if($result->num_rows() > 0){
				return $result->row()->total_row;
			}
			return 0;
		}
		
		function approveJob($job_id){
			$data = $this->session->userdata('login_object');
			$status = "";
			if($data["deptid"]==8){//QC
				$status ="CHECK";
			}elseif($data["deptid"]==12){//Mechanic
				$status ="WAIT CONFIRM";
			}elseif($data["deptid"]==4){//Marketing
				$status ="CONFIRM";
			}elseif($data["deptid"]==10){//Planning
				$status ="PROCESSING";
			}elseif($data["deptid"]==11){//production
				$status ="CLOSED";
			}
			
			$sql = "UPDATE job_t_orders SET job_status = '$status' where job_id = $job_id";
			return $this->db->query($sql);
		}
		
		function getJobTypeById($id){
			$sql = "select * from job_t_type where job_type_id = $id";
			return $this->db->query($sql)->row();
		}
		
		function getJobTypeByJobNo($job_no){
			$sql = "select * from job_t_orders o
					join job_t_order_lines l
					on l.job_id = o.job_id
					where o.job_no = '$job_no' ";
			
			return $this->db->query($sql);
		}
		
		
// 		function getJobTypeByJobNoArray($job_no){
			
// 			if(count($job_no)>0){
				
// 				$job_no = implode("' or job_no='",$job_no);
// 				$sql = "select * from job_t_orders o
// 				join job_t_order_lines l
// 				on l.job_id = o.job_id
// 				where 1=1 or job_no='$job_no' ";
// 				return $this->db->query($sql);
// 			}
// 			return null;
// 		}
		
		
		function getJobSubTypeById($id){
			$sql = "select * from job_t_subtype where sub_type_id = $id";
			return $this->db->query($sql)->row();
		}
		
		function saveQuoteJob($post,$create_user = 0){
			$qoute_id = $post["quote_id"];
			//$job_id = $this->findJobIdByJobNo($post["job_no"]);
			
				foreach ($post["job_line"] as $jlid){
					
					$peice = explode(":", $jlid);
					$job_id = $peice[1];
					$job_line_id  = $peice[0];
					
					$sql = "insert into job_t_quote_jobs (quote_id,job_id,job_line_id,create_date,create_user)
					value ($qoute_id,$job_id,$job_line_id,now(),'$create_user')";
					$this->db->query($sql);
				}
		
			//$sql = "select * from job_t_subtype where sub_type_id = $id";
		}
		
		function findJobIdByJobNo($job_no){
			$sql = "select job_id from job_t_orders where job_no = '$job_no'";
			$result = $this->db->query($sql);
			if($result->num_rows() > 0){
				return $result->row()->job_id;
			}
			return 0;
		}
	}