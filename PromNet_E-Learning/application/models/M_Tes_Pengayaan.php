<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Tes_Pengayaan extends CI_Model {
  public function getAll()
  {
    $this->db->select('*');
    $this->db->from('tes_pengayaan');
    return  $this->db->get();
  }

  
  function selectById($id){
		$this->db->select('*');
		$this->db->from('tes_pengayaan');
		$this->db->where('id',$id);

		return $this->db->get();
	}
}
