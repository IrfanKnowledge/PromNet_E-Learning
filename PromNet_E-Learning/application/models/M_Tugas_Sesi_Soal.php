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
    $id_sesi = $this->db->get()->result();

    $this->db->select('Sesi_Ke');
    $this->db->from('sesi_pembelajaran');
    $this->db->where('id_mapel', $id_mapel);
    $sesi_ke = $this->db->get()->result();

    foreach ($sesi_ke as $record) {
      $array_sesi_ke[] = $record->Sesi_Ke;  //$array_sesi_ke = tipe data array yang berisikan FIELD Sesi_Ke
    }

    if (empty($array_sesi_ke)) {
      $array_sesi_ke = array();
    }

    $now = current($array_sesi_ke); //$now = menunjuk Value awal $array_sesi_ke

    foreach ($id_sesi as $record) {
      $this->db->select('*');
      $this->db->from('tugas_sesi_soal');
      $this->db->where('id_sesi', $record->id);

      $temp_tugas_sesi_soal = $this->db->get()->row_array();
      if (!empty($temp_tugas_sesi_soal)) {              // cek apakah $temp_tugas_sesi_soal tidak kosong? jika tidak kosong lakukan aksi berikut

        if ($now != false) {  // jika $now TIDAK NULL maka ...
          $temp_sesi_ke['sesi_ke'] = $now;
          $now = next($array_sesi_ke); //$now = menunjuk Value BERIKUTNYA dari $array_sesi_ke
        }
        $merge_tabel = array_merge($temp_tugas_sesi_soal, $temp_sesi_ke); //$merge_tabel = Menggabungkan 2 Array dari Array $temp_tugas_sesi_soal dan Array $temp_sesi_ke

        $tugas_sesi_soal[] = (object) $merge_tabel; //Convert Array To stdClass Object
      }
    }

    if (empty($tugas_sesi_soal)) {
      $tugas_sesi_soal = -1;
    }

    return $tugas_sesi_soal;
  }
}
