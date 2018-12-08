<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Tugas_Sesi_Soal extends CI_Model {
  public function getAll()
  {
    $this->db->select('*');
    $this->db->from('tugas_sesi_soal');
    return  $this->db->get();
  }

  public function getById($id_mapel = -1)
  {
    $this->db->select('id');
    $this->db->from('sesi_pembelajaran');
    $this->db->where('id_mapel', $id_mapel);
    $sesi_pembelajaran = $this->db->get()->result();

    foreach ($sesi_pembelajaran as $record) {
      $this->db->select('*');
      $this->db->from('tugas_sesi_soal');
      $this->db->where('id_sesi', $record->id);

      $temp = $this->db->get()->row();
      if (!empty($temp)) {              // cek apakah $temp tidak kosong? jika tidak kosong lakukan aksi berikut
        $tugas_sesi_soal[] = $temp;
      }
    }
    if (empty($tugas_sesi_soal)) {
      $tugas_sesi_soal = -1;
    }

    return $tugas_sesi_soal;
  }
}
