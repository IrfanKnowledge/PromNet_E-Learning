<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Sesi_Pembelajaran extends CI_Model {
  public function getAll()
  {
    $this->db->select('*');
    $this->db->from('sesi_pembelajaran');
    return  $this->db->get();
  }

  public function getById($id_mapel = -1)
  {
    $this->db->select('*');
    $this->db->from('sesi_pembelajaran');
    $this->db->where('id_mapel', $id_mapel);
    return  $this->db->get();
  }

  public function Mata_Pelajaran($id_mapel = -1)
  {
    $this->db->select('Nama_Mapel');
    $this->db->from('mata_pelajaran');
    $this->db->where('kd_Mapel', $id_mapel);
    return $this->db->get();
  }

  function selectById($id_mapel){
    $this->db->select('*');
    $this->db->from('sesi_pembelajaran');
    $this->db->where('id_mapel',$id_mapel);

    return $this->db->get();
  }
}
