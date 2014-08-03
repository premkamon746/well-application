<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Authorize extends CI_Controller {

	public function __construct(){
		parent::__construct();
	}
	
	public function index(){}
	
	public function login()
	{
		
		if($post = $this->input->post()){
			echo "xxxxxxxxx";
			extract($post);
			$this->load->model('autorize_model');
			
			if($this->autorize_model->isUser($user, $password))
			{
				redirect('index');
			}
		}
		$this->load->view('login');
	}
}
