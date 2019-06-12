<?php
/**
This model is for transaction related database queries
*/

class Transaction_M extends CI_Model
{
    public function get_list_data()
    {
        $query=$this->db->query("SELECT CONCAT(first_name, ' ', last_name) AS user_name, book_name, date_format(date_of_issue, '%d-%m-%Y') AS date_of_issue, date_format(date_of_return, '%d-%m-%Y') AS date_of_return, trans.status AS status FROM transactions AS trans 
            INNER JOIN book_details AS book ON trans.book_id = book.book_id
            INNER JOIN user_details AS user ON trans.user_id = user.user_id
            WHERE trans.status!='Delete'
            ORDER BY trans_id DESC ");
        return json_encode($query->result());
    }
}
?>