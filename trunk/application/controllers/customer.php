<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Customer extends MY_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('quotation_model');
		$this->load->model('customer_model');
	}
	
	public function index()
	{
		$this->load->view('index');
	}
	
	function create($id=0){
		$data = array();
		
		if(($post = $this->input->post())
				&& isset($post['customer_id']))
		{
			
		//print_r($post);
			if($this->validateFormAddress($post)){
				$this->customer_model->createCustAddress($post,$this->user_id);
				redirect(base_url("customer/create/$id"),'refresh');
			}else{
				$data['warngin_msg2'] ="Please fill all field.";
				$data = array_merge($data, $post);
			}
		}else if($post = $this->input->post()){
			if($this->validateForm($post)){
				$id = $this->customer_model->createCustomer($post,$this->user_id);
				redirect(base_url("customer/create/$id/"));
			}else{
				$data['warngin_msg'] ="Please fill all field.";
				$data = array_merge($data, $post);
			}
		}
		
		if($id){
			$cusd = $this->customer_model->getCustomerById($id);
			$data['provice'] = $this->customer_model->getProvince();
			$data['bill'] =  $this->customer_model->getSite($id,"B");
			$data['ship'] =  $this->customer_model->getSite($id,"S");
			$data['customer_name'] = $cusd->customer_name;
			$data['customer_type'] = $cusd->customer_type;
			$data['customer_id'] = $id;
		}
		
		$this->load->view('customer/create',$data);
	}
	
	function search(){
		$data = array();
		if($post = $this->input->post()){
			$data['quot_search'] = $this->quotation_model->getSearch($post);
			$data = array_merge($data, $post);
		}
		$data['customer'] = $this->customer_model->getCustomer();
		$this->load->view('customer/search',$data);
	}
	
	function saveAddress(){
		$data = array();
		if($post = $this->input->post()){
			if($this->validateFormAddress($post)){
				$id = $this->customer_model->createCustomer($post,$this->user_id);
				redirect(base_url("customer/create/$id"));
			}else{
				$data['warngin_msg'] ="Please fill all field.";
				$data = array_merge($data, $post);
			}
		}
	}
	
	function validateFormAddress($post){
		extract($post);
		if($address1==""||$address2==""
		||$postcode==""||$country_code==""
		||$phone_number==""||$mobile_number==""
		||$contact_person==""||$province_code==""){
			return false;
		}
		return true;	
	}
	
	function t(){
		$this->load->view('customer/t');
	}
	
	function validateForm($post){
		extract($post);
		if($customer_type==""||$customer_name==""){
			return false;
		}
		return true;	
	}
	
	public function xsearch()
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
		
		$data['item_cat'] = $this->quotation_model->getItemCatagory();
		$this->load->view('quotation/create_line',$data);
	}
	
	function sale_item_ajax($category){
		$item_cat = $this->quotation_model->getItemCatagoryName($category);
		$total = $this->quotation_model->getItemCatagoryRecord($category);
		$data['sale_item'] = $item_cat;
		echo $this->load->view('quotation/sale_item',$data,false);
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */