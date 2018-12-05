<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Mata_Pelajaran extends CI_Model {
  public function getAll()
  {
    $this->db->select('*');
    $this->db->from('mata_pelajaran');
    return  $this->db->get();
  }

  function insert($data){
		$this->db->insert('mata_pelajaran', $data);

	    $error = $this->db->error();
	    if ($error['message'] == '') {
	      return 1;
	    }else{
	      return 0;
	    }
	}
	
	function update($id, $data){
		$this->db->set($data);
		$this->db->where('id',$id);
		$this->db->update('mata_pelajaran');
	}
	
	function delete($id){
		$this->db->where('id',$id);
		$this->db->delete('mata_pelajaran');

	$error = $this->db->error();
    if ($error['message'] == '') {
      return 1;
    }else{
      return 0;
    }
	}

}
?>
