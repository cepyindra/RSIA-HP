<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class About extends CI_Controller {

  public function __construct(){
    parent::__construct();
    
  }

  public function index(){
  	$this->load->library('googlemaps');

  	$config['center'] = '-6.941547, 107.664376';
  	$config['zoom'] = '17';
  	$this->googlemaps->initialize($config);

  	$marker = array();
  	$marker['position'] = '-6.941547, 107.664376';
  	$this->googlemaps->add_marker($marker);
  	$data['map'] = $this->googlemaps->create_map();

    $this->load->view('header');
    $this->load->view('about', $data);
    $this->load->view('footer');
  }
}
?>
