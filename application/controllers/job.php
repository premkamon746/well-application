<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Job extends MY_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('job_model');
		$this->load->model('customer_model');
	}
	
	public function index()
	{
		$this->load->view('index');
	}
	
	public function create()
	{
		//echo $this->user_id."xxxxxxxxx";
		$data = array();
		if($post = $this->input->post()){
			if($this->validateForm($post)){
				$id = $this->job_model->createJob($post,$this->user_id);
				redirect(base_url("job/search_detail/$id"));
			}else{
				$data['warngin_msg'] ="Please fill all field.";
				$data = array_merge($data, $post);
			}
		}
		
		
		$data['customer'] = $this->customer_model->getCustomer();
		$data['job_type'] = $this->job_model->getJobType();
		$data['job_subtype'] = $this->job_model->getJobSubtype();
		
		
		$this->load->view('job/create',$data);
	}
	
	public function detail($id)
	{
		$data = array();
		$data['job'] = $this->job_model->getJob($id);
		
		if($post = $this->input->post()){
			$this->job_model->createJobDetail($post,$id,$this->user_id);
		}
		$data['job_line'] = $this->job_model->getJobLine($id);
		$this->load->view('job/detail',$data);
	}
	
	
	public function search()
	{
		$data = array();
		
		if($post = $this->input->post()){
			$data['job_search'] = $this->job_model->getSearch($post);
			$data = array_merge($data, $post);
		}
		
		
		$data['customer'] = $this->customer_model->getCustomer();
		$data['job_type'] = $this->job_model->getJobType();
		$data['job_subtype'] = $this->job_model->getJobSubtype();
		$data['job_status'] = $this->job_model->getJobStatus();
		
		$this->load->view('job/search',$data);
	}
	
	
	public function search_detail($job_id)
	{
		$data = array();
		$this->load->helper("job");
		$data['job'] = $this->job_model->getJobCustomerDetail($job_id);
		
		if($post = $this->input->post()){
			$this->job_model->createJobDetail($post,$job_id,$this->user_id);
		}
		
		$sess = $this->session->userdata('login_object');
		$status = "";
		if($sess["deptid"]==8){//QC
				$status ="NEW";
			}elseif($sess["deptid"]==12){//Mechanic
				$status ="CHECK";
			}elseif($sess["deptid"]==4){//Marketing
				$status ="WAIT CONFIRM";
			}elseif($sess["deptid"]==10){//Planning
				$status ="CONFIRM";
			}elseif($sess["deptid"]==11){//production
				$status ="PROCESSING";
			}
		
		$data['job_status'] = $status;
		$data['job_id'] = $job_id;
		$data['job_line'] = $this->job_model->getJobLine($job_id);
		$this->load->view('job/search_detail',$data);
	}
	

	public function approve_job(){
		if($job_id = $this->input->post("job_id")){
			$this->job_model->approveJob($job_id);
			redirect(base_url("job/search_detail/$job_id"));
		}
	}
	
	function validateForm($post){
		extract($post);
		if($customer_id==""||$ship_to_id==""||$job_date==""
			||$job_end_date==""||$tag_no==""||$job_type_id==""
			||$sub_type_id==""||$serial_number==""){
			return false;
		}	
		return true;
	}
	
	public function get_cust_site_ajax($cid){
		 $result = $this->customer_model->getSite($cid);
		 $res_arr = array();
		 $i = 0;
		 foreach($result->result() as $r){
		 	$data = array(
		 		"site_id"=>$r->site_id
		 		, "address"=>$r->address1);
		 	$res_arr[$i++] = $data;
		 }
		 echo json_encode($res_arr);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */