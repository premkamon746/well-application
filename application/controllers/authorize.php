<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Authorize extends CI_Controller {

	public function __construct(){
		parent::__construct();
	}
	
	public function index(){}
	
	public function login()
	{
		$data = array();
		$post = $this->input->post();
		if($post = $this->input->post()){
			extract($post);
			$this->load->model('autorize_model');
			
			if($user_data = $this->autorize_model->isUser($user, $password))
			{
				//print_r($user_data);
				$this->setSession($user_data);
				redirect('index');
			}else{
				$data["alert_msg"] = "Invalid username or password";
			}
		}
		$this->load->view('login',$data);
	}
	
	public function setSession($user_data){
		$du = array("uname"	=>$user_data->usr_name,
					"uid"	=>$user_data->user_id,
					"rid"	=>$user_data->role_id,
					"deptid"	=>$user_data->dept_id,
					"aflag"	=>$user_data->approve_flag);
		$this->session->set_userdata('login_object',$du);
		//$this->session->set_userdata('uid',$user_data->user_id);
	}
}
