<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Tes_Ketuntasan_Jawaban extends CI_Model {
  // public function getAll()
  // {
  //   $this->db->select('*');
  //   $this->db->from('tes_ketuntasan_jawaban');
  //
  //   return  $this->db->get();
  // }
  //
  // function getById($id_Tes){
  //   $this->db->select('*');
  //   $this->db->from('tes_ketuntasan_jawaban');
  //   $this->db->where('id_Tes',$id_Tes);
  //
  //   return $this->db->get();
  // }

  public function Ambil_Jawaban($data = array())
  {
    $this->db->select('Jawaban');
    $this->db->from('tes_ketuntasan_jawaban');

    $this->db->where('NIS', $this->session->userdata('username'));
    $this->db->where_in('id_Soal', $data);

    return $this->db->get();
  }

  public function Ubah_Key_Array($jawaban = array())
  {
    $data_2 = array_map(function ($record)
    {
      return array(
        'id_Soal' => $record['name'],
        'Jawaban' => $record['value']
      );
    }, $jawaban);

    return $data_2;
  }

  public function Ubah_Jawaban($jawaban = array())
  {
    if ($jawaban != array()) {
      $data_2 = $this->Ubah_Key_Array($jawaban);
      $this->db->update_batch('tes_ketuntasan_jawaban', $data_2, 'id_Soal');
    }
  }

  public function Ubah_Status_Pengerjaan($id_tes = -1)
  {
    $this->db->set('Status_Pengerjaan', 'Sudah Selesai');
    $this->db->where('id_Tes', $id_tes);
    $this->db->update('tes_ketuntasan_waktu_siswa');
  }

  public function Ambil_Kunci_Jawaban($id_tes = -1)
  {
    $this->db->select('id, Kunci_Jawaban');
    $this->db->from('tes_ketuntasan_soal');
    $this->db->where('id_Tes', $id_tes);

    return $this->db->get();
  }

  public function Ubah_Nilai($data_jawaban = array(), $id_tes = -1)
  {
    //Ambil Kunci Jawaban
    $kunci_jawaban = $this->Ambil_Kunci_Jawaban($id_tes)->result();

    //Proses Membandingkan Jawaban dengan Kunci Jawaban yang menghasilkan jumlah_benar
    //..Ubah_Key_Array hanya untuk mengubah nama key $data_jawaban menjadi mudah di ingat dan sesuai Tabel
    $jumlah_benar = 0;
    if ($data_jawaban != array()) {   //..Aksi dilakukan jika  jawaban tidak kosong
      $jawaban = $this->Ubah_Key_Array($data_jawaban);
      $i = 0;
      foreach ($jawaban as $record) {
        while ($record['id_Soal'] != $kunci_jawaban[$i]->id) {
          $i++;
        }
        if ($record['Jawaban'] == $kunci_jawaban[$i]->Kunci_Jawaban) {
          $jumlah_benar++;
        }
        $i++;
      }
      //Hitung Perbandingan jumlah_benar dan salah yang menghasilkan nilai
      //..count($kunci_jawaban) hanya untuk menghitung jumlah soal
      $nilai = ( $jumlah_benar/count($kunci_jawaban) ) * 100;

      // $this->session->unset_userdata('cek');
      // $this->session->set_userdata('cek', "ada isinya");
    } else {
      // $this->session->unset_userdata('cek');
      // $this->session->set_userdata('cek', "kosong");

      //Karena jawaban masih kosong, kita tulis nilai = 0
      $nilai = 0;
    }

    $data = array(
      'NIS' => $this->session->userdata('username'),
      'id_Tes' => $id_tes,
      'Nilai_Tes' => $nilai
    );
    $this->db->insert('tes_ketuntasan_nilai', $data);

    //Update Nilai dan Status pada Tabel Nilai
    // $this->db->set('Nilai_Tes', $nilai);
    // $this->db->set('Status', 'Complete');
    // $this->db->where('NIS', $this->session->userdata('username'));
    // $this->db->where('id_Tes', $id_tes);
    // $this->db->update('tes_ketuntasan_nilai');
  }

  public function Submit($jawaban = array(), $id_tes = -1)
  {
    $this->db->trans_start();
    $this->Ubah_Jawaban($jawaban);
    $this->Ubah_Status_Pengerjaan($id_tes);
    $this->Ubah_Nilai($jawaban, $id_tes);
    $this->db->trans_complete();
  }
}
