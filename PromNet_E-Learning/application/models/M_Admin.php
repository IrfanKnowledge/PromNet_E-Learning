<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Admin extends CI_Model {
  public function getAll()
  {
    /*
    $this->db->select('*');
    $this->db->from('admin');
    */
    //fungsi get() selain meng-execute Query Builder Class Bawaan CodeIgniter
    //..dapat langsung menjadi Select * from 'nama tabel' seperti contoh berikut:
    return  $this->db->get('admin');
  }

  public function insert($data = array())
  {
    //---- START proses Enkripsi metode AES_ENCRYPT -----
    $password = $data['password'];
    $this->db->query("SET @a = AES_ENCRYPT('$password', 'promnet')");
    $password_aes = $this->db->query("Select @a")->result();
    foreach ($password_aes[0] as $value) {
      $data['password'] = $value;
    }
    //---- END proses Enkripsi metode AES_ENCRYPT -----

    $this->db->insert('admin', $data);

    $error = $this->db->error();
    if ($error['message'] == '') {
      return 1;
    }else{
      return 0;
    }
  }

  public function update($id= -1, $data = array())
  {
    //Aksi berikut dikerjakan jika password tidak kosong
    //Untuk proses Enkripsi metode AES_ENCRYPT
    //---- START proses Enkripsi metode AES_ENCRYPT -----
    if ($data['password'] != '') {
      $password = $data['password'];
      $this->db->query("SET @a = AES_ENCRYPT('$password', 'promnet')");
      $password_aes = $this->db->query("Select @a")->result();

      foreach ($password_aes[0] as $value) {
        $data['password'] = $value;
      }
    }
    //---- END proses Enkripsi metode AES_ENCRYPT -----

    $this->db->set($data);
		$this->db->where('id',$id);
		$this->db->update('admin');

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
		$this->db->delete('admin');

    $error = $this->db->error();
    if ($error['message'] == '') {
      return 1;
    }else{
      return 0;
    }
  }

}
