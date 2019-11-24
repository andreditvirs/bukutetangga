<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 */
class MKategori extends CI_model
{
	public function getData()
	{
		$data = $this->db->get('kategori');
		return $data;
	}
	
	public function insert($data)
	{
		$this->db->insert('kategori', $data);
	}

	public function change($data, $id)
	{
		$this->db->where('idkategori', $id);
		$this->db->update('kategori', $data);
	}

	public function remove($id)
	{
		$this->db->where('idkategori', $id);
		$this->db->delete('kategori');
	}


	
}

?>