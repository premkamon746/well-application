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
		$data['customer'] = $this->customer_model->getCustomer();
		$this->load->view('quotation/create',$data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */