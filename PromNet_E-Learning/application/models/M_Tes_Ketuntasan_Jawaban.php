<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Tes_Ketuntasan_Jawaban extends CI_Model {
  public function getAll()
  {
    $this->db->select('*');
    $this->db->from('tes_ketuntasan_soal');

    return  $this->db->get();
  }

  function getById($id_Tes){
    $this->db->select('*');
    $this->db->from('tes_ketuntasan_soal');
    $this->db->where('id_Tes',$id_Tes);

    return $this->db->get();
  }
  
  public function insert($data= array())
  {
    $this->db->insert('tes_ketuntasan_jawaban', $data);
  }

}
