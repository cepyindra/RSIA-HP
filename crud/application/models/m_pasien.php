<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class m_pasien extends CI_Model {

  public function getPasien()
  {
    $sql = $this->db->query("SELECT * FROM tbl_pasien");
    return $sql;
  }

  function save($data){
  	$this->db->insert('tbl_pasien',$data);
  }

  function delete($id){
    $this->db->where("id_pasien",$id);
    $this->db->delete("tbl_pasien");
  }

  function edit($id){
    $this->db->where("id_pasien",$id);
    return $this->db->get("tbl_pasien");
  }

  function update($id,$data){
  	$this->db->where("id_pasien",$id);
    $this->db->update("tbl_pasien",$data);	
  }
}
