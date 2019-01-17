<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Tugas extends CI_Model {
  public function getAll()
  {
    $this->db->select('*');
    $this->db->from('tugas_sesi_soal');
    return  $this->db->get();
  }

  
  public function selectById($id)
  {
		$this->db->select('*');
		$this->db->from('tugas_sesi_soal');
		$this->db->where('id',$id);

		return $this->db->get();
	 }


}
