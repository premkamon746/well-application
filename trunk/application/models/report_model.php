<?php
	class Report_model extends CI_Model{
		function __construct(){
			parent::__construct();
		}
		
		function note($from, $to, $customer_id){
			$cond = "";
			
			if($from != ""){
				$cond .=" and job.job_end_date between '$from' and '$to' ";
			}
			
			if($customer_id > 0){
				$cond .=" and cus.customer_id ='$customer_id'";
			}
			$sql = "select customer_name, 'Normal' as tt
					,DATE_FORMAT(job_date,'%d/%m/%Y') job_date, job_no, type_name
					, DATE_FORMAT(job_end_date,'%d/%m/%Y')  job_end_date, quote_number
					, qh.quote_status,
				(select sum(line_amount) from job_t_quote_lines ql where ql.quote_id = qh.quote_id ) as amount
				
				from job_t_orders job
				left join ar_t_customers cus
				on job.customer_id = cus.customer_id
				left join job_t_type typ
				on job.job_type_id = typ.job_type_id
				left join job_t_quote_jobs qj
				on qj.job_id = job.job_id
				left join job_t_quote_headers qh
				on qj.quote_id = qh.quote_id
				
				where job_status = 'CLOSE'  $cond";

				$result = $this->db->query($sql);
				return $result;
		}
		
		
		function job($from, $to, $job_status){
			$cond = "";
				
			if($from != ""){
				$cond .=" and job.job_end_date between '$from' and '$to' ";
			}
				
			if($job_status !=""){
				$cond .=" and job.job_status ='$job_status'";
			}
			$sql = "select DATE_FORMAT(job_date,'%d/%m/%Y') job_date, job_no
			, type_name,
			DATE_FORMAT(job_end_date,'%d/%m/%Y') job_end_date,job_status
			from job_t_orders job
			left join job_t_type typ
			on job.job_type_id = typ.job_type_id
		
			where 1  $cond";
			//echo $sql;
			$result = $this->db->query($sql);
			return $result;
		}
		
		function quote($from, $to, $customer_id){
			$cond = "";
			if($from != ""){
				$cond .=" and quo.quote_date between '$from' and '$to' ";
			}
			
			if($customer_id > 0){
				$cond .=" and cus.customer_id ='$customer_id'";
			}
			
			$sql = "select DATE_FORMAT(quote_date,'%d/%m/%Y') quote_date
							,sales_name
							,quote_number
							,quote_status
							,customer_name
							,(select sum(line_amount) from job_t_quote_lines l where l.quote_id = quo.quote_id ) amount
						from job_t_quote_headers quo
					left join ar_t_customers cus
					on quo.customer_id = cus.customer_id
					left join ar_salesrep sal
					on sal.salesrep_id = quo.salesrep_id
					where 1  $cond";
			//echo $sql;
			$result = $this->db->query($sql);
			return $result;
		}
		
		function count_job($status=""){
				
			if($status!=""){
				$sql = "select count(*) TOTAL
				from job_t_orders job
				where job_status = '$status' ";
			}else{
				$sql = "select count(*) TOTAL
						from job_t_orders job";
			}
			$result = $this->db->query($sql);
			if($result->num_rows() > 0){
				//print_r( $result->row());
				return $result->row()->TOTAL;
			}
			
				return 0;
		}
		
		function count_quote($status=""){
		
			if($status!=""){
				$sql = "select count(*) TOTAL
				from job_t_quote_headers
				where quote_status = '$status' ";
			}else{
				$sql = "select count(*) TOTAL
						from job_t_quote_headers";
			}
			$result = $this->db->query($sql);
			if($result->num_rows() > 0){
				//print_r( $result->row());
				return $result->row()->TOTAL;
			}
				
			return 0;
		}
}


















