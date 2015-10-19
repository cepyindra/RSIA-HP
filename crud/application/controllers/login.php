<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
  
  public function __construct(){
    parent::__construct(); 
    $this->load->model('m_login');  
    $this->load->library(array('form_validation','session')); 
    $this->load->database(); 
    $this->load->helper('url');  
  }
  
  public function index(){
    $session = $this->session->userdata('isLogin');
      
      if($session == FALSE){
        redirect('login/login_form');
      }else{
        redirect('home');
      }
  }
  
  public function login_form(){
    $this->form_validation->set_rules('username', 'Username', 'required|trim');
    $this->form_validation->set_rules('password', 'Password', 'required|md5');
    $this->form_validation->set_error_delimiters('<span class="error">', '</span>');
    
      if($this->form_validation->run()==FALSE){
        $this->load->view('form_login');
      }else{
        $username = $this->input->post('username');
        $password = $this->input->post('password');
       
        $cek = $this->m_login->ambilPengguna($username, $password, 1);
 
          if($cek <> 0){
            $this->session->set_userdata('isLogin',TRUE);
            $this->session->set_userdata('username',$username);
            redirect('home');
          }else{
            echo "<script>
		              alert('Gagal Login: Cek username dan password Anda!');
		              history.go(-1);
		              </script>";        
          }
      }  
  }
  
  public function logout(){
    $this->session->sess_destroy();
    redirect('login/login_form');
  }
}
?>