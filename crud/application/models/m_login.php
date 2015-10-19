<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class m_login extends CI_Model {
  public function __construct(){
    parent::__construct();
  }
  
  public function ambilPengguna($username, $password, $status){
    $this->db->select('*');
    $this->db->from('tbl_user');
    $this->db->where('username', $username);
    $this->db->where('password', $password);
    $this->db->where('status', $status);
    $query = $this->db->get();
    
    return $query->num_rows();
  }
  
  public function dataPengguna($username){
    $this->db->select('username');
    $this->db->select('nama');
    $this->db->where('username', $username);
    $query = $this->db->get('tbl_user');
   
    return $query->row();
  }
}  
?>