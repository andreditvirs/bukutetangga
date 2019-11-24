<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 */
class MKategoriDetailBuku extends CI_model
{
	public function getData()
	{
		$data = $this->db->get('buku');
		return $data;
	}
	
	public function insert($data)
	{
		$this->db->insert('buku', $data);
	}

	public function change($data, $id)
	{
		$this->db->where('idkategori', $id);
		$this->db->update('buku', $data);
	}

	public function remove($id)
	{
		$this->db->where('idkategori', $id);
		$this->db->delete('buku');
	}


	
}

?>