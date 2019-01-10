<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tes_Pengayaan_Jawaban_Siswa extends CI_Controller {

	public function Ambil_Jawaban()
	{
		if($this->session->userdata('user') != 'siswa') {
			redirect('login');
		}else{
			$this->load->model('M_Tes_Pengayaan_Jawaban');
			 //$this->session->unset_userdata('id_setiap_soal');
			$tes_pengayaan_jawaban = $this->M_Tes_Pengayaan_Jawaban->Ambil_Jawaban($this->input->post('id_setiap_soal'))->result();
			//$this->session->set_userdata('hasil', $tes_pengayaan_jawaban);

			// $i = 1;
			// $hasil = '<script type="text/javascript">';
			// foreach ($tes_pengayaan_jawaban as $record) {
			// 	if ($record->Jawaban == 'Benar') {
			// 		$hasil .= '$("#benar'. $i .'").attr("checked", "checked");';
			// 	}elseif($record->Jawaban == 'Salah'){
			// 		$hasil .= '$("#salah'. $i .'").attr("checked", "checked");';
			// 	}
			// 	$i++;
			// 	// $hasil .= '$("#1'. $i .'").attr("value",'. $record->Jawaban .');';
			// 	// $hasil .= '$("#1").attr("checked", "checked");';
			// }
			// $hasil .= '</script>';
			// echo $hasil;
			echo json_encode($tes_pengayaan_jawaban);
			//$this->load->view('Akun_Siswa/TesPengayaanList', $data);
		}
	}

	public function Ubah_Jawaban()
	{
		if($this->session->userdata('user') != 'siswa') {
			redirect('login');
		}else{
			$this->load->model('M_Tes_Pengayaan_Jawaban');
			$this->M_Tes_Pengayaan_Jawaban->Ubah_Jawaban($this->input->post('array_form'));
			//$this->session->set_userdata('array_form', $this->input->post('array_form'));
		}
	}

	public function Submit()
	{
		if($this->session->userdata('user') != 'siswa') {
			redirect('login');
		}else {
			$this->load->model('M_Tes_Pengayaan_Jawaban');
			$this->M_Tes_Pengayaan_Jawaban->Submit($this->input->post('array_form'), $this->input->post('id_tes'));

			//redirect menampilkan terlebih dahulu halaman yang dituju kemudian berpindah halaman
			//redirect('Tes_Pengayaan_Siswa/index/'. $this->uri->segment(3));

			$output = '<meta http-equiv="refresh" content="0; URL=http://localhost/PromNet_E-Learning/index.php/Tes_Pengayaan_Siswa/index/';
			$output .= $this->input->post('kd_mapel');
			$output .= '"/>';
			echo $output;
		}
	}

	public function tes()
	{
		print_r($_POST);
	}

}
