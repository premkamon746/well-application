<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Quotation extends MY_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('quotation_model');
		$this->load->model('customer_model');
	}
	
	public function index()
	{
		$this->load->view('index');
	}
	
	function create(){
		$data = array();
		//print_r($this->input->post());
		if($post = $this->input->post()){
			if($this->validateForm($post)){
				$id = $this->quotation_model->createQuotation($post,$this->user_id);
				redirect(base_url("quotation/line/$id"));
			}else{
				$data['warngin_msg'] ="Please fill all field.";
				$data = array_merge($data, $post);
			}
		}
		
		$data['customer'] = $this->customer_model->getCustomer();
		$data['term'] = $this->quotation_model->getCreditTerm();
		
		$this->load->view('quotation/create',$data);
	}
	
	function validateForm($post){
		extract($post);
		if($quote_date==""||$customer_id==""||$bill_to_id==""
			||$ship_to_id==""||$contact_person==""||$attention==""
			||$cc_to==""||$subject==""||$email=="" ||$remarks==""){
			return false;
		}
		return true;	
	}
	
	public function search()
	{
		$data = array();
		
		if($post = $this->input->post()){
			$data['quot_search'] = $this->quotation_model->getSearch($post);
			$data = array_merge($data, $post);
		}
		
		$data['customer'] = $this->customer_model->getCustomer();
		
		$this->load->view('quotation/search',$data);
	}
	
	public function search_detail($id)
	{
		$data = array();
		$this->load->helper("job");
		$data['job'] = $this->job_model->getJobCustomerDetail($id);
		
		if($post = $this->input->post()){
			$this->job_model->createJobDetail($post,$id,$this->user_id);
		}
		$data['job_line'] = $this->job_model->getJobLine($id);
		$this->load->view('job/search_detail',$data);
	}
	
	public function line($id)
	{
		$data = array();
		
		if($post = $this->input->post()){
			//$data['quot_search'] = $this->quotation_model->getSearch($post);
			//$data = array_merge($data, $post);
		}
		
		
		$this->load->view('quotation/create_line',$data);
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */