<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Job extends MY_Controller {

	function __construct(){
		parent::__construct();
	}
	
	public function index()
	{
		$this->load->view('index');
	}
	
	public function create()
	{
		$this->load->view('job/create');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */