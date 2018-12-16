<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tugas_Sesi_Jawaban_Siswa extends CI_Controller {

	public function index($id_mapel = -1, $sesi_ke = -1, $button_kirim = -1)
	{
		if($this->session->userdata('user') != 'siswa') {
			redirect('login');
		}else{

			$this->load->model('M_Tugas_Sesi_Jawaban');
			$data['tugas_sesi_soal'] = $this->M_Tugas_Sesi_Jawaban->getByIdSesi($id_mapel, $sesi_ke)->row();
			if (empty($data['tugas_sesi_soal'])) {
				$data['tugas_sesi_soal'] = -1;
			}else{
				$data['status_dilarang_akses'] = $this->M_Tugas_Sesi_Jawaban->Perbedaan_Waktu($data['tugas_sesi_soal']->waktu_mulai_tugas);
			}

			$data['tugas_sesi_jawaban'] = $this->M_Tugas_Sesi_Jawaban->getByIdSoal($id_mapel, $sesi_ke)->row();
			if (empty($data['tugas_sesi_jawaban'])) {
				$data['tugas_sesi_jawaban'] = -1;
			}else{
				if (isset($data['tugas_sesi_soal']->waktu_deadline_tugas) ) {
					$data['akses_pengumpulan'] = $this->M_Tugas_Sesi_Jawaban->Perbedaan_Waktu($data['tugas_sesi_soal']->waktu_deadline_tugas);
				}
			}

			if ($button_kirim == 'status_error' or $button_kirim == 'status_berhasil') {
				$data['status'] = $this->session->status_upload;
			}

			//print_r($data);
			$this->load->view('Akun_Siswa/TugasDetail', $data);
		}
	}

	public function do_upload($id_mapel = -1, $id_soal = -1, $sesi_ke = -1)
  {
    $config['upload_path']          	= './jawaban/';
    $config['allowed_types']        	= 'gif|jpg|png|pdf|doc|docx|pptx|rar|xlsx|ppt|txt';
    $config['max_size']             	= 11000; 	// batas ukuran upload file 	(0 = unlimited) satuan KB (KiloBytes)
    $config['max_width']            	= 0;  		// batas file image 					(0 = unlimited)
    $config['max_height']           	= 0; 			// batas file image  					(0 = unlimited)
		$config['overwrite']							= true;

		$data['id_soal'] = $id_soal;
		$data['sesi_ke'] = $sesi_ke;
		$data['id_mapel'] = $id_mapel;
		$data['nis'] = $this->session->userdata('username');

		//$data['nama_eksistensi'] = $this->upload->data('file_ext');
		$data['berkas_jawaban'] = 'TGS_' . $data['sesi_ke'] . '_' . $data['id_mapel'] . '_' . $data['nis'];

		$config['file_name']						= $data['berkas_jawaban'];
    $this->load->library('upload', $config);

    $data['waktu_deadline_tugas'] = $this->input->post('waktu_deadline_tugas');

    $this->load->model('M_Tugas_Sesi_Jawaban');

		$tugas_sesi_jawaban = $this->M_Tugas_Sesi_Jawaban->getByIdSoal($id_mapel, $sesi_ke)->row();
		if (empty($tugas_sesi_jawaban)) {
			$tugas_sesi_jawaban = -1;
		}else{
			$tugas_sesi_jawaban = 1;
		}

    if ($tugas_sesi_jawaban == -1 || $this->M_Tugas_Sesi_Jawaban->Perbedaan_Waktu($data['waktu_deadline_tugas']) == 1 ) {  // Jika tugas_sesi_jawaban MASIIH KOSONG atau Perbedaan_Waktu masih BELUM LEWAT dari DEADLINE TUGAS maka...

		    if ( ! $this->upload->do_upload('userfile')){	//jika gagal meng-upload

					      $this->session->status_upload = $this->upload->display_errors();
								redirect('Tugas_Sesi_Jawaban_Siswa/index/'. $this->uri->segment(3) . '/' . $sesi_ke . '/' . 'status_error');

		    }else{	//Jika Upload Berhasil

								$data['komentar_siswa'] = $this->input->post('komentar_siswa');

								$data['berkas_jawaban'] = $this->upload->data('file_name');

								if ($this->input->post('update')) {
									$this->M_Tugas_Sesi_Jawaban->EditJawaban($this->input->post('id_jawaban'), $data);
								} else {
									$this->M_Tugas_Sesi_Jawaban->AddJawaban($data);
								}


								$this->session->status_upload = "Berhasil";
		            redirect('Tugas_Sesi_Jawaban_Siswa/index/'. $this->uri->segment(3) . '/' . $sesi_ke . '/' . 'status_berhasil');

		    }

    }else{ // Jika Perbedaan_Waktu SUDAH LEWAT dari DEADLINE TUGAS maka...
    	redirect('Tugas_Sesi_Jawaban_Siswa/index/'. $this->uri->segment(3) . '/' . $sesi_ke);
    }

  }

	public function Download($nama = '')
	{
		if($this->session->userdata('user') != 'siswa') {
			redirect('login');
		}else{
		 force_download('jawaban/' . $nama, NULL);
	 	}
	}

}
