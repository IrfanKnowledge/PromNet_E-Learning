<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Ketuntasan_Nilai extends CI_Model {
  public function getAll()
  {
    $this->db->select('*');
    $this->db->from('tes_ketuntasan_nilai');

    return  $this->db->get();
  }

    function selectById($id_Tes){
    $this->db->select('*');
    $this->db->from('tes_ketuntasan_nilai');
    $this->db->where('id_Tes',$id_Tes);

    return $this->db->get();
  }
}
