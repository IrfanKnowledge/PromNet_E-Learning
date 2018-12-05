<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_nilai extends CI_Model {
public function getAll_tugas()
  {
    $this->db->select('*');
    $this->db->from('tugas_sesi_jawaban');

    return  $this->db->get();
  }

  public function getAll_ketuntasan_nilai()
  {
    $this->db->select('*');
    $this->db->from('tes_ketuntasan_nilai');

    return  $this->db->get();
  }

  public function getAll_mapel()
  {
    $this->db->select('*');
    $this->db->from('mata_pelajaran');

    return  $this->db->get();
  }

  public function nilai_akhir_ketuntasan($nis = array())
  {
    foreach ($nis as $value) {

      $this->db->select('*');
      $this->db->from('tes_ketuntasan_nilai');
      $this->db->where('Status','complete');
      $this->db->where('NIS', $value);

      if ($this->db->get()->num_rows()>5) {
        $data= $this->db->get()->result_array();
        
        $nilai=0;
        foreach ($data as $NA) {
          $nilai= $nilai + $NA['Nilai_Tes']; 
        }
        $temp_nilai[] = $nilai;
      }
    }
    return $temp_nilai;

    if ($temp) {
      # code...
    }
  }



    function selectById($id_Tes){
    $this->db->select('*');
    $this->db->from('tes_ketuntasan_nilai');
    $this->db->where('id_Tes',$id_Tes);

    return $this->db->get();
  }
}
