<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Job extends MY_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('job_model');
	}
	
	public function index()
	{
		$this->load->view('index');
	}
	
	public function create()
	{
		$data = array();
		
		
		if($post = $this->input->post()){
			if($this->validateForm($post)){
				$this->job_model->createJob($post);
			}else{
				$data['warngin_msg'] ="Please fill all field.";
				$data = array_merge($data, $post);
			}
		}
		
		
		$data['customer'] = $this->job_model->getCustomer();
		$data['job_type'] = $this->job_model->getJobType();
		$data['job_subtype'] = $this->job_model->getJobSubtype();
		
		
		$this->load->view('job/create',$data);
	}
	
	public function search()
	{
		$data = array();
		
		if($post = $this->input->post()){
			$data['job_search'] = $this->job_model->getSearch($post);
			$data = array_merge($data, $post);
		}
		
		
		$data['customer'] = $this->job_model->getCustomer();
		$data['job_type'] = $this->job_model->getJobType();
		$data['job_subtype'] = $this->job_model->getJobSubtype();
		$data['job_status'] = $this->job_model->getJobStatus();
		
		$this->load->view('job/search',$data);
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
		 $result = $this->job_model->getSite($cid);
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