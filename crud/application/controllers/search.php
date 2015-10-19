<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Search extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('url'));
		$this->load->database();
		$this->load->library(array('pagination','session'));
		$this->load->model('m_search');
	}

	function index()
	{
        //$this->load->view('search/front');
	}
	
	function Search()
	{
		$page=$this->uri->segment(3);
      	$batas=5;
		if(!$page):
		$offset = 0;
		else:
		$offset = $page;
		endif;	
		
		$data['nama']="";
		$postkata = $this->input->post('nama');
		if(!empty($postkata))
		{
			$data['nama'] = $this->input->post('nama');
			$this->session->set_userdata('pencarian_pasien', $data['nama']);
		} 
		else 
		{
			$data['nama'] = $this->session->userdata('pencarian_pasien');
		}
		$data['nama_pasien'] = $this->m_search->cari_pasien($batas,$offset,$data['nama']);
		$tot_hal = $this->m_search->tot_hal('tbl_pasien','nama_pasien',$data['nama']);
		
		$config['base_url'] = base_url() . 'search/Search/';
        	$config['total_rows'] = $tot_hal->num_rows();
        	$config['per_page'] = $batas;
			$config['uri_segment'] = 3;
	    	$config['first_link'] = 'Awal';
			$config['last_link'] = 'Akhir';
			$config['next_link'] = 'Selanjutnya';
			$config['prev_link'] = 'Sebelumnya';
       		$this->pagination->initialize($config);
		$data["paginator"] =$this->pagination->create_links();
		$this->load->view('header');
        $this->load->view('search/result',$data);
        $this->load->view('footer');
	}
}