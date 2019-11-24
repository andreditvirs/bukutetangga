<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library(array('template'));
	}

	public function index()
	{
		$path = './assets/captcha/'; //posisi folder cpatcha

		//logic folder captcha jika tidak ada (try catch error)
		if (!file_exists($path)) {
			$buat = mkdir($path,0777); //membuat folder captcha
			if(!$buat){
				return;
			}
		}

		//menampilkan huruf acak untuk kata captcha
		$kata = array_merge(range('0','9'), range('A','Z'));
		$acak = shuffle($kata);
		$str = substr(implode($kata), 0,5);

		//untuk sesion
		$data_ses = array('captcha_str'=>$str);
		$this->session->set_userdata($data_ses);

		//array menampilkan gambar captcha
		$vals = array(
			'word' => $str,
			'img_path' => $path,
			'img_url' => base_url().'assets/captcha',
			'img_width' => '150',
			'img_height' => 40,
			'expiration' => 7200
		);
		$capc = create_captcha($vals);
		$data['captcha_image'] = $capc['image'];

		$this->load->view('login_view', $data);
	}

	public function kirim()
	{
		$po_captcha = $this->input->post('captcha');
		if ($po_captcha != $this->session->userdata('captcha_str')) {
			$this->session->set_flashdata('notif','
				<div class = "alert-warning">Captcha salah</div>
				');
			redirect('login');
		}else{
			redirect('welcome');
		}
	}
}
?>
