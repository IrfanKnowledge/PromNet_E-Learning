<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Tes_Pengayaan extends CI_Model {
  public function getAll()
  {
    $this->db->select('*');
    $this->db->from('tes_pengayaan');
    return  $this->db->get();
  }

  
  public function selectById($id)
  {
		$this->db->select('*');
		$this->db->from('tes_pengayaan');
		$this->db->where('id',$id);

		return $this->db->get();
	 }


   public function getById($id_mapel = -1)
   {
     $this->db->select('id, Sesi_Ke');
     $this->db->from('sesi_pembelajaran');
     $this->db->where('id_mapel', $id_mapel);
     $sesi_pembelajaran = $this->db->get()->result();

     foreach ($sesi_pembelajaran as $record) {
       $this->db->select('*');
       $this->db->from('tes_pengayaan');
       $this->db->where('id_Sesi', $record->id);

       $temp_test_pengayaan = $this->db->get()->row_array();
       $temp_sesi_ke['sesi_ke'] = $record->Sesi_Ke;

       if (!empty($temp_test_pengayaan)) {              // cek apakah $temp_test_pengayaan tidak kosong? jika tidak kosong lakukan aksi berikut
         $tes_pengayaan[] = (object) array_merge($temp_test_pengayaan, $temp_sesi_ke);
       }
     }

     if (empty($sesi_pembelajaran)) {
       $tes_pengayaan = -1;
     }

     return $tes_pengayaan;
   }
}
