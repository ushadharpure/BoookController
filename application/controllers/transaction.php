<?php
/**
This controller is for user transaction(issued/returned books) list
*/

defined('BASEPATH') OR exit('No direct script access allowed');
class Transaction extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();		
		$this->load->model('transaction_M', 'model');
	}
	public function index()
	{
		$data['data']=$this->model->get_list_data();
		$_SESSION['last_refresh']=date('d M Y h:i:s a');
		$this->load->view('transaction_L', $data);       
	}
}