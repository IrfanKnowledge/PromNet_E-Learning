<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Tes_Pengayaan_Soal extends CI_Model {
  public function getAll()
  {
    $this->db->select('*');
    $this->db->from('tes_pengayaan_soal');

    return  $this->db->get();
  }

  // public function getbyid($id)
  // {

  // 	if($id == 1){
  // 		$this->db->select('*');
  // 		$this->db->from('tes_ketuntasan_soal');

  //  		return  $this->db->get()->result();
  // 	}else{
  // 		return -1;
  // 	}

  // }

  function getById($id_Tes){
    $this->db->select('*');
    $this->db->from('tes_pengayaan_soal');
    $this->db->where('id_Tes',$id_Tes);

    return $this->db->get();
  }

}
