<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tugas_Sesi_Jawaban_Siswa extends CI_Controller {

	public function index($id_mapel = -1, $sesi_ke = -1, $button_kirim = -1)
	{
		if($this->session->userdata('user') != 'siswa') {
			redirect('login');
		}else{
			if ($id_mapel == -1) {
				die("<h1>Maaf, tidak ada Mata Pelajaran yang dipilih. Silahkan memilih Mata Pelajaran.</H1>");
			}
			$this->load->model('M_Tugas_Sesi_Jawaban');
			$data['tugas_sesi_soal'] = $this->M_Tugas_Sesi_Jawaban->getByIdSoal($id_mapel, $sesi_ke)->result();
			if (empty($data['tugas_sesi_soal'])) {
				$data['tugas_sesi_soal'] = -1;
			}

			$data['tugas_sesi_jawaban'] = $this->M_Tugas_Sesi_Jawaban->getByIdJawaban($id_mapel, $sesi_ke)->result();

			if ($button_kirim == 'status_error' or $button_kirim == 'status_berhasil') {
				$data['status'] = $this->session->status_upload;
			}

			//print_r($data);
			$this->load->view('Akun_Siswa/TugasDetail', $data);
		}
	}

	public function do_upload($id_mapel = -1, $sesi_ke = -1, $tugas_ke = -1)
  {
    $config['upload_path']          	= './jawaban/';
    $config['allowed_types']        	= 'gif|jpg|png|pdf|doc|docx|pptx|rar|xlsx|ppt';
    $config['max_size']             	= 11000; 	// batas ukuran upload file 	(0 = unlimited) satuan KB (KiloBytes)
    $config['max_width']            	= 0;  		// batas file image 					(0 = unlimited)
    $config['max_height']           	= 0; 			// batas file image  					(0 = unlimited)
		$config['overwrite']							= true;

		$data['id_soal'] = $sesi_ke;
		$data['tugas_ke'] = $tugas_ke;
		$data['id_mapel'] = $id_mapel;
		$data['nis'] = $this->session->userdata('username');

		//$data['nama_eksistensi'] = $this->upload->data('file_ext');
		$data['berkas_jawaban'] = 'TGS_' . $data['tugas_ke'] . '_' . $data['id_mapel'] . '_' . $data['nis'];
		//echo $berkas_jawaban;
		$config['file_name']						= $data['berkas_jawaban'];
		//exit;
    $this->load->library('upload', $config);

    if ( ! $this->upload->do_upload('userfile'))
    {
            $this->session->status_upload = $this->upload->display_errors();
						redirect('Tugas_Sesi_Jawaban_Siswa/index/'. $this->uri->segment(3) . '/' . $sesi_ke . '/' . 'status_error');
    }
    else
    {
						$data['komentar_siswa'] = $this->input->post('komentar_siswa');
						$data['waktu_deadline_tugas'] = $this->input->post('waktu_deadline_tugas');

						$data['berkas_jawaban'] = $data['berkas_jawaban'] . $this->upload->data('file_ext');

						$this->load->model('M_Tugas_Sesi_Jawaban');
						$this->M_Tugas_Sesi_Jawaban->AddJawaban($data);

						$this->session->status_upload = "Berhasil";
            redirect('Tugas_Sesi_Jawaban_Siswa/index/'. $this->uri->segment(3) . '/' . $sesi_ke . '/' . 'status_berhasil');

    }
  }

}
