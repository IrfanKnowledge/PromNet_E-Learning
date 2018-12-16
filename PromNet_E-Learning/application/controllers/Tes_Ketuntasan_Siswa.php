<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tes_Ketuntasan_Siswa extends CI_Controller {

	public function index($kd_mapel = -1)
	{
		if($this->session->userdata('user') != 'siswa') {
			redirect('login');
		}else{

			$this->load->model('M_Tes_Ketuntasan');
			$data['tes_ketuntasan'] = $this->M_Tes_Ketuntasan->getById($kd_mapel);

			//print_r($data);
			$this->load->view('Akun_Siswa/TesKetuntasanList', $data);
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
