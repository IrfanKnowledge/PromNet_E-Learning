<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sesi_Pembelajaran_Siswa extends CI_Controller {

	public function index($id = -1)
	{
		if($this->session->userdata('user') != 'siswa') {
			redirect('login');
		}else{
			$this->load->model('M_Sesi_Pembelajaran');
			$data['sesi_pembelajaran'] = $this->M_Sesi_Pembelajaran->getById($id)->result();

			//Kita masukkan ke dalam session agar dapat dimunculkan disetiap halaman lain
			$this->session->mata_pelajaran = $this->M_Sesi_Pembelajaran->Mata_Pelajaran($id)->row_array();
			//print_r($this->session->mata_pelajaran);

			if (empty($data['sesi_pembelajaran'])) {
				echo '<h1>Mohon maaf, sesi pembelajaran ' . $this->session->mata_pelajaran['Nama_Mapel'] . ' belum ditambahkan</h1>';
			}else{
				//Kita simpan ke session agar dapat digunakan saat dari halaman lain kembali ke halaman Sesi_Pembelajaran_Siswa mata pelajaran tertentu
				$this->session->id_mapel = $data['sesi_pembelajaran'][0]->id_mapel;

				$this->load->view('Akun_Siswa/SesiPembelajaranSiswa', $data);
			}
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
