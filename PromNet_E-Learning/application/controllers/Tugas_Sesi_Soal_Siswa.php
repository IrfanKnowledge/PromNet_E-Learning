<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tugas_Sesi_Soal_Siswa extends CI_Controller {

	public function index($id_mapel = -1)
	{
		$this->load->model('M_Mata_Pelajaran');
		$data['nama_mapel'] = $this->M_Mata_Pelajaran->Tampilkan_Nama_MaPel($this->uri->segment(3, -1))->row();

		if($this->session->userdata('user') != 'siswa') {
			redirect('login');
		}else{
			$this->load->model('M_Tugas_Sesi_Soal');
			$data['tugas_sesi_soal'] = $this->M_Tugas_Sesi_Soal->getById($id_mapel);

			//print_r($data);
			$this->load->view('Akun_Siswa/TugasList', $data);
		}
	}

	public function Download($nama = '')
	{
		if($this->session->userdata('user') != 'siswa') {
			redirect('login');
		}else{
		 force_download('tugas/' . $nama, NULL);
	 	}
	}



}
