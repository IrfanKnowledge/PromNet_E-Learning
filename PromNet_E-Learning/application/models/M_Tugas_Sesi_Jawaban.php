<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Tugas_Sesi_Jawaban extends CI_Model {

 public function getByIdSoal($id = -1)
  {
    $this->db->select('*');
    $this->db->from('tugas_sesi_soal');
    $this->db->where('id', $id);
    return  $this->db->get();
  }
  public function getByIdJawaban($id = -1)
  {
    $this->db->select('*');
    $this->db->from('tugas_sesi_jawaban');
    $this->db->where('id_soal', $id);
    $username = $this->session->userdata('username');
    $this->db->where('nis', $username);
    return  $this->db->get();
  }

  public function Insert($value='')
  {
    // code...
  }

}
