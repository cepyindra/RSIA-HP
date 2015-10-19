<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class m_dokter extends CI_Model {
  public function getDokter()
  {
    $sql = $this->db->query("SELECT * FROM tbl_dokter");
    return $sql;
  }
  function save($data){
  	$this->db->insert('tbl_dokter',$data);
  }
  function delete($id){
    $this->db->where("id_dokter",$id);
    $this->db->delete("tbl_dokter");
  }
  function edit($id){
    $this->db->where("id_dokter",$id);
    return $this->db->get("tbl_dokter");
  }
  function update($id,$data){
  	$this->db->where("id_dokter",$id);
    $this->db->update("tbl_dokter",$data);	
  }
}
