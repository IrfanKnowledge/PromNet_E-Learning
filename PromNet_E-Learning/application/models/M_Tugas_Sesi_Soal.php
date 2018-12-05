<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Tugas_Sesi_Soal extends CI_Model {
  public function getAll()
  {
    $this->db->select('*');
    $this->db->from('tugas_sesi_soal');
    return  $this->db->get();
  }
}
