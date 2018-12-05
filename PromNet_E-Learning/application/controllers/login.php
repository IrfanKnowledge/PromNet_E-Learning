<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {


	public function index()
	{
		$this->load->view('tampilan_login');
	}

	public function getlogin(){

		//Validasi Login Admin
		if($this->model_login->getlogin_2($this->input->post('username'),$this->input->post('password'))){

			//Mengambil data Admin yang sedang Log-In ke dalam Session
			$data = $this->model_login->selectByUsername($this->input->post('username'))->row_array();

			//print_r($data);
			$userdata = array(
				'id_username' => $data['id'],
				'username' => $data['username'],
				'password' => $data['password'],
				'nama_lengkap' => $data['nama'],
				//'logged_in' => true,
				'user' => 'admin'
			);

			$this->session->set_userdata($userdata);
			//print_r($this->session);
			redirect('home');

		//Validasi Login Siswa
	}else if($this->model_login->getlogin_2_siswa($this->input->post('username'),$this->input->post('password'))){

				//Mengambil data Siswa yang sedang Log-In ke dalam Session
				$data = $this->model_login->selectByUsernameSiswa($this->input->post('username'))->row_array();

				$userdata = array(
					'id_username' => $data['id'],
					'username' => $data['NIS'],
					'password' => $data['Password'],
					'nama_lengkap' => $data['Nama'],
					//'logged_in' => true,
					'user' => 'siswa'
				);

				$this->session->set_userdata($userdata);
				//print_r($this->session);
				redirect('Home_Siswa');
		}else {
			redirect('login');
		}
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect('login');
	}


}
