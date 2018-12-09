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
    $id_sesi = $this->getBySesi_ke($id_mapel, $sesi_ke)->row();

    $this->db->select('*');
    $this->db->from('tugas_sesi_soal');
    $this->db->where('id_sesi', $id_sesi->id);
    return  $this->db->get();
  }

  public function getByIdJawaban($id_mapel = -1, $sesi_ke)
  {
    $id_sesi = $this->getBySesi_ke($id_mapel, $sesi_ke)->row();

    $this->db->select('id');
    $this->db->from('tugas_sesi_soal');
    $this->db->where('id_sesi', $id_sesi->id);
    $id_soal = $this->db->get()->row();

    $this->db->select('*');
    $this->db->from('tugas_sesi_jawaban');
    $this->db->where('id_soal', $id_soal->id);
    $username = $this->session->userdata('username');
    $this->db->where('nis', $username);
    return  $this->db->get();
  }

  public function AddJawaban($data_form = array())
  {
    date_default_timezone_set("Asia/Jakarta");
    $tanggal_pengumpulan=date_create(date('Y-m-d H:i:s'));

    $d = strtotime($data_form['waktu_deadline_tugas']);
    $tanggal_deadline=date_create(date('Y-m-d H:i:s', $d));

    $perbedaan_waktu_pengumpulan = date_diff($tanggal_deadline, $tanggal_pengumpulan);
    echo $perbedaan_waktu_pengumpulan->format('%R');
    if ($perbedaan_waktu_pengumpulan->format('%R') == '+') {
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

    $this->db->insert('tugas_sesi_jawaban', $data);
  }

}
