<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Tes_Ketuntasan extends CI_Model {
  public function getAll()
  {
    $this->db->select('*');
    $this->db->from('tes_ketuntasan');
    return  $this->db->get();
  }

  	function selectById($id){
		$this->db->select('*');
		$this->db->from('tes_ketuntasan');
		$this->db->where('id',$id);

		return $this->db->get();
	}

}


