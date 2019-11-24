<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 */
class DetailKategoriBuku extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('MKategoriDetailBuku', 'modal');
		$this->load->library('template');
	}

	public function index($value='')
	{
		$data = array('title' => 'Master Buku', 'datakategori' => $this->modal->getData());
		$this->template->admin('konten/detail_kategori_buku_v',$data);
	}

	public function simpan()
	{
		$idbuku = $this->input->post('idbuku');
		$idrak = $this->input->post('idrak');
		$isbncode = $this->input->post('isbncode');
		$judul = $this->input->post('judul');
		$pengarang = $this->input->post('pengarang');
		$penerbit = $this->input->post('penerbit');
		$jml_halaman = $this->input->post('jml_halaman');
		$tgl_terbit = $this->input->post('tgl_terbit');
		$bahasa = $this->input->post('bahasa');
		$panjang = $this->input->post('panjang');
		$lebar = $this->input->post('lebar');
		$berat = $this->input->post('berat');
		$jml_stock = $this->input->post('jml_stock');
		$jml_stock_disewa = $this->input->post('jml_stock_disewa');
		$deskripsi = $this->input->post('deskripsi');

		$data = array (
			'idbuku' => $idbuku,
			'idrak' => $idrak,
			'isbncode' => $isbncode,
			'judul' => $judul,
			'pengarang' => $penerbit,
			'penerbit' => $jml_halaman,
			'jml_halaman' => $jml_halaman,
			'tgl_terbit' => $tgl_terbit,
			'bahasa' => $bahasa,
			'panjang' => $panjang,
			'lebar' => $lebar,
			'berat' => $berat,
			'jml_stock' => $jml_stock,
			'jml_stock_disewa' => $jml_stock_disewa,
			'deskripsi' => $deskripsi);

			$this->modal->insert($data);
			$this->session->set_flashdata('sukses', "Data Berhasil Disimpan");
		redirect('DetailKategoriBuku');
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
		redirect('DetailKategoriBuku');
	}

	public function hapus($id)
	{
		$this->modal->remove($id);
		$this->session->set_flashdata('sukses', "Data Berhasil Dihapus");
		redirect('DetailKategoriBuku');
	}
}

?>