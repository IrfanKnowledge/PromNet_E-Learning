<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_nilai extends CI_Controller {

public function index()
  {
    //Berikut cara yang digunakan jika login hanya dengan 1 hak akses Misal Admin Saja, Tidak ada Siswa dll.
    /*
    if (!$this->session->userdata('logged_in')) {
      redirect('login');
    }else{

    }
    */

    // if($this->session->userdata('user') != 'admin') {
    //   redirect('login');
    // }else{
      // $this->load->model('M_matpel');
      // $data['mata_pelajaran'] = $this->M_matpel->getAll()->result();
      // //print_r($data);
      // $this->load->view('V_Mata_Pelajaran/V_matpelList', $data);
  }

      public function nilai_ketuntasan()
  {
    if(!$this->session->userdata('logged_in')) {
      redirect('login');
    }else{
      $this->load->model('M_nilai');
      $data['tes_ketuntasan_nilai'] = $this->M_nilai->getAll_ketuntasan_nilai()->result();
    
      foreach ($data['tes_ketuntasan_nilai'] as $value) {
        $nis[] = $value->NIS;
      }
      
      $data['nilai_akhir'] = $this->M_nilai->nilai_akhir_ketuntasan($nis);

      $data['mata_pelajaran'] = $this->M_nilai->getAll_mapel()->result();
 

      $this->load->view('V_Nilai/V_ketuntasanNilai', $data);
    }

  }

   public function nilai_tugas()
  {
    if(!$this->session->userdata('logged_in')) {
      redirect('login');
    }else{
      $this->load->model('M_nilai');
      $data['tugas_sesi_jawaban'] = $this->M_nilai->getAll_tugas()->result();

      $this->load->view('V_Nilai/V_tugas', $data);
    }

  }

// public function nilai_pengayaan($id)
//   {
//     if(!$this->session->userdata('logged_in')) {
//       redirect('login');
//     }else{
//       $this->load->model('M_nilai');
//       $data['tes_pengayaan_nilai'] = $this->M_nilai->selectById($id)->result();

//       $this->load->view('V_Nilai/V_pengayaanNilai', $data);
//     }

//   }

//   public function nilai_akhir($id)
//   {
//     if(!$this->session->userdata('logged_in')) {
//       redirect('login');
//     }else{
//       $this->load->model('M_nilai');
//       $data['nilai_akhir'] = $this->M_nilai->selectById($id)->result();

//       $this->load->view('V_Nilai/V_Nilai_Akhir', $data);
//     }

//   }

}
