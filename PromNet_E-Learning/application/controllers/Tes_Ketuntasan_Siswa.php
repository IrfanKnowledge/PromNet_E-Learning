<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tes_Ketuntasan_Siswa extends CI_Controller {

	public function index($id_mapel = -1)
	{
		if($this->session->userdata('user') != 'siswa') {
			redirect('login');
		}else{
			
			$this->load->model('M_Tes_Ketuntasan');
			$data['tes_ketuntasan'] = $this->M_Tes_Ketuntasan->getById($id_mapel);

			//print_r($data);
			$this->load->view('Akun_Siswa/TesKetuntasanList', $data);
		}
	}

	public function mulai_soal_ketuntasan($id_mapel = -1, $id_Tes = -1)
  {
    if($this->session->userdata('user') != 'siswa') {
			redirect('login');
    }else{
      $this->load->model('M_Tes_Ketuntasan_Soal');
      $data['tes_ketuntasan_soal'] = $this->M_Tes_Ketuntasan_Soal->getById($id_Tes)->result();

      $this->load->view('Akun_Siswa/TesKetuntasanSoal', $data);
    }
  }

	public function Jawaban_Tambah($value='')
	{
		if($this->session->userdata('user') != 'siswa') {
			redirect('login');
		}else{
			print_r($_POST);

			//$this->load->model('M_Tes_Ketuntasan_Jawaban');
			//$this->M_Tes_Ketuntasan_Jawaban->insert($data);

		}
	}

}
