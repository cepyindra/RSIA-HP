<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class m_search extends CI_Model{

	function __construct()
	{
		parent::__construct();
	}
	function cari_pasien($limit,$offset,$nama)
	{
		$q = $this->db->query("select * from tbl_pasien where nama_pasien like '%$nama%' LIMIT $offset,$limit");
		return $q;
	}
	function tot_hal($tabel,$field,$kata)
	{
		$q = $this->db->query("select * from $tabel where $field like '%$kata%'");
		return $q;
	}

}