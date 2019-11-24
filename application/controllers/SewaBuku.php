<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 */
class SewaBuku extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('MSewaBuku', 'modal');
		$this->load->library('template');
	}

	public function index($value='')
	{
		$data = array('title' => 'Master Sewa Buku', 'datakategori' => $this->modal->getData());
		$this->template->admin('konten/sewa_buku_v',$data);
	}

	public function simpan()
	{
		$idsewa = $this->input->post('idsewa');
		$tanggalsewa = $this->input->post('tanggalsewa');
		$tanggalkembali = $this->input->post('tanggalkembali');
		$idpenyedia = $this->input->post('idpenyedia');
		$hargasewa = $this->input->post('hargasewa');
		$hargadenda = $this->input->post('hargadenda');
		$harga_totalbuku = $this->input->post('harga_totalbuku');
		$kode_sewa = $this->input->post('kode_sewa');
		$kode_kembali = $this->input->post('kode_kembali');
		$status = $this->input->post('status');

		$data = array (
			'idsewa' => $idsewa,
			'tanggalsewa' => $tanggalsewa,
			'tanggalkembali' => $tanggalkembali,
			'idpenyedia' => $idpenyedia,
			'hargasewa' => $hargasewa,
			'hargadenda' => $hargadenda,
			'harga_totalbuku' => $harga_totalbuku,
			'kode_sewa' => $kode_sewa,
			'kode_kembali' => $kode_kembali,
			'status' => $status);

			$this->modal->insert($data);
			$this->session->set_flashdata('sukses', "Data Berhasil Disimpan");
		redirect('SewaBuku');
	}

	public function ubah($id=null)
	{
		$idsewa = $this->input->post('idsewa');
		$tanggalsewa = $this->input->post('tanggalsewa');
		$tanggalkembali = $this->input->post('tanggalkembali');
		$idpenyedia = $this->input->post('idpenyedia');
		$hargasewa = $this->input->post('hargasewa');
		$hargadenda = $this->input->post('hargadenda');
		$harga_totalbuku = $this->input->post('harga_totalbuku');
		$kode_sewa = $this->input->post('kode_sewa');
		$kode_kembali = $this->input->post('kode_kembali');
		$status = $this->input->post('status');

		$data = array (
			'idsewa' => $idsewa,
			'tanggalsewa' => $tanggalsewa,
			'tanggalkembali' => $tanggalkembali,
			'idpenyedia' => $idpenyedia,
			'hargasewa' => $hargasewa,
			'hargadenda' => $hargadenda,
			'harga_totalbuku' => $harga_totalbuku,
			'kode_sewa' => $kode_sewa,
			'kode_kembali' => $kode_kembali,
			'status' => $status);
		$this->modal->change($data, $idsewa);
		$this->session->set_flashdata('sukses', "Data Berhasil Diupdate");
		redirect('SewaBuku');
	}

	public function hapus($id)
	{
		$this->modal->remove($id);
		$this->session->set_flashdata('sukses', "Data Berhasil Dihapus");
		redirect('SewaBuku');
	}
}

?>