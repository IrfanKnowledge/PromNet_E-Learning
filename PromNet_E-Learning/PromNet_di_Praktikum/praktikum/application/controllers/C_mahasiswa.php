<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_mahasiswa extends CI_Controller {

	// proses yang akan di buka saat pertama masuk ke controller
	public function index()
	{
		$data['mahasiswa'] = $this->M_mahasiswa->selectAll()->result();

		$this->load->view('V_input', $data);
	}

	// proses untuk menambah data
	public function insert(){
		//mengambil data sesuai inputan pada form V_input
		$data['nim'] = $this->input->post('nim');
		$data['nama'] = $this->input->post('nama');
		$data['angkatan'] = $this->input->post('angkatan');

		//memasukan data yang sudah diinput di form V_input ke database
		$this->M_mahasiswa->insert($data);

		//membuka kembali controller C_mahasiswa
		redirect(site_url('C_mahasiswa'));
	}

	// proses untuk pindah ke view V_edit
	public function fedit($id){
		//mengambil data sesuai id
		$data['mahasiswa'] = $this->M_mahasiswa->selectById($id)->row_array();

		//membuka view V_edit dengan melempar sebuah data
		$this->load->view('V_edit', $data);
	}

	// proses untuk merubah/mengedit data pada database
	public function update($id){
		//mengambil data sesuai inputan pada form V_edit
		$data['nim'] = $this->input->post('nim');
		$data['nama'] = $this->input->post('nama');
		$data['angkatan'] = $this->input->post('angkatan');

		//merubah data yang sudah diinput di form V_edit ke database
		$this->M_mahasiswa->update($id, $data);

		//membuka kembali controller C_mahasiswa
		redirect(site_url('C_mahasiswa'));
	}

	// proses untuk menghapus data pada database
	public function delete($id){
		//mengambil id yang di kirimkan dari V_input
		$this->M_mahasiswa->delete($id);

		//membuka kembali controller C_mahasiswa
		redirect(site_url('C_mahasiswa'));
	}
}
