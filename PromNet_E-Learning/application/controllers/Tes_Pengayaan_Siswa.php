<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tes_Pengayaan_Siswa extends CI_Controller {

	public function index($kd_mapel = -1)
	{
		if($this->session->userdata('user') != 'siswa') {
			redirect('login');
		}else{
			$this->load->model('M_Mata_Pelajaran');
			$data['nama_mapel'] = $this->M_Mata_Pelajaran->Tampilkan_Nama_MaPel($this->uri->segment(3, -1))->row();

			$this->load->model('M_Tes_Pengayaan');
			$this->load->model('M_Tes_Pengayaan_Waktu_Siswa');
			$this->load->model('M_nilai');

			$data['tes_pengayaan'] = $this->M_Tes_Pengayaan->getById($kd_mapel);
			$id = array();

			if ($data['tes_pengayaan'] != -1) {
				foreach ($data['tes_pengayaan'] as $key => $value) {
					$id[] = $value->id;
				}
			} else {
				$id = -1;
			}

			$data['status'] = $this->M_Tes_Pengayaan_Waktu_Siswa->Status_Pengerjaan($id)->result();
			$data['nilai'] = $this->M_nilai->Nilai_Setiap_Tes_Pengayaan_Siswa_Tertentu($id)->result();
			//print_r($data);
			$this->load->view('Akun_Siswa/TesPengayaanList', $data);
		}
	}

	// public function Ubah_Jawaban()
	// {
	// 	if($this->session->userdata('user') != 'siswa') {
	// 		redirect('login');
	// 	}else{
	// 		$this->load->model('M_Tes_Pengayaan_Jawaban');
	// 		$this->M_Tes_Pengayaan_Jawaban->Ubah_Jawaban($this->input->post('array_form'));
	// 	}
	// }
	//
}
