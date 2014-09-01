<?php

class MY_Controller extends CI_Controller
{
	protected $user_id;
	protected $user_name;
	public $role_id;
	public $dept_id;
	public $approve_flag; 
	
	function __construct(){
		parent::__construct();
	
		if($data = $this->session->userdata('login_object')){
			//print_r($data);
			$this->user_name = $data['uname'];
			$this->user_id = $data['uid'];
			$this->role_id = $data['rid'];
			$this->dept_id = $data['deptid'];
			$this->approve_flag = $data['aflag'];
		}else{
			redirect(base_url('authorize/login'));
		}
	}
	
	function test(){
		$this->load->view('test/test');
	}
	
	function logout(){
		$this->session->unset_userdata('login_object');
		redirect("authorize/login");
	}
}







