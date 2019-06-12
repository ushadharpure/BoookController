<?php
/**
This controller is for user related funtionalities
*/

defined('BASEPATH') OR exit('No direct script access allowed');
class User extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();		
		$this->load->model('user_M', 'model');
	}
	public function index()
	{
		$data['data']=$this->model->get_list_data();
		$_SESSION['last_refresh']=date('d M Y h:i:s a');
		$this->load->view('user_L', $data);       
	}
	public function add_form($view)
	{
		$this->load->view($view);       
	}
	public function insert()
	{
		$result=$this->model->insert_data();  
		if($result)
			$this->index();
	}
	public function update_form($id)
	{
		$this->db->select('*');
        $this->db->where('user_id', $id);
		$query=$this->db->get('user_details');
        $data['data']=$query->row();
		$this->load->view('user_U', $data);       
	}
	public function update()
	{
		$result=$this->model->update_data();  
		if($result)
			$this->index();
	}
	public function delete($id)
	{
		$result=$this->model->delete_data($id);  
		if($result)
			$this->index();
	}
	public function today_birthday()
	{
        $query=$this->db->query("SELECT user_id, CONCAT(first_name, ' ', last_name) AS user_name, date_format( date_of_birth, '%d-%m-%Y') AS date_of_birth, address, pin_code, contact_number, status FROM user_details WHERE status!='Delete' AND date_format(date_of_birth, '%d-%m') = '".date('d-m')."' ORDER BY first_name ");
		$data['data'] = $query->result();
		$_SESSION['last_refresh']=date('d M Y h:i:s a');
		$this->load->view('user_L', $data);       
	}
}