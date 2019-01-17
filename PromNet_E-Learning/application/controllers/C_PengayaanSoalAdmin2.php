<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_PengayaanSoalAdmin2 extends CI_Controller {

	// public function index($id_mapel = -1)
	// {
	// 	if($this->session->userdata('user') != 'siswa') {
	// 		redirect('login');
	// 	}else{
	// 		$this->load->model('M_Sesi_Pembelajaran');
	// 		$data['sesi_pembelajaran'] = $this->M_Sesi_Pembelajaran->getById($id_mapel)->result();
		
	// 		if (empty($data['sesi_pembelajaran'])) {
	// 			$data['sesi_pembelajaran'] = -1;
	// 		}

	// 		//Kita masukkan ke dalam session agar dapat dimunculkan disetiap halaman lain
	// 		$this->session->mata_pelajaran = $this->M_Sesi_Pembelajaran->Mata_Pelajaran($id_mapel)->row_array();
	// 		//print_r($this->session);

	// 		$this->load->view('Akun_Siswa/SesiPembelajaranSiswa', $data);
	// 	}
	// }

	// public function Download($nama = '')
	// {
	// 	if($this->session->userdata('user') != 'siswa') {
	// 		redirect('login');
	// 	}else{
	// 	 	force_download('content/' . $nama, NULL);
	//  	}
	// }


// =============================================================================
public function V_PengayaanSoalAdminTambah($status = 0)
  {
        if($this->session->userdata('user') != 'admin') {
      redirect('login');
    }else{
      $data['status'] = $status;
      $this->load->view('V_Pengayaan/V_PengayaanSoalAdminTambah', $data);
    }
  }


  public function V_PengayaanSoalAdminEdit($status = 0)
  {
    if($this->session->userdata('user') != 'admin') {
      redirect('login');
    }else{
      $this->load->model('M_PengayaanSoalAdmin');
      $data['tes_pengayaan_soal'] = $this->M_PengayaanSoalAdmin->getAll()->result();
      //print_r($data);
      $data['status'] = $status;
      $this->load->view('V_Pengayaan/V_PengayaanSoalAdmin', $data);
    }
  }


  public function PengayaanSoalAdminTambah()
  {
    if($this->session->userdata('user') != 'admin') {
      redirect('login');
    }else{
    $id= $this->input->post('id');
   $data['id_tes'] = $this->input->post('id_tes');
    $data['no_soal'] = $this->input->post('no_soal');
    $data['pertanyaan'] = $this->input->post('pertanyaan');
    $data['pilihan1'] = $this->input->post('pilihan1');
    $data['pilihan2'] = $this->input->post('pilihan2');
    $data['pilihan3'] = $this->input->post('pilihan3');
    $data['pilihan4'] = $this->input->post('pilihan4');
    $data['kunci_jawaban'] = $this->input->post('kunci_jawaban');


      $this->load->model('M_PengayaanSoalAdmin');
      $status = $this->M_PengayaanSoalAdmin->insert($data);
      //print_r($data);
      redirect(site_url('C_PengayaanSoalAdmin2/V_PengayaanSoalAdminTambah/'. $status));
    }
  }

  public function PengayaanSoalAdminEdit()
  {
    if($this->session->userdata('user') != 'admin') {
      redirect('login');
    }else{
    $id= $this->input->post('id');
   $data['id_tes'] = $this->input->post('id_tes');
    $data['no_soal'] = $this->input->post('no_soal');
    $data['pertanyaan'] = $this->input->post('pertanyaan');
    $data['pilihan1'] = $this->input->post('pilihan1');
    $data['pilihan2'] = $this->input->post('pilihan2');
    $data['pilihan3'] = $this->input->post('pilihan3');
    $data['pilihan4'] = $this->input->post('pilihan4');
    $data['kunci_jawaban'] = $this->input->post('kunci_jawaban');

      $this->load->model('M_PengayaanSoalAdmin');
      $status = $this->M_PengayaanSoalAdmin->update($id, $data);
      //print_r($data);
      redirect(site_url("C_PengayaanSoalAdmin2/V_PengayaanSoalAdminEdit/". $status . "#$id"));
    }
  }

  public function PengayaanSoalAdminDelete()
  {
    if($this->session->userdata('user') != 'admin') {
      redirect('login');
    }else{
      $id = $this->input->post('id');
      $no = ($this->input->post('no') - 1); //Untuk Menunjuk Baris No. Sebelumnya jika ada

      $this->load->model('M_PengayaanSoalAdmin');
      $status = $this->M_PengayaanSoalAdmin->delete($id);
      //print_r($data);
      redirect(site_url('C_PengayaanSoalAdmin2/V_PengayaanSoalAdminEdit/'. $status. "#$no"));
    }
  }

// ============================================================================
// public function do_upload($id_mapel = -1, $id_soal = -1, $sesi_ke = -1)
//   {
//     $config['upload_path']            = './jawaban/';
//     $config['allowed_types']          = 'gif|jpg|png|pdf|doc|docx|pptx|rar|xlsx|ppt|txt';
//     $config['max_size']               = 11000;  // batas ukuran upload file   (0 = unlimited) satuan KB (KiloBytes)
//     $config['max_width']              = 0;      // batas file image           (0 = unlimited)
//     $config['max_height']             = 0;      // batas file image           (0 = unlimited)
//     $config['overwrite']              = true;

//     $data['sesi_ke'] = $sesi_ke;
//     $data['id_mapel'] = $id_mapel;
//     // $data['nis'] = $this->session->userdata('username');

//     //$data['nama_eksistensi'] = $this->upload->data('file_ext');
//     $data['berkas_jawaban'] = 'TGS_' . $data['sesi_ke'] . '_' . $data['id_mapel'] . '_' . $data['nis'];

//     $config['file_name']            = $data['berkas_jawaban'];
//     $this->load->library('upload', $config);

//     $data['waktu_deadline_tugas'] = $this->input->post('waktu_deadline_tugas');

//     $this->load->model('M_Tugas_Sesi_Jawaban');

//     $tugas_sesi_jawaban = $this->M_Tugas_Sesi_Jawaban->getByIdSoal($id_mapel, $sesi_ke)->row();
//     if (empty($tugas_sesi_jawaban)) {
//       $tugas_sesi_jawaban = -1;
//     }else{
//       $tugas_sesi_jawaban = 1;
//     }

//     if ($tugas_sesi_jawaban == -1 || $this->M_Tugas_Sesi_Jawaban->Perbedaan_Waktu($data['waktu_deadline_tugas']) == 1 ) {  // Jika tugas_sesi_jawaban MASIIH KOSONG atau Perbedaan_Waktu masih BELUM LEWAT dari DEADLINE TUGAS maka...

//         if ( ! $this->upload->do_upload('userfile')){ //jika gagal meng-upload

//                 $this->session->status_upload = $this->upload->display_errors();
//                 redirect('Tugas_Sesi_Jawaban_Siswa/index/'. $this->uri->segment(3) . '/' . $sesi_ke . '/' . 'status_error');

//         }else{  //Jika Upload Berhasil

//                 $data['komentar_siswa'] = $this->input->post('komentar_siswa');

//                 $data['berkas_jawaban'] = $this->upload->data('file_name');

//                 if ($this->input->post('update')) {
//                   $this->M_Tugas_Sesi_Jawaban->EditJawaban($this->input->post('id_jawaban'), $data);
//                 } else {
//                   $this->M_Tugas_Sesi_Jawaban->AddJawaban($data);
//                 }


//                 $this->session->status_upload = "Berhasil";
//                 redirect('Tugas_Sesi_Jawaban_Siswa/index/'. $this->uri->segment(3) . '/' . $sesi_ke . '/' . 'status_berhasil');

//         }

//     }else{ // Jika Perbedaan_Waktu SUDAH LEWAT dari DEADLINE TUGAS maka...
//       redirect('Tugas_Sesi_Jawaban_Siswa/index/'. $this->uri->segment(3) . '/' . $sesi_ke);
//     }

//   }

}
