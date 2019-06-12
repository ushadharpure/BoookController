<?php
/**
This model is for user related database queries
*/

class User_M extends CI_Model
{
    public function get_list_data()
    {
        $query=$this->db->query("SELECT user_id, CONCAT(first_name, ' ', last_name) AS user_name, date_format( date_of_birth, '%d-%m-%Y') AS date_of_birth, address, pin_code, contact_number, status FROM user_details WHERE status!='Delete' ORDER BY first_name ");
        return $query->result();
    }
    public function insert_data()
    {    
        $data = array(
            'first_name' => $this->input->post('first_name'),
            'last_name' => $this->input->post('last_name'),
            'date_of_birth' => $this->input->post('date_of_birth'),
            'address' => $this->input->post('address'),
            'pin_code' => $this->input->post('pin_code'),
            'contact_number' => $this->input->post('contact_number'),
            'status' => 'Active'
        );
        return $this->db->insert('user_details', $data);
    }
    public function update_data()
    {    
        $data = array(
            'first_name' => $this->input->post('first_name'),
            'last_name' => $this->input->post('last_name'),
            'date_of_birth' => $this->input->post('date_of_birth'),
            'address' => $this->input->post('address'),
            'pin_code' => $this->input->post('pin_code'),
            'contact_number' => $this->input->post('contact_number'),
            'status' => $this->input->post('status')
        );
        $this->db->where('user_id', $this->input->post('user_id'));
        return $this->db->update('user_details', $data);
    }
    public function delete_data($id)
    {
        $data= array('status' => 'Delete');
        $this->db->where('user_id', $id);
        return $this->db->update('user_details', $data);
    }
}
?>