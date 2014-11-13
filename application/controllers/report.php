<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Report extends MY_Controller {
	public $pdf;
	function __construct(){
		parent::__construct();
		$this->load->model('report_model');
		$this->load->model('customer_model');
		$this->load->model('job_model');
	}
	
	public function index()
	{
		$this->load->view('index');
	}
	
	public function note(){
		
		$data['customer'] = $this->customer_model->getCustomer();
		//print_r($data['close_search']->result());
		
		if($post = $this->input->post()){

			$from = $this->convDate($post['job_end_date_start']);
			$to = $this->convDate($post['job_end_date_end']);
			$customer_id = $post['customer_id'];
			
			if($from !="" && $to !=""){
				$data['close_search'] = $this->report_model->note($from,$to,$customer_id);
				$data["from"] = $post['job_end_date_start'];
				$data["to"] = $post['job_end_date_end'];
				$data["customer_id"] = $customer_id;
			}else{
				$data["message"] = "Please select start and end date.";
			}
		}
		$this->load->view('report/note_report',$data);
	}
	
	public function job(){
	
		$data['js'] 			= $this->job_model->getJobStatus();
		$data['total'] 			= $this->report_model->count_job();
		$data['CHECK'] 			= $this->report_model->count_job('CHECK');
		$data['CLOSED'] 		= $this->report_model->count_job('CLOSE');
		$data['CONFIRM'] 		= $this->report_model->count_job('CONFIRM');
		$data['NEW'] 			= $this->report_model->count_job('NEW');
		$data['PROCESSING'] 	= $this->report_model->count_job('PROCESSING');
		$data['WAIT_CONFIRM'] 	= $this->report_model->count_job('WAIT CONFIRM');
		$data['CANCEL'] 		= $this->report_model->count_job('CANCEL');

		//print_r($data['close_search']->result());
	
		if($post = $this->input->post()){
	
			$from = $this->convDate($post['job_end_date_start']);
			$to = $this->convDate($post['job_end_date_end']);
			$job_status = $post['customer_id'];
				
			if($from !="" && $to !=""){
				$data['close_search'] = $this->report_model->job($from,$to,$job_status);
				$data["from"] = $post['job_end_date_start'];
				$data["to"] = $post['job_end_date_end'];
				$data["customer_id"] = $job_status;
			}else{
				$data["message"] = "Please select start and end date.";
			}
		}
		$this->load->view('report/job_report',$data);
	}
	
	public function quote(){
	
		$data['customer'] = $this->customer_model->getCustomer();
		$data['total'] 			= $this->report_model->count_quote();
		$data['NEW'] 			= $this->report_model->count_quote('NEW');
		$data['APPROVE'] 		= $this->report_model->count_quote('APPROVE');
		$data['CANCEL'] 		= $this->report_model->count_quote('CANCEL');
		//print_r($data['close_search']->result());
	
		if($post = $this->input->post()){
	
			$from = $this->convDate($post['job_end_date_start']);
			$to = $this->convDate($post['job_end_date_end']);
			$customer_id = $post['customer_id'];
				
			if($from !="" && $to !=""){
				$data['close_search'] = $this->report_model->quote($from,$to,$customer_id);
				$data["from"] = $post['job_end_date_start'];
				$data["to"] = $post['job_end_date_end'];
				$data["customer_id"] = $customer_id;
			}else{
				$data["message"] = "Please select start and end date.";
			}
		}
		$this->load->view('report/quote_report',$data);
	}
	
	function convDate($date){
		list($d ,$m ,$y) = explode("/",$date);
		return $y."-".$m."-".$d;
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */