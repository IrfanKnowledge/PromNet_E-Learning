<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sesi_Pembelajaran extends CI_Controller {

	public function index($id_mapel = -1)
	{
		if($this->session->userdata('user') != 'siswa') {
			redirect('login');
		}else{
			$this->load->model('M_Mata_Pelajaran');
			$data['nama_mapel'] = $this->M_Mata_Pelajaran->Tampilkan_Nama_MaPel($this->uri->segment(3, -1))->row();

			$this->load->model('M_Sesi_Pembelajaran');

			$data['sesi_pembelajaran'] = $this->M_Sesi_Pembelajaran->getById($id_mapel)->result();

			if (empty($data['sesi_pembelajaran'])) {
				$data['sesi_pembelajaran'] = -1;
			}

			//Kita masukkan ke dalam session agar dapat dimunculkan disetiap halaman lain
			$this->session->mata_pelajaran = $this->M_Sesi_Pembelajaran->Mata_Pelajaran($id_mapel)->row_array();
			//print_r($this->session);

			$this->load->view('Akun_Siswa/SesiPembelajaranSiswa', $data);
		}
	}

	public function Download($nama = '')
	{
		if($this->session->userdata('user') != 'siswa') {
			redirect('login');
		}else{
		 	force_download('content/' . $nama, NULL);
	 	}
	}

}
