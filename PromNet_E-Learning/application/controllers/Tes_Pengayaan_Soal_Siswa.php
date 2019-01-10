<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tes_Pengayaan_Soal_Siswa extends CI_Controller
{
    public function mulai_soal_pengayaan($kd_mapel = -1, $sesi_ke = -1)
    {
        if ($this->session->userdata('user') != 'siswa') {
            redirect('login');
        } else {
            $this->load->model('M_Mata_Pelajaran');
      			$data['nama_mapel'] = $this->M_Mata_Pelajaran->Tampilkan_Nama_MaPel($this->uri->segment(3, -1))->row();

            $this->load->model('M_Tes_Pengayaan_Soal');

            $id_tes = $this->M_Tes_Pengayaan_Soal->getIdTes($kd_mapel, $sesi_ke);

            $status_waktu = $this->M_Tes_Pengayaan_Soal->Status_Waktu($id_tes);
            $status_pengerjaan = $this->M_Tes_Pengayaan_Soal->Status_Pengerjaan($id_tes);

            /*-----------------Untuk Cek - Cek
            echo $status_waktu . " " . $status_pengerjaan;
            exit();
            */

            if ( ($status_waktu == "Sedang Berlangsung" && $status_pengerjaan == "Belum Mengerjakan") ||
                $status_pengerjaan == "Belum Selesai") {

                if ($status_pengerjaan == "Belum Mengerjakan") {
                    $this->M_Tes_Pengayaan_Soal->Default_WaktuMulai_dan_Jawaban($id_tes);

                    $data['tes_pengayaan_soal'] = $this->M_Tes_Pengayaan_Soal->getByIdTes($id_tes)->result();
                    $this->load->view('Akun_Siswa/TesPengayaanSoal', $data);
                } elseif ($status_pengerjaan == "Belum Selesai") {
                    // code...
                    $data['tes_pengayaan_soal'] = $this->M_Tes_Pengayaan_Soal->getByIdTes($id_tes)->result();
                    $this->load->view('Akun_Siswa/TesPengayaanSoal', $data);
                }
            } else {
                redirect('Tes_Pengayaan_Siswa/index/' . $kd_mapel);
            }
        }
    }
}
