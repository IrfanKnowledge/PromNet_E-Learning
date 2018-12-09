<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_Siswa extends CI_Controller {

	public function index()
	{
		if($this->session->userdata('user') != 'siswa') {
			redirect('login');
		}else{
			$this->load->model('M_Mata_Pelajaran');
			$data['mata_pelajaran'] = $this->M_Mata_Pelajaran->getAll()->result();

			if (empty($data['mata_pelajaran'])) {
				$data['mata_pelajaran'] = -1;
			}
			
			//print_r($data);
			$this->load->view('Akun_Siswa/tampilan_home_siswa', $data);
		}
	}

}
