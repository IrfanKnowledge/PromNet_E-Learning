<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_ListNilai extends CI_Controller {

public function Ketuntasan()
  {
      if($this->session->userdata('user') != 'admin') {
        redirect('login');
      }else{
        $this->load->model('M_ListNilai');
        $data['tes_ketuntasan'] = $this->M_ListNilai->getAllKetuntasan()->result();
        //print_r($data);
        $this->load->view('V_Nilai/V_KetuntasanList', $data);
    }
  }

  public function SiswaKetuntasan()
  {
      if($this->session->userdata('user') != 'admin'){
        redirect('login');
      }else{
        $this->load->model('M_ListNilai');
        $data['tes_ketuntasan'] = $this->M_ListNilai->getAllSiswaKetuntasan()->result();
        //print_r($data);
        $this->load->view('V_Nilai/V_SiswaKetuntasanList', $data);
    }
  }

  public function Pengayaan()
  {
      if($this->session->userdata('user') != 'admin') {
        redirect('login');
      }else{
        $this->load->model('M_ListNilai');
        $data['tes_pengayaan'] = $this->M_ListNilai->getAllPengayaan()->result();
        //print_r($data);
        $this->load->view('V_Nilai/V_PengayaanList', $data);
    }
  }

  public function SiswaPengayaan()
  {
      if($this->session->userdata('user') != 'admin'){
        redirect('login');
      }else{
        $this->load->model('M_ListNilai');
        $data['tes_pengayaan'] = $this->M_ListNilai->getAllSiswaPengayaan()->result();
        //print_r($data);
        $this->load->view('V_Nilai/V_SiswaPengayaanList', $data);
    }
  }

  public function SiswaTugas()
    {
        if($this->session->userdata('user') != 'admin'){
          redirect('login');
        }else{
          $this->load->model('M_ListNilai');
          $data['tes_tugas'] = $this->M_ListNilai->getAllSiswaTugas()->result();
          //print_r($data);
          $this->load->view('V_Nilai/V_SiswaTugasList', $data);
      }
    }


}
