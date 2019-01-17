<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_matpel extends CI_Controller {

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
      $this->load->model('M_Mata_Pelajaran');
      $data['mata_pelajaran'] = $this->M_Mata_Pelajaran->getAll()->result();
      //print_r($data);
      $this->load->view('V_Mata_Pelajaran/V_matpelList', $data);
  }

  public function V_matpelTambah($status = 0)
  {
      $data['status'] = $status;
      $this->load->view('V_Mata_Pelajaran/V_matpelTambah', $data);
  }

  public function V_matpelEdit($status = 0)
  {
      $this->load->model('M_Mata_Pelajaran');
      $data['mata_pelajaran'] = $this->M_Mata_Pelajaran->getAll()->result();
      //print_r($data);
      $data['status'] = $status;
      $this->load->view('V_Mata_Pelajaran/V_matpelEdit', $data);
  }

  public function matpelTambah()
  {
    $data['kd_Mapel'] = $this->input->post('kd_Mapel');
    $data['Nama_Mapel'] = $this->input->post('Nama_Mapel');   
    $data['Jam_Pembelajaran'] = $this->input->post('Jam_Pembelajaran');   

      $this->load->model('M_Mata_Pelajaran');
      $status = $this->M_Mata_Pelajaran->insert($data);
      //print_r($data);
      redirect(site_url('C_matpel/V_matpelTambah/'. $status));
  }

  public function matpelEdit()
  {
      $id = $this->input->post('id');
    $data['kd_Mapel'] = $this->input->post('kd_Mapel');
    $data['Nama_Mapel'] = $this->input->post('Nama_Mapel');   
    $data['Jam_Pembelajaran'] = $this->input->post('Jam_Pembelajaran');   

      $this->load->model('M_Mata_Pelajaran');
      $status = $this->M_Mata_Pelajaran->update($id, $data);
      //print_r($data);
      redirect(site_url("C_matpel/V_matpelEdit/". $status . "#$id"));
  }

  public function matpelDelete()
  {

      $id = $this->input->post('id');
      $no = ($this->input->post('no') - 1); //Untuk Menunjuk Baris No. Sebelumnya jika ada

      $this->load->model('M_Mata_Pelajaran');
      $status = $this->M_Mata_Pelajaran->delete($id);
      //print_r($data);
      redirect(site_url('C_matpel/V_matpelEdit/'. $status. "#$no"));
  }

    public function sesi($id_mapel)
  {
      if($this->session->userdata('user') != 'admin') {
      redirect('login');
    }else{
      $this->load->model('M_Sesi_Pembelajaran');
      $data['Sesi_Pembelajaran'] = $this->M_Sesi_Pembelajaran->selectById($id_mapel)->result();

      $this->load->view('V_sesi', $data);
    }

  }

      public function ketuntasan($id)
  {
      if($this->session->userdata('user') != 'admin') {
      redirect('login');
    }else{
      $this->load->model('M_Tes_Ketuntasan');
      $data['tes_ketuntasan'] = $this->M_Tes_Ketuntasan->selectById($id)->result();

      $this->load->view('V_Ketuntasan/V_KetuntasanAdmin', $data);
    }

  }


      public function soal_ketuntasan($id_Tes)
  {
      if($this->session->userdata('user') != 'admin') {
      redirect('login');
    }else{
      $this->load->model('M_Tes_Ketuntasan_Soal');
      $data['tes_ketuntasan_soal'] = $this->M_Tes_Ketuntasan_Soal->getById($id_Tes)->result();

      $this->load->view('V_Ketuntasan/V_KetuntasanSoalAdmin', $data);
    }

  }

      public function nilai_ketuntasan($id)
  {
      if($this->session->userdata('user') != 'admin') {
      redirect('login');
    }else{
      $this->load->model('M_nilai');
      $data['tes_ketuntasan_nilai'] = $this->M_nilai->selectById($id)->result();

      $this->load->view('V_Nilai/V_ketuntasanNilai', $data);
    }

  }

  public function pengayaan($id)
  {
      if($this->session->userdata('user') != 'admin') {
      redirect('login');
    }else{
      $this->load->model('M_Tes_Pengayaan');
      $data['tes_pengayaan'] = $this->M_Tes_Pengayaan->selectById($id)->result();

      $this->load->view('V_Pengayaan/V_PengayaanAdmin', $data);
    }

  }


      public function soal_pengayaan($id_Tes)
  {
      if($this->session->userdata('user') != 'admin') {
      redirect('login');
    }else{
      $this->load->model('M_Tes_Pengayaan_Soal');
      $data['tes_pengayaan_soal'] = $this->M_Tes_Pengayaan_Soal->getById($id_Tes)->result();

      $this->load->view('V_Pengayaan/V_PengayaanSoalAdmin', $data);
    }

  }

      public function nilai_pengayaan($id)
  {
      if($this->session->userdata('user') != 'admin') {
      redirect('login');
    }else{
      $this->load->model('M_nilai');
      $data['tes_pengayaan_nilai'] = $this->M_nilai->selectById($id)->result();

      $this->load->view('V_Nilai/V_pengayaanNilai', $data);
    }

  }

}
