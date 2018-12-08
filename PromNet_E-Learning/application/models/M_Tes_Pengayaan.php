<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Tes_Pengayaan extends CI_Model {
  public function getAll()
  {
    $this->db->select('*');
    $this->db->from('tes_pengayaan');
    return  $this->db->get();
  }

  /*
  function selectById($id){
		$this->db->select('*');
		$this->db->from('tes_pengayaan');
		$this->db->where('id',$id);

		return $this->db->get();
	}
  */

  public function getById($id_mapel = -1)
  {
    $this->db->select('id');
    $this->db->from('sesi_pembelajaran');
    $this->db->where('id_mapel', $id_mapel);
    $sesi_pembelajaran = $this->db->get()->result();

    foreach ($sesi_pembelajaran as $record) {
      $this->db->select('*');
      $this->db->from('tes_pengayaan');
      $this->db->where('id_Sesi', $record->id);

      $temp = $this->db->get()->row();
      if (!empty($temp)) {              // cek apakah $temp tidak kosong? jika tidak kosong lakukan aksi berikut
        $tes_pengayaan[] = $temp;
      }
    }
    if (empty($tes_pengayaan)) {
      $tes_pengayaan = -1;
    }

    return $tes_pengayaan;
  }
}
