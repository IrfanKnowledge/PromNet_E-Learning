<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tugas_Sesi_Jawaban_Siswa extends CI_Controller {

	public function index($id = '')
	{
		if($this->session->userdata('user') != 'siswa') {
			redirect('login');
		}else{
			$this->load->model('M_Tugas_Sesi_Jawaban');
			$data['tugas_sesi_soal'] = $this->M_Tugas_Sesi_Jawaban->getByIdSoal($id)->result();
			$data['tugas_sesi_jawaban'] = $this->M_Tugas_Sesi_Jawaban->getByIdJawaban($id)->result();

			//print_r($data);
			$this->load->view('Akun_Siswa/TugasDetail', $data);
		}
	}

	public function do_upload($sesi_jawaban)
  {
    $config['upload_path']          = './uploads/';
    $config['allowed_types']        = 'gif|jpg|png|pdf|doc|docx|pptx|rar|xlsx|ppt';
    $config['max_size']             = 0;
    $config['max_width']            = 1024;
    $config['max_height']           = 768;

    $this->load->library('upload', $config);

    if ( ! $this->upload->do_upload('userfile'))
    {
            $error = array('error' => $this->upload->display_errors());

						redirect('Tugas_Sesi_Jawaban_Siswa/index/'. $sesi_jawaban);
    }
    else
    {
						//$this->load->model('M_Tugas_Sesi_Jawaban');
						
            redirect('Tugas_Sesi_Jawaban_Siswa/index/'. $sesi_jawaban);

    }
  }

}
