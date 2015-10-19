<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pasien extends CI_Controller {

  public function __construct(){
    parent::__construct();
    $this->load->library(array('session')); 
    $this->load->helper(array('url')); 
    $this->load->helper('url'); 
    $this->load->database(); 
    $this->load->library(array('pagination','session'));   
    $this->load->model('m_pasien');
    $this->load->model('m_search');
    $this->load->model('m_login');
  }

  public function index(){
    $data['sql1'] = $this->m_pasien->getPasien();
    $this->load->view('header');
    $this->load->view('pasien',$data);
    $this->load->view('footer');
  }

  public function add(){
    $data['op'] = 'add';
    $this->load->view('header');
    $this->load->view('form_tambah_pasien',$data);
    $this->load->view('footer');
  }

  public function save(){
    $op = $this->input->post('op');  
    $id_pasien = $this->input->post('id_pasien');  
    $nama_pasien = $this->input->post('nama_pasien');  
    $alamat = $this->input->post('alamat');
    $no_telp = $this->input->post('no_telp');
    
    $data = array(
      'nama_pasien' => $nama_pasien,
      'alamat' => $alamat,
      'no_telp' => $no_telp
      );

    if($op=="add"){
      $this->m_pasien->save($data);  
    } 
    else{
        $this->m_pasien->update($id_pasien,$data);
    }    
    redirect('pasien');
  }

  public function delete($id){
    $this->m_pasien->delete($id);
    redirect('pasien');
  }

  public function edit($id){
    $data['op'] = 'edit';
    $data['sql'] = $this->m_pasien->edit($id);
    $this->load->view('header');
    $this->load->view('form_tambah_pasien',$data);
    $this->load->view('footer');   
  }
}
?>