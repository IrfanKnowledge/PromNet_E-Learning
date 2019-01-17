<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sesi_Pembelajaran_Siswa extends CI_Controller {

	public function index($id_mapel = -1)
	{
		if($this->session->userdata('user') != 'siswa') {
			redirect('login');
		}else{
			$this->load->model('M_Sesi_Pembelajaran');
			$data['sesi_pembelajaran'] = $this->M_Sesi_Pembelajaran->getById($id_mapel)->result();
		
			if (empty($data['sesi_pembelajaran'])) {
				$data['sesi_pembelajaran'] = -1;
			}

			//Kita masukkan ke dalam session agar dapat dimunculkan disetiap halaman lain
			$this->session->mata_pelajaran = $this->M_Sesi_Pembelajaran->Mata_Pelajaran($id_mapel)->row_array();
			//print_r($this->session);

			$this->load->view('Akun_Siswa/SesiPembelajaranSiswa', $data);
		}
	}

	public function Download($nama = '')
	{
		if($this->session->userdata('user') != 'siswa') {
			redirect('login');
		}else{
		 	force_download('content/' . $nama, NULL);
	 	}
	}


// =============================================================================
  public function V_SesiTambah($status = 0)
  {
  	    if($this->session->userdata('user') != 'admin') {
			redirect('login');
		}else{
      $data['status'] = $status;
      $this->load->view('V_SesiTambah', $data);
		}
  }

  public function V_SesiEdit($status = 0)
  {
    if($this->session->userdata('user') != 'admin') {
			redirect('login');
		}else{
      $this->load->model('M_Sesi_Pembelajaran');
      $data['sesi_pembelajaran'] = $this->M_Sesi_Pembelajaran->getAll()->result();
      //print_r($data);
      $data['status'] = $status;
      $this->load->view('V_SesiEdit', $data);
    }
  }

  public function V_SesiPeriksa($status = 0)
  {
    if($this->session->userdata('user') != 'admin') {
      redirect('login');
    }else{
      $this->load->model('M_Sesi_Pembelajaran');
      $data['sesi_pembelajaran'] = $this->M_Sesi_Pembelajaran->getAll()->result();
      //print_r($data);
      $data['status'] = $status;
      $this->load->view('V_SesiPeriksa', $data);
    }
  }

  public function SesiTambah()
  {
    if($this->session->userdata('user') != 'admin') {
			redirect('login');
		}else{
    $id = $this->input->post('id');
	$data['id_mapel'] = $this->input->post('id_mapel');
    $data['topik'] = $this->input->post('Topik');
    $data['uraian'] = $this->input->post('Uraian');
    $data['konten1'] = $this->input->post('Konten1');
    $data['konten2'] = $this->input->post('Konten2');
    $data['konten3'] = $this->input->post('Konten3');

      $this->load->model('M_Sesi_Pembelajaran');
      $status = $this->M_Sesi_Pembelajaran->insert($data);
      //print_r($data);
      redirect(site_url('Sesi_Pembelajaran_Siswa/V_SesiTambah/'. $status));
    }
  }

  public function SesiEdit()
  {
    if($this->session->userdata('user') != 'admin') {
			redirect('login');
		}else{
    $id = $this->input->post('id');
	$data['id_mapel'] = $this->input->post('id_mapel');
    $data['topik'] = $this->input->post('topik');
    $data['uraian'] = $this->input->post('uraian');
    $data['konten1'] = $this->input->post('konten1');
    $data['konten2'] = $this->input->post('konten2');
    $data['konten3'] = $this->input->post('konten3');

      $this->load->model('M_Sesi_Pembelajaran');
      $status = $this->M_Sesi_Pembelajaran->update($id, $data);
      //print_r($data);
      redirect(site_url("Sesi_Pembelajaran_Siswa/V_SesiEdit/". $status . "#$id"));
    }
  }

  public function SesiDelete()
  {
    if($this->session->userdata('user') != 'admin') {
			redirect('login');
		}else{
      $id = $this->input->post('id');
      $no = ($this->input->post('no') - 1); //Untuk Menunjuk Baris No. Sebelumnya jika ada

      $this->load->model('M_Sesi_Pembelajaran');
      $status = $this->M_Sesi_Pembelajaran->delete($id);
      //print_r($data);
      redirect(site_url('Sesi_Pembelajaran_Siswa/V_SesiEdit/'. $status. "#$no"));
    }
  }

  public function SesiPeriksa()
  {
    if($this->session->userdata('user') != 'admin') {
      redirect('login');
    }else{
    $id = $this->input->post('id');
  $data['id_mapel'] = $this->input->post('id_mapel');
    $data['topik'] = $this->input->post('topik');
    $data['uraian'] = $this->input->post('uraian');
    $data['konten1'] = $this->input->post('konten1');
    $data['konten2'] = $this->input->post('konten2');
    $data['konten3'] = $this->input->post('konten3');

      $this->load->model('M_Sesi_Pembelajaran');
      $status = $this->M_Sesi_Pembelajaran->update($id, $data);
      //print_r($data);
      redirect(site_url("Sesi_Pembelajaran_Siswa/V_SesiPeriksa/". $status . "#$id"));
    }
  }

// ============================================================================
public function do_upload($id_mapel = -1, $id_soal = -1, $sesi_ke = -1)
  {
    $config['upload_path']            = './jawaban/';
    $config['allowed_types']          = 'gif|jpg|png|pdf|doc|docx|pptx|rar|xlsx|ppt|txt';
    $config['max_size']               = 11000;  // batas ukuran upload file   (0 = unlimited) satuan KB (KiloBytes)
    $config['max_width']              = 0;      // batas file image           (0 = unlimited)
    $config['max_height']             = 0;      // batas file image           (0 = unlimited)
    $config['overwrite']              = true;

    $data['sesi_ke'] = $sesi_ke;
    $data['id_mapel'] = $id_mapel;
    // $data['nis'] = $this->session->userdata('username');

    //$data['nama_eksistensi'] = $this->upload->data('file_ext');
    $data['berkas_jawaban'] = 'TGS_' . $data['sesi_ke'] . '_' . $data['id_mapel'] . '_' . $data['nis'];

    $config['file_name']            = $data['berkas_jawaban'];
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

        if ( ! $this->upload->do_upload('userfile')){ //jika gagal meng-upload

                $this->session->status_upload = $this->upload->display_errors();
                redirect('Tugas_Sesi_Jawaban_Siswa/index/'. $this->uri->segment(3) . '/' . $sesi_ke . '/' . 'status_error');

        }else{  //Jika Upload Berhasil

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

}
