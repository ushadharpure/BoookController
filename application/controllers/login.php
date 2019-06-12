<?php
/**
This controller is for login and logout
*/

defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();		
		$this->load->model('Login_Model', 'model');
	}
	public function index($msg = NULL)
	{
		$data['msg'] = $msg;
		$this->load->view('login_view', $data);       
	}
	public function process()
	{
		$this->form_validation->set_rules('user_name', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		if ($this->form_validation->run() == FALSE)
		{
			$msg = "<center style='color:red;font-weight:bold;font-size:17px'>Username and Password are mandatory.</center><br />";
			$this->index($msg);
			return;
		}
        else
			$result = $this->model->validate();

		if($result['num_rows']==0)
		{
			$msg = "<center style='color:red;font-weight:bold;font-size:17px'>Invalid Username and/or Password.</center><br />";
			$this->index($msg);
		}
		else
		{
			$this->session->set_userdata('user_name', $result['data']->user_name);
			$this->session->set_userdata('last_refresh', date('d M Y h:i:s a'));
			redirect('home');
		}
	}
	public function logout()
	{
		$msg = "<center style='color:green;font-weight:bold;font-size:17px'>You are Successfully Logged Out.</center><br />";
		$this->index($msg);
	}
}