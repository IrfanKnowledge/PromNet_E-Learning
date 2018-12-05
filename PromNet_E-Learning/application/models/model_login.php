<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_login extends CI_Model {

	public function getlogin($username, $pwd)
	{
		$pwd = md5($pwd);
		$this->db->select('*');
		$this->db->from('admin');
		$this->db->where('username', $username);
		$this->db->where('password', $pwd);

		if($this->db->get()->num_rows()>0){
			return true;
		}
		else{
			return false;
		}
	}

	public function getlogin_2($username, $pwd)
	{

		$this->db->select('*');
		$this->db->from('admin');
		$this->db->where('username', $username);
		$this->db->where('password', "AES_ENCRYPT('$pwd', 'promnet')", false);

		if($this->db->get()->num_rows()>0){
			return true;
		}
		else{
			return false;
		}
	}

	public function getlogin_2_siswa($username, $pwd)
	{

		$this->db->select('*');
		$this->db->from('siswa');
		$this->db->where('NIS', $username);
		$this->db->where('password', "AES_ENCRYPT('$pwd', 'promnet')", false);

		if($this->db->get()->num_rows()>0){
			return true;
		}
		else{
			return false;
		}
	}

	public function selectByUsername($username){
		$this->db->select('*');
		$this->db->from('admin');
		$this->db->where('username', $username);

		return $this->db->get();

	}

	public function selectByUsernameSiswa($username){
		$this->db->select('*');
		$this->db->from('siswa');
		$this->db->where('NIS', $username);

		return $this->db->get();

	}

}
