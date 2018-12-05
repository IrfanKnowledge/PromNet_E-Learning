<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends CI_Controller {

	public function index()
	{
    //Berikut cara yang digunakan jika login hanya dengan 1 hak akses Misal siswa Saja, Tidak ada Siswa dll.
    /*
    if (!$this->session->userdata('logged_in')) {
      redirect('login');
    }else{

    }
    */

		if($this->session->userdata('user') != 'admin') {
			redirect('login');
		}else{
      $this->load->model('M_Siswa');
      $data['siswa'] = $this->M_Siswa->getAll()->result();
      //print_r($data);
      $this->load->view('V_Siswa/V_SiswaList', $data);
    }
	}

  public function V_SiswaTambah($status = 0)
  {
    if($this->session->userdata('user') != 'admin') {
			redirect('login');
		}else{
      $data['status'] = $status;
      $this->load->view('V_Siswa/V_SiswaTambah', $data);
		}
  }

  public function V_SiswaEdit($status = 0)
  {
    if($this->session->userdata('user') != 'admin') {
			redirect('login');
		}else{
      $this->load->model('M_Siswa');
      $data['siswa'] = $this->M_Siswa->getAll()->result();
      //print_r($data);
      $data['status'] = $status;
      $this->load->view('V_Siswa/V_SiswaEdit', $data);
    }
  }

  public function SiswaTambah()
  {
    if($this->session->userdata('user') != 'admin') {
			redirect('login');
		}else{
			$data['nis'] = $this->input->post('nis');
      $data['nama'] = $this->input->post('nama');
      $data['password'] = $this->input->post('password');

      $this->load->model('M_Siswa');
      $status = $this->M_Siswa->insert($data);
      //print_r($data);
      redirect(site_url('Siswa/V_SiswaTambah/'. $status));
    }
  }

  public function SiswaEdit()
  {
    if($this->session->userdata('user') != 'admin') {
			redirect('login');
		}else{
      $id = $this->input->post('id');
			$data['nis'] = $this->input->post('nis');
      $data['nama'] = $this->input->post('nama');

      //Jika password tidak kosong atau telah dirubah user
      //..Kita masukan password ke dalam proses enkripsi di dalam
      //..class M_Siswa
      if ($this->input->post('password') != '') {
        $data['password'] = $this->input->post('password');
      }

      $this->load->model('M_Siswa');
      $status = $this->M_Siswa->update($id, $data);
      //print_r($data);
      redirect(site_url("Siswa/V_SiswaEdit/". $status . "#$id"));
    }
  }

  public function SiswaDelete()
  {
    if($this->session->userdata('user') != 'admin') {
			redirect('login');
		}else{
      $id = $this->input->post('id');
      $no = ($this->input->post('no') - 1); //Untuk Menunjuk Baris No. Sebelumnya jika ada

      $this->load->model('M_Siswa');
      $status = $this->M_Siswa->delete($id);
      //print_r($data);
      redirect(site_url('Siswa/V_SiswaEdit/'. $status. "#$no"));
    }
  }

}
