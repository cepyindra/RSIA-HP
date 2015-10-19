<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dokter extends CI_Controller {

  public function __construct(){
    parent::__construct();
    $this->load->library(array('session')); 
    $this->load->helper(array('url')); 
    $this->load->helper('url'); 
    $this->load->database(); 
    $this->load->library(array('pagination','session'));   
    $this->load->model('m_dokter');
    $this->load->model('m_search_nama_dokter');
    $this->load->model('m_login');
  }

  public function index(){
    $data['sql1'] = $this->m_dokter->getDokter();
    $this->load->view('header');
    $this->load->view('dokter',$data);
    $this->load->view('footer');
  }

  public function add(){
    $data['op'] = 'add';
    $this->load->view('header');
    $this->load->view('form_tambah_dokter',$data);
    $this->load->view('footer');
  }

  public function save(){
    $op = $this->input->post('op');  
    $id_dokter = $this->input->post('id_dokter');  
    $nama_dokter = $this->input->post('nama_dokter');  
    $alamat = $this->input->post('alamat');
    $no_telp = $this->input->post('no_telp');
    
    $data = array(
      'nama_dokter' => $nama_dokter,
      'alamat' => $alamat,
      'no_telp' => $no_telp
      );

    if($op=="add"){
      $this->m_dokter->save($data);  
    } 
    else{
        $this->m_dokter->update($id_dokter,$data);
    }    
    redirect('dokter');
  }

  public function delete($id){
    $this->m_pasien->delete($id);
    redirect('dokter');
  }

  public function edit($id){
    $data['op'] = 'edit';
    $data['sql'] = $this->m_pasien->edit($id);
    $this->load->view('header');
    $this->load->view('form_tambah_dokter',$data);
    $this->load->view('footer');   
  }
}
?>
