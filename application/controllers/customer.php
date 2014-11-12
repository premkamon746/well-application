<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Customer extends MY_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('quotation_model');
		$this->load->model('customer_model');
		$this->load->model('employee_model');
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
				if($id){
					$this->customer_model->updateCustomer($post,$id);
					redirect(base_url("customer/create/$id/"));
				}
				else{
					$id = $this->customer_model->createCustomer($post,$this->user_id);
					redirect(base_url("customer/create/$id/"));
				}
			}else{
				$data['warngin_msg'] ="Please fill all field.";
				$data = array_merge($data, $post);
			}
		}
		
		
		
		if($id){
			$cusd = $this->customer_model->getCustomerById($id);
			$data['provice'] = $this->customer_model->getProvince();
			$data['bill'] =  $this->customer_model->getSite($id,"BILL");
			$data['ship'] =  $this->customer_model->getSite($id,"SHIP");
			$data['customer_name'] = $cusd->customer_name;
			$data['customer_type'] = $cusd->customer_type;
			$data['tax_number'] = $cusd->tax_number;
			
			$data['effective_date_from'] = $cusd->effective_date_from;
			$data['effective_date_to'] = $cusd->effective_date_to;
			$data['customer_id'] = $id;
			$data['credit_term'] = $cusd->credit_term;
			$data['default_sales'] = $cusd->default_sales;
			
			
			$data['country'] = $this->customer_model->getCountry();
		}
		
		$data['sale_rep'] = $this->employee_model->getSaleRep();
		$data['term'] = $this->quotation_model->getCreditTerm();
		
		$this->load->view('customer/create',$data);
	}
	
	function search(){
		$data = array();
		if(($post = $this->input->post())|| ($post = $this->session->userdata("c_serch"))) {
			
			$this->load->library('pagination');
			
			$config['base_url'] = base_url()."customer/search";
			$config['total_rows'] = $this->customer_model->getTotalSearch($post);
			$config['per_page'] = 10;
			$config['uri_segment'] = 3;
			$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
			
			//		$config['full_tag_open'] = '<li>';
			//		$config['full_tag_close'] = '</li>';
// 			$config['cur_tag_open'] = '<li class="disabled"><a>';
// 			$config['cur_tag_close'] = '</a></li>';
			
// 			$config['num_tag_open'] = '<li>';
// 			$config['num_tag_close'] = '</li>';
// 			$config['prev_tag_open'] = '<li>';
// 			$config['prev_tag_close'] = '</li>';
			
// 			$config['next_tag_open'] = '<li>';
// 			$config['next_tag_close'] = '</li>';
			
			$this->pagination->initialize($config);
			$data['pagination'] =  $this->pagination->create_links();
			
			
			$data['customer_search'] = $this->customer_model->getSearch($post,$config["per_page"],$page);
			
			$data = array_merge($data, $post);
			$this->session->set_userdata("c_serch",$post);
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
		//print_r($post);
		if($address1==""
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
		if($customer_type==""||$customer_name==""||$tax_number==""){
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