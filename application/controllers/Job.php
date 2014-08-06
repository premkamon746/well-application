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
		$data['customer'] = $this->job_model->getCustomer();
		$data['job_type'] = $this->job_model->getJobType();
		$data['job_subtype'] = $this->job_model->getJobSubtype();
		$this->load->view('job/create',$data);
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