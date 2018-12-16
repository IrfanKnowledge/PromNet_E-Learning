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
    $this->db->select('id, Sesi_Ke');
    $this->db->from('sesi_pembelajaran');
    $this->db->where('id_mapel', $id_mapel);
    $temp_sesi_pembelajaran = $this->db->get()->result();

    foreach ($temp_sesi_pembelajaran as $record) {
      $this->db->select('*');
      $this->db->from('tugas_sesi_soal');
      $this->db->where('id_sesi', $record->id);

      $temp_tugas_sesi_soal = $this->db->get()->row_array();
      $temp_sesi_ke['sesi_ke'] = $record->Sesi_Ke;

      if (!empty($temp_tugas_sesi_soal)) {
        $tugas_sesi_soal[] = (object) array_merge($temp_tugas_sesi_soal, $temp_sesi_ke);; //Convert Array To stdClass Object
      }

    }

    if (empty($temp_sesi_pembelajaran)) {
      $tugas_sesi_soal = -1;
    }

    return $tugas_sesi_soal;
  }
}
