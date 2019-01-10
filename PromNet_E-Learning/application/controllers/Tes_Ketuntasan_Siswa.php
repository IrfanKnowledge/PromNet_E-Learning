<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tes_Ketuntasan_Siswa extends CI_Controller {

	public function index($kd_mapel = -1)
	{
		if($this->session->userdata('user') != 'siswa') {
			redirect('login');
		}else{
			$this->load->model('M_Tes_Ketuntasan');
			$this->load->model('M_Tes_Ketuntasan_Waktu_Siswa');
			$this->load->model('M_nilai');

			$data['tes_ketuntasan'] = $this->M_Tes_Ketuntasan->getById($kd_mapel);
			$id = array();

			if ($data['tes_ketuntasan'] != -1) {
				foreach ($data['tes_ketuntasan'] as $key => $value) {
					$id[] = $value->id;
				}
			} else {
				$id = -1;
			}

			$data['status'] = $this->M_Tes_Ketuntasan_Waktu_Siswa->Status_Pengerjaan($id)->result();
			$data['nilai'] = $this->M_nilai->Nilai_Setiap_Tes_Ketuntasan_Siswa_Tertentu($id)->result();
			//print_r($data);
			$this->load->view('Akun_Siswa/TesKetuntasanList', $data);
		}
	}

	// public function Ubah_Jawaban()
	// {
	// 	if($this->session->userdata('user') != 'siswa') {
	// 		redirect('login');
	// 	}else{
	// 		$this->load->model('M_Tes_Ketuntasan_Jawaban');
	// 		$this->M_Tes_Ketuntasan_Jawaban->Ubah_Jawaban($this->input->post('array_form'));
	// 	}
	// }

}
