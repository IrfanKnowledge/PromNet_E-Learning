<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Tes_Ketuntasan_Waktu_Siswa extends CI_Model {

  // public function Perbedaan_Waktu($waktu_yang_ditetapkan = -1)
  // {
  //   date_default_timezone_set("Asia/Jakarta");
  //   $tanggal_akses=date_create(date('Y-m-d H:i:s'));            //waktu sever terkini
  //
  //   $d = strtotime($waktu_yang_ditetapkan);                     //convert format waktu normal (bahasa manusia) ke Timestamp Unix
  //   $waktu_yang_ditetapkan=date_create(date('Y-m-d H:i:s', $d));
  //
  //
  //   $perbedaan_waktu_pengumpulan = date_diff($tanggal_akses,  $waktu_yang_ditetapkan);
  //
  //   if ($perbedaan_waktu_pengumpulan->format('%R') == '+') {
  //     return 1;      // '+'
  //   }else{
  //     return -1;      // '-'
  //   }
  // }
  public function Durasi_Soal($id_tes=-1)
  {
    $this->db->select('Durasi');
    $this->db->from('tes_ketuntasan');
    $this->db->where('id', $id_tes);

    return $this->db->get();
  }

  public function Waktu_Mulai($id_tes=-1)
  {
    $this->db->select('Waktu_Mulai');
    $this->db->from('tes_ketuntasan_waktu_siswa');
    $this->db->where('NIS', $this->session->userdata('username'));
    $this->db->where('id_tes', $id_tes);

    return $this->db->get();
  }

  public function insert($data= array())
  {
    $this->db->insert('tes_ketuntasan_waktu_siswa', $data);
  }

  public function Status_Pengerjaan($id_tes = -1)
  {
    $this->db->select('id_Tes, Status_Pengerjaan');
    $this->db->from('tes_ketuntasan_waktu_siswa');
    $this->db->where('NIS', $this->session->userdata('username'));
    $this->db->where_in('id_Tes', $id_tes);

    return $this->db->get();
  }

}
