<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		if($this->session->userdata('user') != 'admin') {
			redirect('login');
		}else{
			$this->load->view('tampilan_home');
		}
	}



	public function sesi()
	{
		if($this->session->userdata('user') != 'admin') {
			redirect('login');
		}else{
			$this->load->model('M_Sesi_Pembelajaran');
			$data['Sesi_Pembelajaran'] = $this->M_Sesi_Pembelajaran->getAll()->result();

			$this->load->view('V_sesi', $data);
		}

	}

	public function soal($id)
	{
		if($this->session->userdata('user') != 'admin') {
			redirect('login');
		}else{
			$this->load->model('M_Tes_Ketuntasan_Soal');
			/*
			if ($id == 1) {

			}else{
				$data['Tes_Ketuntasan_Soal'] = -1;
			}
			*/
			$data['Tes_Ketuntasan_Soal'] = $this->M_Tes_Ketuntasan_Soal->getById($id);
			$this->load->view('V_soal', $data);
		}

	}

}
