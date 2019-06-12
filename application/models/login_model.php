<?php
/**
This model is for login related database queries
*/

class Login_Model extends CI_Model
{
  public function validate()
  {
    $user_name=$this->input->post("user_name");
    $password=$this->input->post("password");

    $this->db->where('username', $user_name);
    $this->db->where('password', $password);
    $this->db->where('status', 'Active');

    $query=$this->db->get('login_details');
    $data['num_rows']=$query->num_rows();
    $data['data']=$query->row();
    return $data;
  }
}
?>