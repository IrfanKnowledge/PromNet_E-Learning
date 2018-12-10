<?php

/*
	M_mahasiswa.php

*/
/**
*
*/
class M_mahasiswa extends CI_model
{

	function __construct()
	{
		parent::__construct();
	}

	/*menampilkan semua data yang ada di tabel data_mahasiswa*/
	function selectAll(){
		$this->db->select('*');
		$this->db->from('data_mahasiswa');

		return $this->db->get();
	}

	// menampilkan data sesuai idnya
	function selectById($id){
		$this->db->select('*');
		$this->db->from('data_mahasiswa');
		$this->db->where('id',$id);


		return $this->db->get();
	}

	//menambah data pada tabel data_mahasiswa
	function insert($data){
		$this->db->insert('data_mahasiswa', $data);
	}

	//merubah data pada tabel data_mahasiswa
	function update($id,$data){
		$this->db->set($data);
		$this->db->where('id',$id);
		$this->db->update('data_mahasiswa');
	}

	//menghapus data pada tabel data_mahasiswa
	function delete($id){
		$this->db->where('id',$id);
		$this->db->delete('data_mahasiswa');
	}
}

?>
