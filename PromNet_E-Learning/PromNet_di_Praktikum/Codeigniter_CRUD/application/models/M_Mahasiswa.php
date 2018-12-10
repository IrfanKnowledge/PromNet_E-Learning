<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 *
 */
class M_Mahasiswa extends CI_Model
{

  function __construct()
  {
    parent::__construct();

  }
  /*menampilkan semua data yang ada di tabel data_mahasiswa*/
  function getALL()
  {
    $this->db->select('*');
    $this->db->from('mahasiswa');

    return $this->db->get();
  }

  function insert()
  {
    $this->db->insert('mahasiswa', $data);

  }
}

?>
