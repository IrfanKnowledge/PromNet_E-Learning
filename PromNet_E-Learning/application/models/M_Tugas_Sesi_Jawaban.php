<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Tugas_Sesi_Jawaban extends CI_Model {

 public function getBySesi_ke($id_mapel = -1, $sesi_ke = -1)
 {
   $this->db->select('id');
   $this->db->from('sesi_pembelajaran');
   $this->db->where('id_mapel', $id_mapel);
   $this->db->where('Sesi_Ke', $sesi_ke);

   return  $this->db->get();
 }

 public function getByIdSoal($id_mapel = -1, $sesi_ke = -1)
  {
    if (empty($this->getBySesi_ke($id_mapel, $sesi_ke)->row())) {
      $id_sesi = -1;
    }else{
      $id_sesi = $this->getBySesi_ke($id_mapel, $sesi_ke)->row()->id;
    }

    $this->db->select('*');
    $this->db->from('tugas_sesi_soal');
    $this->db->where('id_sesi', $id_sesi);
    return  $this->db->get();
  }

  public function getByIdJawaban($id_mapel = -1, $sesi_ke)
  {
    if (empty($this->getBySesi_ke($id_mapel, $sesi_ke)->row())) {
      $id_sesi = -1;
    }else{
      $id_sesi = $this->getBySesi_ke($id_mapel, $sesi_ke)->row()->id;
    }

    $this->db->select('id');
    $this->db->from('tugas_sesi_soal');
    $this->db->where('id_sesi', $id_sesi);
    $id_soal = $this->db->get()->row();

    if(empty($id_soal) ) {
      $id_soal = -1;
    }else{
      $id_soal = $id_soal->id;
    }

    $this->db->select('*');
    $this->db->from('tugas_sesi_jawaban');
    $this->db->where('id_soal', $id_soal);
    $username = $this->session->userdata('username');
    $this->db->where('nis', $username);
    return  $this->db->get();
  }

  public function Perbedaan_Waktu($waktu_yang_ditetapkan = -1)
  {
    date_default_timezone_set("Asia/Jakarta");
    $tanggal_akses=date_create(date('Y-m-d H:i:s'));            //waktu sever terkini

    $d = strtotime($waktu_yang_ditetapkan);                     //convert format waktu normal (bahasa manusia) ke Timestamp Unix
    $waktu_yang_ditetapkan=date_create(date('Y-m-d H:i:s', $d));


    $perbedaan_waktu_pengumpulan = date_diff($tanggal_akses,  $waktu_yang_ditetapkan);

    if ($perbedaan_waktu_pengumpulan->format('%R') == '+') {
      return 1;      // '+'
    }else{
      return -1;      // '-'
    }
  }

  public function Akses_Pengumpulan($waktu_deadline_tugas = -1)
  {
    if ($waktu_deadline_tugas == -1) {
      return -1;
    }else{
      return $this->Perbedaan_Waktu($waktu_deadline_tugas);
    }
  }

  public function Data_Jawaban($data_form = array())
  {
    $perbedaan_waktu_pengumpulan = $this->Perbedaan_Waktu($data_form['waktu_deadline_tugas']);

    if ($perbedaan_waktu_pengumpulan == 1) {
      $status_pengumpulan = 'Tepat Waktu';
    }else{
      $status_pengumpulan = 'Terlambat';
    }

    //-------------START Mencoba - coba date dalam PHP wkwkwk-----------------------------
    /*
      date_default_timezone_set("Asia/Jakarta");
      $tanggal_awal = date('Y-m-d H:i:s');
      $d=mktime(15, 20, 59, 12, 8, 2018);
      $d=strtotime('2019-08-01');
      $tanggal_akhir = date('Y-m-d H:i:s', $d);

      $tanggal_awal=date_create(date('Y-m-d H:i:s'));
      $tanggal_akhir=date_create(date('Y-m-d H:i:s', $d));

      print_r($tanggal_awal) ;
      echo "<br>";
      print_r( $tanggal_akhir);

      echo "<br>";
      $tanggal_aritmatika = date_diff($tanggal_akhir, $tanggal_awal);
      echo  $tanggal_aritmatika->format("%R %h %i %s ");
      $temp = $tanggal_aritmatika->format("%R %h %i %s ");
      $temp = str_replace(' ', '', $temp);
      echo "<br>";
      echo trim($temp, ' ');
    */
    //-------------END Mencoba - coba date dalam PHP wkwkwk-----------------------------

    $data = array(
      'nis' => $data_form['nis'],
      'id_soal' => $data_form['id_soal'],
      'berkas_jawaban' => $data_form['berkas_jawaban'],
      'komentar_siswa' => $data_form['komentar_siswa'],
      'waktu_pengumpulan' => date('Y-m-d H:i:s'),
      'status_pengumpulan' => $status_pengumpulan,
    );

    return $data;
  }
  public function AddJawaban($data_form = array())
  {
    $data_jawaban = $this->Data_Jawaban($data_form);

    $this->db->insert('tugas_sesi_jawaban', $data_jawaban);
  }

  public function EditJawaban($id_jawaban = -1, $data_form = array())
  {
    $data_jawaban = $this->Data_Jawaban($data_form);

    $this->db->where('id', $id_jawaban);
    $this->db->update('tugas_sesi_jawaban', $data_jawaban);
  }

}
