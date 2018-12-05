<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tugas_Sesi_Soal_Siswa extends CI_Controller {

	public function index()
	{
		if($this->session->userdata('user') != 'siswa') {
			redirect('login');
		}else{
			$this->load->model('M_Tugas_Sesi_Soal');
			$data['tugas_sesi_soal'] = $this->M_Tugas_Sesi_Soal->getAll()->result();
			//print_r($data);
			$this->load->view('Akun_Siswa/TugasList', $data);
		}
	}

	public function Download($nama = '')
	{
		if($this->session->userdata('user') != 'siswa') {
			redirect('login');
		}else{
		echo $nama;
		 force_download('tugas/' . $nama, NULL);
	 	}
	}



}
