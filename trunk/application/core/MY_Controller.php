<?php

class MY_Controller extends CI_Controller
{
	protected $user_id;
	protected $user_name;
	
	function __construct(){
		parent::__construct();
	
		if($data = $this->session->userdata('login_object')){
			//print_r($data);
			$this->user_name = $data['uname'];
			$this->user_id = $data['uid'];
		}else{
			redirect(base_url('authorize/login'));
		}
	}
	
	function logout(){
		$this->session->unset_userdata('login_object');
		redirect("authorize/login");
	}
}