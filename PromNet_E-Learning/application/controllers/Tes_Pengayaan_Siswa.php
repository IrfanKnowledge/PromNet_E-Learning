<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tes_Pengayaan_Siswa extends CI_Controller {

	public function index($id_mapel = -1)
	{
		if($this->session->userdata('user') != 'siswa') {
			redirect('login');
		}else{
			if ($id_mapel == -1) {
				die("<h1>Maaf, tidak ada Mata Pelajaran yang dipilih. Silahkan memilih Mata Pelajaran.</H1>");
			}
			$this->load->model('M_Tes_Pengayaan');
			$data['tes_pengayaan'] = $this->M_Tes_Pengayaan->getById($id_mapel);

			//print_r($data);
			$this->load->view('Akun_Siswa/TesPengayaanList', $data);
		}
	}

	public function mulai_soal_pengayaan($id_Tes)
  {
    if($this->session->userdata('user') != 'siswa') {
			redirect('login');
    }else{
      $this->load->model('M_Tes_Pengayaan_Soal');
      $data['tes_pengayaan_soal'] = $this->M_Tes_Pengayaan_Soal->getById($id_Tes)->result();

      $this->load->view('Akun_Siswa/TesPengayaanSoal', $data);
    }

  }

	public function Jawaban_Tambah($value='')
	{
		if($this->session->userdata('user') != 'siswa') {
			redirect('login');
		}else{
			print_r($_POST);

			//$this->load->model('M_Tes_Pengayaan_Jawaban');
			//$this->M_Tes_Pengayaan_Jawaban->insert($data);

		}
	}


}
