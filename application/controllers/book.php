<?php
/**
This controller is for book related funtionalities
*/

defined('BASEPATH') OR exit('No direct script access allowed');
class Book extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();		
		$this->load->model('book_M', 'model');
	}
	public function index()
	{
		$data['data']=$this->model->get_list_data();
		$_SESSION['last_refresh']=date('d M Y h:i:s a');
		$this->load->view('book_L', $data);       
	}
	public function add_form($view)
	{
		$this->load->view($view);       
	}
	public function open_issue_return($view, $id)
	{
		$this->db->select('*');
        $this->db->where('book_id', $id);
		$query=$this->db->get('book_details');
        $data['data']=$query->row();
        $query=$this->db->query("SELECT user_id, CONCAT(first_name, ' ', last_name) AS user_name FROM user_details WHERE status!='Delete' ORDER BY status ASC ");
        $data['user_list']=$query->result();
		$this->load->view($view, $data);       
	}
	public function insert()
	{
        $data = array(
            'book_name' => $this->input->post('book_name'),
            'author' => $this->input->post('author'),
            'pub_year' => $this->input->post('pub_year'),
            'price' => $this->input->post('price'),
            'stock' => $this->input->post('stock'),
            'status' => 'Active'
        );
        $data=json_encode($data);
		$result=$this->model->insert_data($data);  
		if($result)
			$this->index();
	}
	public function update_form($id)
	{
		$this->db->select('*');
        $this->db->where('book_id', $id);
		$query=$this->db->get('book_details');
        $data['data']=$query->row();
		$this->load->view('book_U', $data);       
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
	//For Issueing Book
	public function issue_book() 
	{
        $data = array(
            'book_id' => $this->input->post('book_id'),
            'user_id' => $this->input->post('user_id'),
            'date_of_issue' => date('Y-m-d'),
            'status' => 'Issue'
        );
		$this->db->insert('transactions', $data);
        $query=$this->db->query("UPDATE book_details SET stock = stock - 1 WHERE book_id = ".$this->input->post('book_id'));
		redirect('transaction');
	}
	//For Returning Book
	public function return_book() 
	{
        $data = array(
            'date_of_return' => date('Y-m-d'),
            'status' => 'Return'
        );
        $this->db->where('book_id', $this->input->post('book_id'));
        $this->db->where('user_id', $this->input->post('user_id'));
		$this->db->update('transactions', $data);
        $query=$this->db->query("UPDATE book_details SET stock = stock + 1 WHERE book_id = ".$this->input->post('book_id'));
		redirect('transaction');
	}
	//Dashboard Available Books card will redirect from here
	public function available()
	{
        $query=$this->db->query("SELECT book.book_id, book_name, author, pub_year, price, stock, book.status, IFNULL(trans_id, 0) AS trans_flag FROM book_details AS book
        LEFT OUTER JOIN transactions AS trans ON book.book_id = trans.book_id AND trans.status != 'Return'
        WHERE book.status!='Delete' AND stock > 0 ORDER BY status ASC, book_name ");
		$data['data'] = json_encode($query->result());
		$_SESSION['last_refresh']=date('d M Y h:i:s a');
		$this->load->view('book_L', $data);       
	}
	//Dashboard Stockout card will redirect from here
	public function stockout()
	{
        $query=$this->db->query("SELECT book.book_id, book_name, author, pub_year, price, stock, book.status, IFNULL(trans_id, 0) AS trans_flag FROM book_details AS book
        LEFT OUTER JOIN transactions AS trans ON book.book_id = trans.book_id AND trans.status != 'Return'
        WHERE book.status!='Delete' AND stock = 0 ORDER BY status ASC, book_name ");
		$data['data'] = json_encode($query->result());
		$_SESSION['last_refresh']=date('d M Y h:i:s a');
		$this->load->view('book_L', $data);       
	}
}