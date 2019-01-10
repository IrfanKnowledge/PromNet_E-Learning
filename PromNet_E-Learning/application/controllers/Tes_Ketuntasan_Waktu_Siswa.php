<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tes_Ketuntasan_Waktu_Siswa extends CI_Controller {

	public function Waktu_Mulai_Dan_Durasi_Soal()
	{
		if($this->session->userdata('user') != 'siswa') {
			redirect('login');
		}else{
			$this->load->model('M_Tes_Ketuntasan_Waktu_Siswa');

			//default waktu adalah Asia/Jakarta
			date_default_timezone_set('Asia/Jakarta');

			//merubah tanggal/waktu bahasa manusia umum menjadi Unix Timestamp
			//..(perbandingan waktu/tanggal yang ditentukan dengan Unix Epoch atau January 1 1970 00:00:00 UTC dan menggunakan satuan waktu Detik)
			$format_waktu = strtotime($this->M_Tes_Ketuntasan_Waktu_Siswa->Waktu_Mulai($this->input->post('id_tes'))->row()->Waktu_Mulai);

			//Unix TimeStamp akan dirubah menjadi format bahasa manusia umum dan dengan susunan sebagai Berikut
			$Waktu_Mulai = strtotime( date('Y-m-d H:i:s', $format_waktu ) );

			//mengambil durasi dalam format menit misal Durasi = 30 yang berarti 30 menit
			$durasi = $this->M_Tes_Ketuntasan_Waktu_Siswa->Durasi_Soal($this->input->post('id_tes'))->row()->Durasi;

			//mengubah format durasi menjadi satuan detik karena Unix Timestamp memiliki satuan waktu Detik
			$durasi = $durasi * 60;

			//menambahkan durasi pada waktu mulai dalam satuan detik
			$waktu_berakhir = $Waktu_Mulai + $durasi;

			//merubah tanggal/waktu bahasa manusia umum menjadi Unix Timestamp
			//..(perbandingan waktu/tanggal yang ditentukan dengan Unix Epoch atau January 1 1970 00:00:00 UTC dan menggunakan satuan waktu Detik)
			//$tambah_waktu = strtotime('+'. $durasi .'Minutes');

			//mengubah format Unix Timestamp yang telah dimodifikasi sedemikian rupa melalui $format_waktu dan $durasi
			//..menjadi format tanggal/waktu bahasa manusia umum seperti Berikut
			//..Bulan, Hari, Tahun, Jam, Menit, Detik untuk menyesuaikan pada Format javascript
			$data['Waktu_Berakhir'] = date('m-d-Y H:i:s', $waktu_berakhir);

			echo json_encode($data);
		}
	}
}
