<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Tes_Ketuntasan_Soal extends CI_Model {
  public function getAll()
  {
    $this->db->select('*');
    $this->db->from('tes_ketuntasan_soal');

    return  $this->db->get();
  }

  public function selectById($id)
  {
		$this->db->select('*');
		$this->db->from('tes_ketuntasan');
		$this->db->where('id',$id);

		return $this->db->get();
	 }

  //Berikut fungsi yang mengambil ID di Tabel Sesi_Pembelajaran
  //..berdasarkan Kd_Mapel dan Sesi_Ke Sekian yang di input oleh User Melalui URL
  //..Yang akan digunakan sebagai acuan di Tabel Tes_Ketuntasan
  public function getByKdMapel_SesiKe($kd_mapel = -1, $sesi_ke = -1)
  {
    $this->db->select('id');
    $this->db->from('sesi_pembelajaran');
    $this->db->where('id_mapel',$kd_mapel);
    $this->db->where('Sesi_Ke',$sesi_ke);

    return $this->db->get();
  }

  //Berikut fungsi yang mengambil ID di Tabel Tes_Ketuntasan
  //..berdasarkan id_Sesi yang kita peroleh dari Fungsi getByKdMapel_SesiKe
  //..Yang akan digunakan sebagai acuan di Tabel Tes_Ketuntasan_Soal
  public function getByIdSesi($id_sesi = -1)
  {
    $this->db->select('id');
    $this->db->from('tes_ketuntasan');
    $this->db->where('id_Sesi',$id_sesi);

    return $this->db->get();
  }

  //Berikut fungsi yang mengambil ID di Tabel Tes_Ketuntasan
  //..dengan menggabungkan 2 fungsi, dan langsung memberi return id_tes
  public function getIdTes($kd_mapel = -1, $sesi_ke = -1)
  {
    if ( empty($this->getByKdMapel_SesiKe($kd_mapel, $sesi_ke)->row()) ) {
      $id_sesi = -1;
    }else{
      $id_sesi = $this->getByKdMapel_SesiKe($kd_mapel, $sesi_ke)->row()->id;
    }

    if ( empty($this->getByIdSesi($id_sesi)->row()) ) {
      $id_tes = -1;
    }else {
      $id_tes = $this->getByIdSesi($id_sesi)->row()->id;
    }

    return $id_tes;
  }

  //Berikut fungsi yang menampilkan Tes Ketuntasan siswa
  //..berdasarkan id_Tes yang kita peroleh dari Fungsi getByIdTes
  //..Yang akan digunakan sebagai acuan di Tabel Tes_Ketuntasan_Soal
  function getByIdTes($id_tes = -1)
  {
    $this->db->select('*');
    $this->db->from('tes_ketuntasan_soal');
    $this->db->where('id_Tes',$id_tes);

    return $this->db->get();
  }

  public function Perbedaan_Waktu($waktu_yang_ditetapkan = -1)
  {
    //waktu sever terkini
    date_default_timezone_set("Asia/Jakarta");
    $tanggal_akses=date_create(date('Y-m-d H:i:s'));

    $d = strtotime($waktu_yang_ditetapkan);                     //convert format waktu normal (bahasa manusia) ke Timestamp Unix
    $waktu_yang_ditetapkan=date_create(date('Y-m-d H:i:s', $d));


    $perbedaan_waktu_pengumpulan = date_diff($tanggal_akses,  $waktu_yang_ditetapkan);

    if ($perbedaan_waktu_pengumpulan->format('%R') == '+') {
      return 1;      // '+'
    }else{
      return -1;      // '-'
    }
  }
  public function getWaktu_TesKetuntasan($id_tes = -1)
  {
    $this->db->select('Waktu_Mulai_Tes, Waktu_Berakhir_Tes');
    $this->db->from('tes_ketuntasan');
    $this->db->where('id', $id_tes);

    return $this->db->get();
  }

  public function Status_Waktu($id_tes = -1)
  {
    if ( empty($this->getWaktu_TesKetuntasan($id_tes)->row()) ) {
      $status_waktu_mulai_tes = 0;
      $status_waktu_berakhir_tes = 0;
    }else{
      $status_waktu_mulai_tes = $this->Perbedaan_Waktu( $this->getWaktu_TesKetuntasan($id_tes)->row()->Waktu_Mulai_Tes );
      $status_waktu_berakhir_tes = $this->Perbedaan_Waktu( $this->getWaktu_TesKetuntasan($id_tes)->row()->Waktu_Berakhir_Tes );
    }

    /*-------------------Untuk Cek - Cek---------------------------------
    echo $this->getWaktu_TesKetuntasan($id_tes)->row()->Waktu_Mulai_Tes;
    echo "<br>";
    echo $this->getWaktu_TesKetuntasan($id_tes)->row()->Waktu_Berakhir_Tes;
    echo "<br>";
    echo $status_waktu_mulai_tes . " " . $status_waktu_berakhir_tes . "<br>";
    */

    if ($status_waktu_mulai_tes == -1 && $status_waktu_berakhir_tes == 1) {
      return $status_waktu = "Sedang Berlangsung";
    } elseif($status_waktu_mulai_tes == 1) {
      return $status_waktu = "Belum Dimulai";
    } elseif ($status_waktu_berakhir_tes == -1) {
      return $status_waktu = "Sudah Berakhir";
    } elseif ( $status_waktu_mulai_tes == 0 || $status_waktu_berakhir_tes == 0) {
      return $status_waktu = "Waktu Belum di Definisikan";
    }

  }

  public function getStatusPengerjaan($id_tes = -1)
  {
    $this->db->select('Status_Pengerjaan');
    $this->db->from('tes_ketuntasan_waktu_siswa');
    $this->db->where('NIS', $this->session->username);
    $this->db->where('id_Tes', $id_tes);

    return $this->db->get();
  }

  public function Status_Pengerjaan($id_tes = -1)
  {
    if ( empty($this->getStatusPengerjaan($id_tes)->row()) ) {
      $status_pengerjaan = "Belum Mengerjakan";
    }else {
      $status_pengerjaan = $this->getStatusPengerjaan($id_tes)->row()->Status_Pengerjaan;
    }

    return $status_pengerjaan;
  }

  public function Default_Jawaban($id_tes = -1)
  {
    $array_soal = $this->getByIdTes($id_tes)->result();
    foreach ($array_soal as $record) {
      $data[] = array(
        'NIS' => $this->session->username,
        'id_Soal' => $record->id
      );
    }

    $this->db->insert_batch('tes_ketuntasan_jawaban', $data);
  }

  public function Default_WaktuMulai_dan_Jawaban($id_tes = -1)
  {
    $data['NIS'] = $this->session->username;
    $data['id_Tes'] = $id_tes;
    //waktu sever terkini
    date_default_timezone_set("Asia/Jakarta");
    $data['Waktu_Mulai'] = date('Y-m-d H:i:s');

    $this->db->trans_start();
    $this->db->insert('tes_ketuntasan_waktu_siswa', $data);
    $this->Default_Jawaban($id_tes);
    $this->db->trans_complete();
  }

}
