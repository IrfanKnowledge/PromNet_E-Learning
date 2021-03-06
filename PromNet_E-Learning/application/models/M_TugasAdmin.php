<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_TugasAdmin extends CI_Model {
  public function getAll()
  {
    $this->db->select('*');
    $this->db->from('tugas_sesi_soal');
    return  $this->db->get();
  }

  public function getById($id_mapel = -1)
  {
    $this->db->select('*');
    $this->db->from('tugas_sesi_soal');
    $this->db->where('id_mapel', $id_mapel);
    return  $this->db->get();
  }

  // public function Mata_Pelajaran($id_mapel = -1)
  // {
  //   $this->db->select('Nama_Mapel');
  //   $this->db->from('mata_pelajaran');
  //   $this->db->where('kd_Mapel', $id_mapel);
  //   return $this->db->get();
  // }

  function selectById($id_mapel){
    $this->db->select('*');
    $this->db->from('tugas_sesi_soal');
    $this->db->where('id_mapel',$id_mapel);

    return $this->db->get();
  }
  



// ================================================
   public function insert($data = array())
  {
    $this->db->insert('tugas_sesi_soal', $data);

    $error = $this->db->error();
    if ($error['message'] == '') {
      return 1;
    }else{
      return 0;
    }
  }

  public function update($id= -1, $data = array())
{
    $this->db->set($data);
    $this->db->where('id',$id);
    $this->db->update('tugas_sesi_soal');

    $error = $this->db->error();
    if ($error['message'] == '') {
      return 1;
    }else{
      return 0;
    }
  }

  public function delete($id= -1)
  {
    $this->db->where('id',$id);
    $this->db->delete('tugas_sesi_soal');

    $error = $this->db->error();
    if ($error['message'] == '') {
      return 1;
    }else{
      return 0;
    }
  }

}
