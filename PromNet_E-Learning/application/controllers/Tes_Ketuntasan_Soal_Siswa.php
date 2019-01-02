<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tes_Ketuntasan_Soal_Siswa extends CI_Controller
{
    public function mulai_soal_ketuntasan($kd_mapel = -1, $sesi_ke = -1)
    {
        if ($this->session->userdata('user') != 'siswa') {
            redirect('login');
        } else {
            $this->load->model('M_Tes_Ketuntasan_Soal');

            $id_tes = $this->M_Tes_Ketuntasan_Soal->getIdTes($kd_mapel, $sesi_ke);

            $status_waktu = $this->M_Tes_Ketuntasan_Soal->Status_Waktu($id_tes);
            $status_pengerjaan = $this->M_Tes_Ketuntasan_Soal->Status_Pengerjaan($id_tes);

            /*-----------------Untuk Cek - Cek
            echo $status_waktu . " " . $status_pengerjaan;
            exit();
            */

            if ( ($status_waktu == "Sedang Berlangsung" && $status_pengerjaan == "Belum Mengerjakan") ||
                $status_pengerjaan == "Belum Selesai") {

                if ($status_pengerjaan == "Belum Mengerjakan") {
                    $this->M_Tes_Ketuntasan_Soal->Default_WaktuMulai_dan_Jawaban($id_tes);

                    $data['tes_ketuntasan_soal'] = $this->M_Tes_Ketuntasan_Soal->getByIdTes($id_tes)->result();
                    $this->load->view('Akun_Siswa/TesKetuntasanSoal', $data);
                } elseif ($status_pengerjaan == "Belum Selesai") {
                    // code...
                    $data['tes_ketuntasan_soal'] = $this->M_Tes_Ketuntasan_Soal->getByIdTes($id_tes)->result();
                    $this->load->view('Akun_Siswa/TesKetuntasanSoal', $data);
                }
            } else {
                redirect('Tes_Ketuntasan_Siswa/index/' . $kd_mapel);
            }
        }
    }
}
