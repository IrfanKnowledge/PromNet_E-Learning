<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_ListNilai extends CI_Model {
  // public function getAllKetuntasan()
  // {
  //   $this->db->select('*');
  //   $this->db->from('tes_ketuntasan');
  //   return  $this->db->get();
  // }

  public function getAllSiswaKetuntasan()
  {
    $this->db->select('*');
    $this->db->from('tes_ketuntasan_nilai');
    return  $this->db->get();
  }

  //   public function getAllPengayaan()
  // {
  //   $this->db->select('*');
  //   $this->db->from('tes_pengayaan');
  //   return  $this->db->get();
  // }

  public function getAllSiswaPengayaan()
  {
    $this->db->select('*');
    $this->db->from('tes_pengayaan_nilai');
    return  $this->db->get();
  }


  public function getAllSiswaTugas()
  {
    $this->db->select('*');
    $this->db->from('tugas_sesi_jawaban');
    return  $this->db->get();
  }


  //   public function selectById($id)
  // {
  //   $this->db->select('*');
  //   $this->db->from('tes_ketuntasan');
  //   $this->db->where('id',$id);

  //   return $this->db->get();
  //  }

 //  function insert($data){
	// 	$this->db->insert('tes_ketuntasan', $data);

	//     $error = $this->db->error();
	//     if ($error['message'] == '') {
	//       return 1;
	//     }else{
	//       return 0;
	//     }
	// }
	
	// function update($id, $data){
	// 	$this->db->set($data);
	// 	$this->db->where('id',$id);
	// 	$this->db->update('tes_ketuntasan');
	// }
	
	// function delete($id){
	// 	$this->db->where('id',$id);
	// 	$this->db->delete('tes_ketuntasan');

	// $error = $this->db->error();
 //    if ($error['message'] == '') {
 //      return 1;
 //    }else{
 //      return 0;
 //    }
	// }

}
?>
