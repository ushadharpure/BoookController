<?php
/**
This model is for book related database queries
*/

class Book_M extends CI_Model
{
    public function get_list_data()
    {
        $query=$this->db->query("SELECT book.book_id, book_name, author, pub_year, price, stock, book.status, IFNULL(trans_id, 0) AS trans_flag FROM book_details AS book
        LEFT OUTER JOIN transactions AS trans ON book.book_id = trans.book_id AND trans.status != 'Return'
        WHERE book.status!='Delete' ORDER BY status ASC, book_name ");
        return json_encode($query->result());
    }
    public function insert_data($data)
    {  
        $data=json_decode($data); 
        return $this->db->insert('book_details', $data);
    }
    public function update_data()
    {    
        $data = array(
            'book_name' => $this->input->post('book_name'),
            'author' => $this->input->post('author'),
            'pub_year' => $this->input->post('pub_year'),
            'price' => $this->input->post('price'),
            'status' => $this->input->post('status')
        );
        $this->db->where('book_id', $this->input->post('book_id'));
        return $this->db->update('book_details', $data);
    }
    public function delete_data($id)
    {
        $data= array('status' => 'Delete');
        $this->db->where('book_id', $id);
        return $this->db->update('book_details', $data);
    }
}
?>