<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 */
class Kategori extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('MKategori', 'modal');
		$this->load->library('template');
	}

	public function index($value='')
	{
		$data = array('title' => 'Master Buku', 'datakategori' => $this->modal->getData());
		$this->template->admin('konten/kategori_v',$data);
	}

	public function simpan()
	{
		$idkategori = $this->input->post('idkategori');
		$nama_kategori = $this->input->post('nama_kategori');
		$data = array (
			'idkategori' => $idkategori,
			'nama_kategori' => $nama_kategori);

			$this->modal->insert($data);
			$this->session->set_flashdata('sukses', "Data Berhasil Disimpan");
		redirect('Kategori');
	}

	public function ubah($id=null)
	{
		$idkategori = $this->input->post('idkategori');
		$nama_kategori = $this->input->post('nama_kategori');
		$data = array (
			'idkategori' => $idkategori,
			'nama_kategori' => $nama_kategori);
		$this->modal->change($data, $idkategori);
		$this->session->set_flashdata('sukses', "Data Berhasil Diupdate");
		redirect('Kategori');
	}

	public function hapus($id)
	{
		$this->modal->remove($id);
		$this->session->set_flashdata('sukses', "Data Berhasil Dihapus");
		redirect('Kategori');
	}
}

?>