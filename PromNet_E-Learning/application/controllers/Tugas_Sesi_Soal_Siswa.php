<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tugas_Sesi_Soal_Siswa extends CI_Controller {

	public function index($id_mapel = -1)
	{
		if($this->session->userdata('user') != 'siswa') {
			redirect('login');
		}else{
			if ($id_mapel == -1) {
				die("<h1>Maaf, tidak ada Mata Pelajaran yang dipilih. Silahkan memilih Mata Pelajaran.</H1>");
			}
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
