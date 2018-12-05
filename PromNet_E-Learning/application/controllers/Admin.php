<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function index()
	{
    //Berikut cara yang digunakan jika login hanya dengan 1 hak akses Misal Admin Saja, Tidak ada Siswa dll.
    /*
    if (!$this->session->userdata('logged_in')) {
      redirect('login');
    }else{

    }
    */

		if($this->session->userdata('user') != 'admin') {
			redirect('login');
		}else{
      $this->load->model('M_Admin');
      $data['admin'] = $this->M_Admin->getAll()->result();
      //print_r($data);
      $this->load->view('V_Admin/V_AdminList', $data);
    }
	}

  public function V_AdminTambah($status = 0)
  {
    if($this->session->userdata('user') != 'admin') {
			redirect('login');
		}else{
      $data['status'] = $status;
      $this->load->view('V_Admin/V_AdminTambah', $data);
		}
  }

  public function V_AdminEdit($status = 0)
  {
    if($this->session->userdata('user') != 'admin') {
			redirect('login');
		}else{
      $this->load->model('M_Admin');
      $data['admin'] = $this->M_Admin->getAll()->result();
      //print_r($data);
      $data['status'] = $status;
      $this->load->view('V_Admin/V_AdminEdit', $data);
    }
  }

  public function AdminTambah()
  {
    if($this->session->userdata('user') != 'admin') {
			redirect('login');
		}else{
      $data['nama'] = $this->input->post('nama');
      $data['username'] = $this->input->post('username');
      $data['password'] = $this->input->post('password');

      $this->load->model('M_Admin');
      $status = $this->M_Admin->insert($data);
      //print_r($data);
      redirect(site_url('Admin/V_AdminTambah/'. $status));
    }
  }

  public function AdminEdit()
  {
    if($this->session->userdata('user') != 'admin') {
			redirect('login');
		}else{
      $id = $this->input->post('id');
      $data['nama'] = $this->input->post('nama');
      $data['username'] = $this->input->post('username');

      //Jika password tidak kosong atau telah dirubah user
      //..Kita masukan password ke dalam proses enkripsi di dalam
      //..class M_Admin
      if ($this->input->post('password') != '') {
        $data['password'] = $this->input->post('password');
      }

      $this->load->model('M_Admin');
      $status = $this->M_Admin->update($id, $data);
      //print_r($data);
      redirect(site_url("Admin/V_AdminEdit/". $status . "#$id"));
    }
  }

  public function AdminDelete()
  {
    if($this->session->userdata('user') != 'admin') {
			redirect('login');
		}else{
      $id = $this->input->post('id');
      $no = ($this->input->post('no') - 1); //Untuk Menunjuk Baris No. Sebelumnya jika ada

      $this->load->model('M_Admin');
      $status = $this->M_Admin->delete($id);
      //print_r($data);
      redirect(site_url('Admin/V_AdminEdit/'. $status. "#$no"));
    }
  }

}
